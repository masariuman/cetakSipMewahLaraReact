<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Helper extends Controller
{
    function today() {
        $date = date('d');
        $month = date('m');
        $year = date('Y');
        ($month === '1' || $month === '01' || $month === 1) ? $month = 'Januari' :
          (($month === '2' || $month === '02' || $month === 2) ? $month = 'Februari' :
            (($month === '3' || $month === '03' || $month === 3) ? $month = 'Maret' :
              (($month === '4' || $month === '04' || $month === 4) ? $month = 'April' :
                (($month === '5' || $month === '05' || $month === 5) ? $month = 'Mei' :
                  (($month === '6' || $month === '06' || $month === 6) ? $month = 'Juni' :
                    (($month === '7' || $month === '07' || $month === 7) ? $month = 'Juli' :
                      (($month === '8' || $month === '08' || $month === 8) ? $month = 'Agustus' :
                        (($month === '9' || $month === '09' || $month === 9) ? $month = 'September' :
                          (($month === '10' || $month === '10' || $month === 10) ? $month = 'Oktober' :
                            (($month === '11' || $month === '11' || $month === 11) ? $month = 'November' :
                              (($month === '12' || $month === '12' || $month === 12) ? $month = 'Desember' :
                                $month)))))))))));
        $today = $date.' '.$month.' '.$year;
        return $today;
    }

    function tanggalIndo($date, $month, $year) {
        ($month === '1' || $month === '01' || $month === 1) ? $month = 'Januari' :
          (($month === '2' || $month === '02' || $month === 2) ? $month = 'Februari' :
            (($month === '3' || $month === '03' || $month === 3) ? $month = 'Maret' :
              (($month === '4' || $month === '04' || $month === 4) ? $month = 'April' :
                (($month === '5' || $month === '05' || $month === 5) ? $month = 'Mei' :
                  (($month === '6' || $month === '06' || $month === 6) ? $month = 'Juni' :
                    (($month === '7' || $month === '07' || $month === 7) ? $month = 'Juli' :
                      (($month === '8' || $month === '08' || $month === 8) ? $month = 'Agustus' :
                        (($month === '9' || $month === '09' || $month === 9) ? $month = 'September' :
                          (($month === '10' || $month === '10' || $month === 10) ? $month = 'Oktober' :
                            (($month === '11' || $month === '11' || $month === 11) ? $month = 'November' :
                              (($month === '12' || $month === '12' || $month === 12) ? $month = 'Desember' :
                                $month)))))))))));
        $tanggalIndo = $date.' '.$month.' '.$year;
        return $tanggalIndo;
    }
}
