<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Helper;

class LaporanController extends Controller
{
    private $helper;

    public function __construct()
    {
        $this->helper = new Helper;
    }

    public function dataBulanan() {
        $datasets = 1;
        $today = $this->helper->today();
        $data["today"] = $today;
        return view('dataBulanan', $data);
        // $data = Pdf::loadview('dataBulanan',$datasets);
        // $data->setPaper('legal', 'potrait');
        // return $data->stream($datasetPegawai["namaLengkap"].'.pdf');
    }
}
