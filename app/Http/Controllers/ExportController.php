<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helper;
use Illuminate\Http\Request;
use App\Exports\MasterDataExport;
use App\Exports\OpdDataExport;
use App\Exports\MissingASNExport;
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

    public function opdData($id) {
        $today = $this->helper->today();
        $filename = "MasterData ".$today.".xlsx";
        return Excel::download(new OpdDataExport($id), $filename);
    }

    public function selisihMasterData() {
        $today = $this->helper->today();
        $filename = "Selisih MasterData & Dashboard ".$today.".xlsx";
        return Excel::download(new MissingASNExport, $filename);
    }
}
