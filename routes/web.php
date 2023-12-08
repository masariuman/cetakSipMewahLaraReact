<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('biodata/{nip}', 'CetakController@biodata');
// Route::get('testing/data_utama/{nip}', 'CetakController@dataUtama');
// Route::get('testing/foto/{nip}', 'CetakController@foto_pegawai');
Route::get('/template', function () {
    return view('biodata');
});
