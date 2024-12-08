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


        public function getChartData()
        {
            $sensor = Sensor::all();
            $train2Data = [80, 40, 45, 50, 49, 60, 70, 91, 125, 190];
            $train3aData = [50, 40, 45, 50, 49, 70, 90, 80, 145, 140];
            $train3bData = [30, 40, 45, 50, 49, 70, 90, 70, 185, 120];
            $train4Data = [10, 40, 45, 50, 49, 70, 50, 90, 155, 180];

            $categories = [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999, 30];

            return response()->json([
                'train2' => $train2Data,
                'train3a' => $train3aData,
                'train3b' => $train3bData,
                'train4' => $train4Data,
                'categories' => $categories
            ]);
        }
}
