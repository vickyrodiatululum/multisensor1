<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\ToggelSensor;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class SensorController extends Controller
{
    public function index()
    {
        // Ambil data terakhir untuk setiap train
        $latesTrains = Sensor::orderBy('id', 'desc')->first();
        $trainData = [];
        for ($i = 1; $i <= 4; $i++) {
            $trainData[$i] = [
                'latest' => $latesTrains->{'train' . $i} ?? 0,
                'status' => ToggelSensor::where('train', $i)->value('status') ?? 0,
            ];
        }
        return view('dashboard', compact('trainData'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'train1' => 'required|numeric',
            'train2' => 'required|numeric',
            'train3' => 'required|numeric',
            'train4' => 'required|numeric',
        ]);

        $status1 = ToggelSensor::where('train', 1)->value('status');
        $status2 = ToggelSensor::where('train', 2)->value('status');
        $status3 = ToggelSensor::where('train', 3)->value('status');
        $status4 = ToggelSensor::where('train', 4)->value('status');

        if ($status1 == 1 && $validated['train1'] <=85 || $status2 == 1 && $validated['train2'] <=85 || $status3 == 1 && $validated['train3'] <=85 || $status4 == 1 && $validated['train4'] <=85) {
            
            $chatId = '-4672842503'; // Replace with your chat ID
            $message = '⚠️ Peringatan: Intensitas lampu Train 1 : ' . $validated['train1'] .' - Train 2 : ' . $validated['train2'] . ' - Train 3 : ' . $validated['train3'] . ' - Train 4 : ' . $validated['train4'] . ' Segera lakukan perbaikan!';
            Telegram::sendMessage(['chat_id' => $chatId, 'text' => $message]);
        }

        // Simpan ke database
        Sensor::create($validated);

        return response()->json(['message' => 'Data berhasil diterima'], 200);
    }

        public function getTrainData($train)
    {
        $data = Sensor::orderBy('id', 'desc')->value("train{$train}") ?? 0;

        return response()->json(['train' => $data]);
    }

    public function updateStatus(Request $request)
    {

        // Ambil data dari request
        $train = $request->input('train'); // e.g., 'checkboxTrain1'
        $status = $request->input('status'); // true atau false
        if ($status == 'true') {
            $status = 1;
        } else {
            $status = 0;
        }
        ToggelSensor::updateOrCreate([
            'train' => $train], [
            'status' => $status,
        ]);

        return response()->json([
            'message' => "Status $train berhasil diperbarui menjadi $status",
        ]);
    }

}
