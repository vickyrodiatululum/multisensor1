<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sensor;
use App\Models\Train1;
use App\Models\Train2;
use App\Models\Train3;
use App\Models\Train4;
use Illuminate\Http\Request;

class Log_dataController extends Controller
{
    public function index()
    {
        $train1 = Train1::all();
        $train2 = Train2::all();
        $train3 = Train3::all();
        $train4 = Train4::all();

        // Mengambil data terbaru untuk slot 1-4 dari setiap train
        $latestLampu1 = Train1::whereIn('slot', [1, 2, 3, 4])
            ->orderBy('slot')
            ->orderByDesc('created_at')
            ->get()
            ->unique('slot')
            ->keyBy('slot');

        $latestLampu2 = Train2::whereIn('slot', [1, 2, 3, 4])
            ->orderBy('slot')
            ->orderByDesc('created_at')
            ->get()
            ->unique('slot')
            ->keyBy('slot');

        $latestLampu3 = Train3::whereIn('slot', [1, 2, 3, 4])
            ->orderBy('slot')
            ->orderByDesc('created_at')
            ->get()
            ->unique('slot')
            ->keyBy('slot');

        $latestLampu4 = Train4::whereIn('slot', [1, 2, 3, 4])
            ->orderBy('slot')
            ->orderByDesc('created_at')
            ->get()
            ->unique('slot')
            ->keyBy('slot');

            // Gabungkan semua data menjadi satu array untuk dikirim ke view
        $dataTrains = [
            ['name' => 'Train 1', 'latestLampu' => $latestLampu1, 'train' => $train1],
            ['name' => 'Train 2', 'latestLampu' => $latestLampu2, 'train' => $train2],
            ['name' => 'Train 3', 'latestLampu' => $latestLampu3, 'train' => $train3],
            ['name' => 'Train 4', 'latestLampu' => $latestLampu4, 'train' => $train4],
        ];
        $date = now()->format('Y-m-d');

        $data = Sensor::whereDate('created_at', $date)->get();
        // dd($data);

        // Mengirim data ke view 'log_data'
        return view('log_data', compact('dataTrains'));

    }


    public function store(Request $request, $train)
    {
        $request->validate([
            'pilih_lampu' => 'required|integer',
            'jenis_lampu' => 'required|string',
            'pergantian' => 'required|date',
        ]);

        $modelClass = match ($train) {
            'train-1' => Train1::class,
            'train-2' => Train2::class,
            'train-3' => Train3::class,
            'train-4' => Train4::class,
            default => abort(404),
        };

        $lampu = $modelClass::where('slot', $request->pilih_lampu)->latest()->first();
        if($lampu !== null){
            // Hitung usia lampu
            $tanggalPemasangan = Carbon::parse($lampu->pergantian);
            $usiaLampu = $tanggalPemasangan->diffInDays($request->pergantian);
            $lampu->update([
                'usia' => $usiaLampu
            ]);
        }

        $modelClass::create([
            'slot' => $request->pilih_lampu,
            'jenis_lampu' => $request->jenis_lampu,
            'pergantian' => $request->pergantian,
        ]);

        return redirect()->back()->with('added', true);
    }


        public function getChartDataa()
        {
            $train2Data = Sensor::pluck('train1');
            $train3aData = Sensor::pluck('train2');
            $train3bData = Sensor::pluck('train3');
            $train4Data = Sensor::pluck('train4');

            $categories = Sensor::all()->map(function ($train) {
                $train->time_only = Carbon::parse($train->created_at)->format('H:i:s');
                return $train->time_only;
            });

            return response()->json([
                'train2' => $train2Data,
                'train3a' => $train3aData,
                'train3b' => $train3bData,
                'train4' => $train4Data,
                'categories' => $categories
            ]);
        }

    public function getChartData(Request $request)
    {
        $date = $request->input('date', now()->format('Y-m-d'));

        $data = Sensor::whereDate('created_at', $date)->get();

        return response()->json([
            'train2' => $data->pluck('train1'),
            'train3a' => $data->pluck('train2'),
            'train3b' => $data->pluck('train3'),
            'train4' => $data->pluck('train4'),
            'categories' => $data->pluck('created_at')->map(function ($item) {
                return \Carbon\Carbon::parse($item)->format('H:i:s');
            }),
        ]);
    }
}
