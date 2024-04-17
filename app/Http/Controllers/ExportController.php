<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper;
use Illuminate\Http\Request;
use App\Exports\MasterDataExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pegawai;

class ExportController extends Controller
{
    private $helper;

    public function __construct()
    {
        $this->helper = new Helper;
    }

    public function masterData() {
        $today = $this->helper->today();
        $filename = "MasterData ".$today.".xlsx";
        return Excel::download(new MasterDataExport, $filename);
    }
}
