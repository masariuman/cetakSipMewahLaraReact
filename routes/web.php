<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('biodata/{nip}', 'CetakController@biodata');
Route::get('export/masterData', 'ExportController@masterData');
Route::get('export/opdData/{id}', 'ExportController@opdData');
Route::get('export/selisihMasterData', 'ExportController@selisihMasterData');
// Route::get('testing/data_utama/{nip}', 'CetakController@dataUtama');
// Route::get('testing/foto/{nip}', 'CetakController@foto_pegawai');
Route::get('/template', function () {
    return view('biodata');
});

Route::any('{all}', function () {
    return view('layout');
})
->where(['all' => '.*']);

// Route::get('/', function () {
//     return view('layout');
// });
