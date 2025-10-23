<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biodata</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style type="text/css">
            table.darkTable {
            font-family: "Arial Black", Gadget, sans-serif;
            /* border: 2px solid #000000; */
            border-bottom: 3px solid #000000;
            background-color: #DCFFD2;
            width: 100%;
            /* height: 200px; */
            margin-bottom: 50px;
            text-align: center;
            border-collapse: collapse;
            }
            table.darkTable td, table.darkTable th {
            padding: 3px 5px;
            }
            table.darkTable tbody td {
            font-size: 13px;
            color: #000000;
            }
            table.darkTable tr:nth-child(even) {
            background: #FFFFFF;
            }
            table.darkTable thead {
            background: #138E21;
            border-bottom: 3px solid #000000;
            border-top: 3px solid #000000;
            }
            table.darkTable thead th {
            font-size: 15px;
            font-weight: bold;
            color: #FFFFFF;
            text-align: center;
            /* border-left: 2px solid #4A4A4A; */
            }
            table.darkTable thead th:first-child {
            border-left: none;
            }

            table.darkTable tfoot td {
            font-size: 12px;
            }

            table.laporanTable {
            font-family: "Arial Black", Gadget, sans-serif;
            /* border: 2px solid #000000; */
            border-bottom: 3px solid #000000;
            /* background-color: #DCFFD2; */
            background-color: #FFFFFF;
            width: 100%;
            /* height: 200px; */
            /* margin-bottom: 50px; */
            text-align: center;
            border-collapse: collapse;
            }
            table.laporanTable td, table.laporanTable th {
            padding: 3px 5px;
            }
            table.laporanTable tbody td {
            font-size: 13px;
            color: #000000;
            }
            /* table.laporanTable tr:nth-child(even) {
            background: #FFFFFF;
            } */
            table.laporanTable thead {
            /* background: #138E21; */
            background: #FFFFFF;
            border-bottom: 3px solid #000000;
            border-top: 3px solid #000000;
            }
            table.laporanTable thead th {
            font-size: 15px;
            font-weight: bold;
            color: #FFFFFF;
            text-align: center;
            /* border-left: 2px solid #4A4A4A; */
            }
            table.laporanTable thead th:first-child {
            border-left: none;
            }

            table.laporanTable tfoot td {
            font-size: 12px;
            }

            table.title {
            font-family: "Arial Black", Gadget, sans-serif;
            /* border: 2px solid #000000; */
            /* border-bottom: 3px solid #000000; */
            background-color: #ffffff;
            width: 100%;
            /* height: 200px; */
            margin-bottom: 50px;
            text-align: center;
            border-collapse: collapse;
            }
            table.title td, table.darkTable th {
            padding: 3px 5px;
            }
            table.title tbody td {
            font-size: 13px;
            color: #000000;
            }
            table.title tr:nth-child(even) {
            background: #FFFFFF;
            }
            table.title thead {
            background: #ffffff;
            /* border-bottom: 3px solid #000000;
            border-top: 3px solid #000000; */
            }
            table.title thead th {
            font-size: 15px;
            font-weight: bold;
            color: #000000;
            text-align: center;
            /* border-left: 2px solid #4A4A4A; */
            }
            table.title thead th:first-child {
            border-left: none;
            }

            table.title tfoot td {
            font-size: 12px;
            }


            .bg_green {
            background-color: #DCFFD2;
            }

            .color_white {
            color: #FFFFFF !important;
            }

            .bg_oldGreen {
            background-color: #138E21;
            }

            .namaKepala {
                font-family: Georgia, serif;
                color: #000000;
                font-weight: 700;
                text-decoration: underline solid rgb(68, 68, 68);
                font-style: normal;
                font-variant: normal;
                text-transform: uppercase;
            }
            .capitalize {
                text-transform: capitalize;
            }
            h3 {
                font-size:19px;
                letter-spacing: -1px;
                margin-bottom:0px;
                margin-top:0px;
                /* word-spacing: -1px; */
            }
        </style>
    </head>
    <body>
            <table style="width:100%;border-bottom:4px double;margin-top:-10px;">
                <tr>
                    <td valign="bottom">
                        <img style="width:65px;" src="/mempawah.png" />
                    </td>
                    <td style="text-align:center;">
                        <h3>PEMERINTAH KABUPATEN MEMPAWAH <br />
                        BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA<br />
                        Jalan Chandramidi Mempawah <br />
                        Telp. (0561) 691594 Fax. (0561) 691095 Kode Pos 78911</h3>
                    </td>
                </tr>
            </table>
            <table class="title" style="margin-top:40px;margin-bottom:30px">
                <thead>
                    <tr>
                        <th style="font-size:35px;">DATA ASN KABUPATEN MEMPAWAH</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size:35px;">PER TANGGAL {{ $today }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="laporanTable" style="" border="4">
                <tbody>
                    <tr>
                        <td rowspan="27" class="color_white bg_oldGreen" style="font-size: 55px; width:45%;">GOLONGAN</td>
                        <td>GOLONGAN I/a</td>
                        <td style="width:10%;">{{ $gol1a }}</td>
                        <td style="width:10%;">ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN I/b</td>
                        <td>{{ $gol1b }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN I/c</td>
                        <td>{{ $gol1c }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN I/d</td>
                        <td>{{ $gol1d }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_green">
                        <td>JUMLAH GOLONGAN I</td>
                        <td>{{ $gol1 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN II/a</td>
                        <td>{{ $gol2a }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN II/b</td>
                        <td>{{ $gol2b }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN II/c</td>
                        <td>{{ $gol2c }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN II/d</td>
                        <td>{{ $gol2d }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_green">
                        <td>JUMLAH GOLONGAN II</td>
                        <td>{{ $gol2 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN III/a</td>
                        <td>{{ $gol3a }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN III/b</td>
                        <td>{{ $gol3b }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN III/c</td>
                        <td>{{ $gol3c }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN III/d</td>
                        <td>{{ $gol3d }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_green">
                        <td>JUMLAH GOLONGAN III</td>
                        <td>{{ $gol3 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN IV/a</td>
                        <td>{{ $gol4a }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN IV/b</td>
                        <td>{{ $gol4b }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN IV/c</td>
                        <td>{{ $gol4c }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN IV/d</td>
                        <td>{{ $gol4d }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>GOLONGAN IV/e</td>
                        <td>{{ $gol4e }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_green">
                        <td>JUMLAH GOLONGAN IV</td>
                        <td>{{ $gol4 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_green">
                        <td>JUMLAH GOLONGAN III (PPPK)</td>
                        <td>{{ $gol3pppk }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_green">
                        <td>JUMLAH GOLONGAN V (PPPK)</td>
                        <td>{{ $gol5pppk }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_green">
                        <td>JUMLAH GOLONGAN VII (PPPK)</td>
                        <td>{{ $gol7pppk }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_green">
                        <td>JUMLAH GOLONGAN IX (PPPK)</td>
                        <td>{{ $gol9pppk }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_green">
                        <td>JUMLAH GOLONGAN X (PPPK)</td>
                        <td>{{ $gol10pppk }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_oldGreen">
                        <td class="color_white">JUMLAH SELURUH GOLONGAN</td>
                        <td class="color_white">{{ $jumlahGolongan }}</td>
                        <td class="color_white">ORANG</td>
                    </tr>
                </tbody>
            </table>
            <table class="laporanTable" style="" border="4">
                <tbody>
                    <tr>
                        <td rowspan="11" class="color_white bg_oldGreen" style="font-size: 55px; width:45%;">PENDIDIKAN</td>
                        <td style="width:35%;">SD</td>
                        <td style="width:10%;">{{ $sd }}</td>
                        <td style="width:10%;">ORANG</td>
                    </tr>
                    <tr>
                        <td>SLTP/SMP</td>
                        <td>{{ $smp }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>SLTA/SMA</td>
                        <td>{{ $sma }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>DIPLOMA I</td>
                        <td>{{ $d1 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>DIPLOMA II</td>
                        <td>{{ $d2 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>DIPLOMA III</td>
                        <td>{{ $d3 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>DIPLOMA IV</td>
                        <td>{{ $d4 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>SARJANA</td>
                        <td>{{ $s1 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>SARJANA (PROFESI)</td>
                        <td>{{ $profesi }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>PASKA SARJANA</td>
                        <td>{{ $s2 }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_oldGreen">
                        <td class="color_white">JUMLAH</td>
                        <td class="color_white">{{ $jumlahPendidikan }}</td>
                        <td class="color_white">ORANG</td>
                    </tr>
                </tbody>
            </table>
            <table class="laporanTable" style="" border="4">
                <tbody>
                    <tr>
                        <td rowspan="3" class="color_white bg_oldGreen" style="font-size: 45px; width:45%;">JENIS KELAMIN</td>
                        <td>LAKI-LAKI</td>
                        <td style="width:10%;">{{ $laki }}</td>
                        <td style="width:10%;">ORANG</td>
                    </tr>
                    <tr>
                        <td>PEREMPUAN</td>
                        <td>{{ $perempuan }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_oldGreen">
                        <td class="color_white">JUMLAH</td>
                        <td class="color_white">{{ $JumlahPegawaiAktif }}</td>
                        <td class="color_white">ORANG</td>
                    </tr>
                </tbody>
            </table>
            <table class="laporanTable" style="" border="4">
                <tbody>
                    <tr>
                        <td rowspan="8" class="color_white bg_oldGreen" style="font-size: 45px; width:45%;">ESELONERING</td>
                        <td>ESELON II.a</td>
                        <td style="width:10%;">{{ $eselon2a }}</td>
                        <td style="width:10%;">ORANG</td>
                    </tr>
                    <tr>
                        <td>ESELON II.b</td>
                        <td>{{ $eselon2b }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>ESELON III.a</td>
                        <td>{{ $eselon3a }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>ESELON III.b</td>
                        <td>{{ $eselon3b }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>ESELON IV.a</td>
                        <td>{{ $eselon4a }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>ESELON IV.b</td>
                        <td>{{ $eselon4b }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>NON ESELON</td>
                        <td>{{ $nonEselon }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_oldGreen">
                        <td class="color_white">JUMLAH</td>
                        <td class="color_white">{{ $jumlahEselon }}</td>
                        <td class="color_white">ORANG</td>
                    </tr>
                </tbody>
            </table>
            <table class="laporanTable" style="" border="4">
                <tbody>
                    <tr>
                        <td rowspan="6" class="color_white bg_oldGreen" style="font-size: 55px; width:45%;">AGAMA</td>
                        <td>ISLAM</td>
                        <td style="width:10%;">{{ $islam }}</td>
                        <td style="width:10%;">ORANG</td>
                    </tr>
                    <tr>
                        <td>KRISTEN</td>
                        <td>{{ $kristen }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>KATHOLIK</td>
                        <td>{{ $katholik }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>HINDU</td>
                        <td>{{ $hindu }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>BUDDHA</td>
                        <td>{{ $buddha }}</td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_oldGreen">
                        <td class="color_white">JUMLAH</td>
                        <td class="color_white">{{ $JumlahPegawaiAktif }}</td>
                        <td class="color_white">ORANG</td>
                    </tr>
                </tbody>
            </table>
            <table class="laporanTable" style="" border="4">
                <tbody>
                    <tr>
                        <td rowspan="4" class="color_white bg_oldGreen" style="font-size: 40px; width:45%;">JENIS KEPEGAWAIAN</td>
                        <td>STRUKTURAL</td>
                        <td style="width:10%;"></td>
                        <td style="width:10%;">ORANG</td>
                    </tr>
                    <tr>
                        <td>FUNGSIONAL</td>
                        <td></td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>PELAKSANA</td>
                        <td></td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_oldGreen">
                        <td class="color_white">JUMLAH</td>
                        <td class="color_white"></td>
                        <td class="color_white">ORANG</td>
                    </tr>
                </tbody>
            </table>
            <table class="laporanTable" style="" border="4">
                <tbody>
                    <tr>
                        <td rowspan="4" class="color_white bg_oldGreen" style="font-size: 35px; width:45%;">KATEGORI KEPEGAWAIAN</td>
                        <td>TENAGA TEKNIS</td>
                        <td style="width:10%;"></td>
                        <td style="width:10%;">ORANG</td>
                    </tr>
                    <tr>
                        <td>TENAGA KESEHATAN</td>
                        <td></td>
                        <td>ORANG</td>
                    </tr>
                    <tr>
                        <td>TENAGA GURU</td>
                        <td></td>
                        <td>ORANG</td>
                    </tr>
                    <tr class="bg_oldGreen">
                        <td class="color_white">JUMLAH</td>
                        <td class="color_white"></td>
                        <td class="color_white">ORANG</td>
                    </tr>
                </tbody>
            </table>
    </body>
</html>
