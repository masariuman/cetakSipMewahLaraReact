<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MasterDataExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pegawai;

class ExportController extends Controller
{
    public function masterData() {
        $filename = "MasterData.xlsx";
        return Excel::download(new MasterDataExport, $filename);
    }
}
