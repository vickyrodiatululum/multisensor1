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
        // dd($latestReports);

        // Return ke view dengan data laporan
        return view('report', ['latestReports' => $latestReports]);
    }   
    public function store(Request $request) {
        $validate = $request->validate([
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
        
        report_ozon::create($validate);
        return redirect()->route('report.index')->with('added', true);
    }

}
