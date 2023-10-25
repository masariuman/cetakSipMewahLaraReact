<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('biodata/{nip}', 'CetakController@biodata');
Route::get('/template', function () {
    return view('biodata');
});
