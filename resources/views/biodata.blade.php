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
        @if($datasetPegawai != null)
            <table style="width:100%;border-bottom:4px double;margin-top:-10px;">
                <tr>
                    <td valign="bottom">
                        <img style="width:65px;" src="mempawah.png" />
                    </td>
                    <td style="text-align:center;">
                        <h3>PEMERINTAH KABUPATEN MEMPAWAH <br />
                        BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA<br />
                        Jalan Chandramidi Mempawah <br />
                        Telp. (0561) 691594 Fax. (0561) 691095 Kode Pos 78911</h3>
                    </td>
                </tr>
            </table>
        @endif
        @if($datasetPegawai != null)
            <table class="darkTable" style="margin-top:40px;margin-bottom:30px">
                <thead>
                    <tr>
                        <th style="font-size:35px;">B I O D A T A</th>
                    </tr>
                </thead>
            </table>
            <h2 class="text-center">KETERANGAN PERORANGAN</h2>
            <table style="width:100%;">
                <tbody>
                    <tr style="width:100%;">
                        <td valign="top" style="width:26%;">NIP</td>
                        <td valign="top" style="width:2%;">:</td>
                        <td valign="top"><b>{{$datasetPegawai['nip']}}</b></td>
                        @if($foto_pegawai != null)
                            <td valign="top" rowspan="10" style="width:150px;"><img  style="width:150px;" src={{$foto_pegawai}} /></td>
                        @else
                            <td valign="top" rowspan="10" style="width:150px;"><img  style="width:150px;" src="noPhotoGreen.png" /></td>
                        @endif
                    </tr>
                    <tr>
                        <td valign="top">Nama</td>
                        <td valign="top">:</td>
                        <td valign="top" class="capitalize">{{$datasetPegawai['namaLengkap']}}</td>
                    </tr>
                    <tr>
                        <td valign="top">Jenis Kelamin</td>
                        <td valign="top">:</td>
                        <td valign="top" class="capitalize">{{$datasetPegawai['kelamin']}}</td>
                    </tr>
                    <tr>
                        <td valign="top">Tempat dan Tanggal Lahir</td>
                        <td valign="top">:</td>
                        <td valign="top" class="capitalize">{{$datasetPegawai['lahir']}}</td>
                    </tr>
                    <tr>
                        <td valign="top">Agama</td>
                        <td valign="top">:</td>
                        <td valign="top" class="capitalize">{{$datasetPegawai['agama']}}</td>
                    </tr>
                    <tr>
                        <td valign="top">Alamat Rumah</td>
                        <td valign="top">:</td>
                        <td valign="top" class="capitalize">
                            {{$datasetPegawai['alamat']}}<br />
                            {{$datasetPegawai['rtrwkel']}}<br />
                            {{$datasetPegawai['keckabprov']}}
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Pendidikan Terakhir</td>
                        <td valign="top">:</td>
                        <td valign="top" class="capitalize">
                            {{$datasetPegawai['pendidikanTingkatAkhir']}}<br />
                            {{$datasetPegawai['pendidikanTingkatSekolah']}}
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Status Kepegawaian</td>
                        <td valign="top">:</td>
                        <td valign="top">{{$datasetPegawai['status']}}</td>
                    </tr>
                    <tr>
                        <td valign="top">Pangkat Terakhir</td>
                        <td valign="top">:</td>
                        <td valign="top" class="capitalize">
                            {{$datasetPegawai['pangkatAkhir']}}<br />
                            {{$datasetPegawai['pangkatTMTAkhir']}}
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Jabatan Terakhir</td>
                        <td valign="top">:</td>
                        <td valign="top" class="capitalize">
                            {{$datasetPegawai['jabatanAkhir']}}<br />
                            {{$datasetPegawai['jabatanUnorAkhir']}}<br />
                            {{$datasetPegawai['jabatanSatkerAkhir']}}<br />
                            {{$datasetPegawai['jabatanTMTAkhir']}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />
        @else
            <table style="width:100%;">
                <tr>
                    <td style="text-align:center;"><h2 class="text-center">~ DATA PEGAWAI TIDAK ADA DI DATABASE ~</h2></td>
                </tr>
                <tr>
                    <td style="text-align:center;"><h2 class="text-center">~ SILAHKAN CEK KEMBALI PEGAWAI YANG DIPILIH ~</h2></td>
                </tr>
                <tr>
                    <td style="text-align:center;"><img style="width:500px;" src="cat.jpg" /></td>
                </tr>
            </table>
        @endif
        @if($datasetsRiwPangkat != null)
            <h2 class="text-center">RIWAYAT KEPANGKATAN</h2>
            <table class="darkTable" style="">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>PANGKAT</th>
                        <th>GOLONGAN RUANG</th>
                        <th>TMT PANGKAT</th>
                        <th>KETERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datasetsRiwPangkat as $no => $datasetsRiwPangkat)
                        <tr>
                            <td>{{$no+1}}</td>
                            <td>{{$datasetsRiwPangkat->namaPangkat}}</td>
                            <td>{{$datasetsRiwPangkat->namaGolRuang}}</td>
                            <td>{{$datasetsRiwPangkat->tmt_pangkat}}</td>
                            <td>{{$datasetsRiwPangkat->keterangan}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if($datasetsRiwJabatan != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT JABATAN</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th style="width:5%;">NO</th>
                            <th>JABATAN</th>
                            <th>SATUAN KERJA</th>
                            <th>UNIT KERJA</th>
                            <th style="width:18%;">TMT JABATAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwJabatan as $no => $datasetsRiwJabatan)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwJabatan->nama_jab}}</td>
                                <td>{{$datasetsRiwJabatan->nama_satuan_kerja}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwJabatan->nama_unit_kerja}}</td>
                                <td>{{$datasetsRiwJabatan->tmt_jab}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsRiwPendidikan != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT PENDIDIKAN</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TINGKAT PENDIDIKAN</th>
                            <th>JURUSAN</th>
                            <th>NAMA SEKOLAH</th>
                            <th>TAHUN LULUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwPendidikan as $no => $datasetsRiwPendidikan)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwPendidikan->tingkatPendidikan}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwPendidikan->program_studi}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwPendidikan->nama_institusi}}</td>
                                <td>{{$datasetsRiwPendidikan->tahunLulus}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsRiwDiklatStruktural != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT DIKLAT STRUKTURAL</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA DIKLAT</th>
                            <th>TAHUN</th>
                            <th>TEMPAT DIKLAT</th>
                            <th>PENYELENGGARA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwDiklatStruktural as $no => $datasetsRiwDiklatStruktural)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwDiklatStruktural->nama_diklat}}</td>
                                <td>{{$datasetsRiwDiklatStruktural->tahun}}</td>
                                <td>{{$datasetsRiwDiklatStruktural->tempat}}</td>
                                <td>{{$datasetsRiwDiklatStruktural->panitia}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsRiwDiklatFungsional != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT DIKLAT FUNGSIONAL</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA DIKLAT</th>
                            <th>TAHUN</th>
                            <th>TEMPAT DIKLAT</th>
                            <th>PENYELENGGARA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwDiklatFungsional as $no => $datasetsRiwDiklatFungsional)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwDiklatFungsional->nama_diklat}}</td>
                                <td>{{$datasetsRiwDiklatFungsional->tahun}}</td>
                                <td>{{$datasetsRiwDiklatFungsional->tempat}}</td>
                                <td>{{$datasetsRiwDiklatFungsional->panitia}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsRiwDiklatTeknis != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT DIKLAT TEKNIS</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA DIKLAT</th>
                            <th>TAHUN</th>
                            <th>TEMPAT DIKLAT</th>
                            <th>PENYELENGGARA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwDiklatTeknis as $no => $datasetsRiwDiklatTeknis)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwDiklatTeknis->nama_diklat}}</td>
                                <td>{{$datasetsRiwDiklatTeknis->tahun}}</td>
                                <td>{{$datasetsRiwDiklatTeknis->tempat}}</td>
                                <td>{{$datasetsRiwDiklatTeknis->panitia}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsRiwPenataran != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT PENATARAN</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PENATARAN</th>
                            <th>TAHUN</th>
                            <th>TEMPAT PENATARAN</th>
                            <th>PENYELENGGARA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwPenataran as $no => $datasetsRiwPenataran)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwPenataran->nama_diklat}}</td>
                                <td>{{$datasetsRiwPenataran->tahun}}</td>
                                <td>{{$datasetsRiwPenataran->tempat}}</td>
                                <td>{{$datasetsRiwPenataran->panitia}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsRiwSeminar != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT SEMINAR / LOKAKARYA / SOMPOSIUM</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA SEMINAR / LOKAKARYA / SOMPOSIUM</th>
                            <th>TAHUN</th>
                            <th>TEMPAT SEMINAR / LOKAKARYA / SOMPOSIUM</th>
                            <th>PENYELENGGARA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwSeminar as $no => $datasetsRiwSeminar)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwSeminar->nama_diklat}}</td>
                                <td>{{$datasetsRiwSeminar->tahun}}</td>
                                <td>{{$datasetsRiwSeminar->tempat}}</td>
                                <td>{{$datasetsRiwSeminar->panitia}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsRiwKursus != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT KURSUS DALAM / LUAR NEGERI</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA KURSUS</th>
                            <th>TAHUN</th>
                            <th>TEMPAT KURSUS</th>
                            <th>PENYELENGGARA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwKursus as $no => $datasetsRiwKursus)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwKursus->nama_diklat}}</td>
                                <td>{{$datasetsRiwKursus->tahun}}</td>
                                <td>{{$datasetsRiwKursus->tempat}}</td>
                                <td>{{$datasetsRiwKursus->panitia}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsRiwPenghargaan != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT TANDA JASA / PENGHARGAAN</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA TANDA JASA / PENGHARGAAN</th>
                            <th>TAHUN PEROLEHAN</th>
                            <th>ASAL PEROLEHAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwPenghargaan as $no => $datasetsRiwPenghargaan)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwPenghargaan->nama_penghargaan}}</td>
                                <td>{{$datasetsRiwPenghargaan->tahun}}</td>
                                <td>{{$datasetsRiwPenghargaan->nama_pemberi}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsRiwHukuman != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">RIWAYAT HUKUMAN DISIPLIN PEGAWAI</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TINGKAT HUKUMAN</th>
                            <th>JENIS HUKUMAN</th>
                            <th>TMT HUKUMAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsRiwHukuman as $no => $datasetsRiwHukuman)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td style="text-align:left !important;">{{$datasetsRiwHukuman->tingkat}}</td>
                                <td>{{$datasetsRiwHukuman->jenis}}</td>
                                <td>{{$datasetsRiwHukuman->tmt_hukuman}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsOrangTua != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">DATA ORANG TUA KANDUNG</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>TEMPAT DAN TANGGAL LAHIR</th>
                            <th>PEKERJAAN</th>
                            <th>HUBUNGAN KELUARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsOrangTua as $no => $datasetsOrangTua)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td>{{$datasetsOrangTua->nama_keluarga}}</td>
                                <td>{{$datasetsOrangTua->lahir}}</td>
                                <td>{{$datasetsOrangTua->keterangan_pekerjaan}}</td>
                                <td>{{$datasetsOrangTua->hubungan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsPasangan != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">DATA PASANGAN</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>TEMPAT DAN TANGGAL LAHIR</th>
                            <th>PEKERJAAN</th>
                            <th>HUBUNGAN KELUARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsPasangan as $no => $datasetsPasangan)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td>{{$datasetsPasangan->nama_keluarga}}</td>
                                <td>{{$datasetsPasangan->lahir}}</td>
                                <td>{{$datasetsPasangan->keterangan_pekerjaan}}</td>
                                <td>{{$datasetsPasangan->hubungan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetsAnak != null)
            <div style="page-break-inside: avoid;">
                <h2 class="text-center">DATA ANAK</h2>
                <table class="darkTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>JENIS KELAMIN</th>
                            <th>TEMPAT DAN TANGGAL LAHIR</th>
                            <th>PEKERJAAN</th>
                            <th>HUBUNGAN KELUARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasetsAnak as $no => $datasetsAnak)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td>{{$datasetsAnak->nama_keluarga}}</td>
                                <td>{{$datasetsAnak->kelamin}}</td>
                                <td>{{$datasetsAnak->kota_lahir}}<br />{{$datasetsAnak->tanggal_lahir}}</td>
                                <td>{{$datasetsAnak->keterangan_pekerjaan}}</td>
                                <td>{{$datasetsAnak->hubungan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if($datasetPegawai != null)
            <div style="page-break-inside: avoid;">
                <div style="float:right;">
                    <table class="ttd">
                        <tbody>
                            <tr>
                                <td></td>
                                <td style="text-align:center;">
                                    Mempawah, {{$today}}<br />
                                    An. BUPATI MEMPAWAH<br />
                                    Kepala Badan Kepegawaian dan<br />
                                    Pengembangan Sumber Daya Manusia<br />
                                    Kabupaten Mempawah<br /><br /><img style="width:100px;" src="ttdPenandatangan.png" /><br /><br />
                                    <span class="namaKepala"><u>{{$penandatangan['namaPenandatangan']}}</u></span><br />
                                    <span class="capitalize">{{$penandatangan['namaPangkat']}}</span><br />
                                    NIP. {{$penandatangan['nipPenandatangan']}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </body>
</html>
