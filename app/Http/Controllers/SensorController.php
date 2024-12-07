<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
        // Ambil data terakhir untuk setiap train
        $latesTrain1 = Sensor::orderBy('id', 'desc')->value('train1');
        $latesTrain2 = Sensor::orderBy('id', 'desc')->value('train2') ?? 0;
        $latesTrain3 = Sensor::orderBy('id', 'desc')->value('train3') ?? 0;
        $latesTrain4 = Sensor::orderBy('id', 'desc')->value('train4') ?? 0;
        $cekdb = Sensor::all();
        
        // dd($latesTrain1, $latesTrain2, $latesTrain3, $latesTrain4 );

        return view('dashboard', compact('latesTrain1', 'latesTrain2', 'latesTrain3', 'latesTrain4'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'train1' => 'required|numeric',
            'train2' => 'required|numeric',
            'train3' => 'required|numeric',
            'train4' => 'required|numeric',
        ]);

        // Simpan ke database
        Sensor::create($validated);

        return response()->json(['message' => 'Data berhasil diterima'], 200);
    }

    public function getTrainData($train)
    {
        $data = Sensor::orderBy('id', 'desc')->value("train{$train}") ?? 0;

        return response()->json(['train' => $data]);
    }


}
