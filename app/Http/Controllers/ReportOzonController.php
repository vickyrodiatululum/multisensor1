<?php

namespace App\Http\Controllers;

use App\Models\report_ozon;
use Illuminate\Http\Request;

class ReportOzonController extends Controller
{
    public function index()
    {
        // Mengambil data laporan terakhir untuk setiap train (1-4)
        $latestReports = [];
        for ($train = 1; $train <= 4; $train++) {
            $latestReports[$train] = report_ozon::where('train', $train)->latest()->first();
        }
        // $dataReports = []; 
        // for ($train = 1; $train <= 4; $train++) {
        //     $dataReports[$train] = report_ozon::where('train', $train)->get();
        // }
        $dataReports = report_ozon::with('user')->whereIn('train', [1, 2, 3, 4])
        ->get()
        ->groupBy('train');


        // Return ke view dengan data laporan
        return view('report', [
            'latestReports' => $latestReports,
            'dataReports' => $dataReports
        ]);
    }   
    public function store(Request $request) {
        $request->validate([
            'train' => 'required',
            'pompa_pre_ozon' => 'required',
            'pompa_transfer' => 'required', 
            'step' => 'required',
            'kadar_ozon_static' => 'required',
            'kadar_ozon_ft' => 'required',
            'kadar_ozon_analyzer' => 'required',
            'airflow' => 'required',
            'cooling_water' => 'required',
            'set_level_ft_middle' => 'required',
            'set_level_ft_high' => 'required',
            'lampu_uv' => 'required',
            'voltase' => 'required',
            'ampere' => 'required',
        ], [
            'pompa_pre_ozon.required' => 'Pompa Pre Ozon Harus Diisi',
            'pompa_transfer.required' => 'Pompa Transfer Harus Diisi',
            'step.required' => 'Step Harus Diisi',
            'kadar_ozon_static.required' => 'Kadar Ozon Static Harus Diisi',
            'kadar_ozon_ft.required' => 'Kadar Ozon FT Harus Diisi',
            'kadar_ozon_analyzer.required' => 'Kadar Ozon Analyzer Harus Diisi',
            'airflow.required' => 'Air Flow Harus Diisi',
            'cooling_water.required' => 'Cooling Water Harus Diisi',
            'set_level_ft_middle.required' => 'Set Level FT Middle Harus Diisi',
            'set_level_ft_high.required' => 'Set Level FT High Harus Diisi',
            'lampu_uv.required' => 'Lampu UV Harus Diisi',
            'voltase.required' => 'Voltase Harus Diisi',
            'ampere.required' => 'Ampere Harus Diisi',
        ]);
        
        report_ozon::create([
            'train' => $request->train,
            'pompa_pre_ozon' => $request->pompa_pre_ozon,
            'pompa_transfer' => $request->pompa_transfer, 
            'step' => $request->step,
            'kadar_ozon_static' => $request->kadar_ozon_static,
            'kadar_ozon_ft' => $request->kadar_ozon_ft,
            'kadar_ozon_analyzer' => $request->kadar_ozon_analyzer,
            'airflow' => $request->airflow,
            'cooling_water' => $request->cooling_water,
            'set_level_ft_middle' => $request->set_level_ft_middle,
            'set_level_ft_high' => $request->set_level_ft_high,
            'lampu_uv' => $request->lampu_uv,
            'voltase' => $request->voltase,
            'ampere' => $request->ampere,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('report.index')->with('added', true);
    }

}
