<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Helper;

use Illuminate\Support\Facades\DB;

use App\Models\Pegawai;
use App\Models\RiwPendidikan;

class LaporanController extends Controller
{
    private $helper;

    public function __construct()
    {
        $this->helper = new Helper;
    }

    public function dataBulanan() {
        $data["gol1"] = $data["gol1a"] = $data["gol1b"] = $data["gol1c"] = $data["gol1d"] = $data["gol2"] = $data["gol2a"] = $data["gol2b"] = $data["gol2c"] = $data["gol2d"] = $data["gol3"] = $data["gol3a"] = $data["gol3b"] = $data["gol3c"] = $data["gol3d"] = $data["gol4"] = $data["gol4a"] = $data["gol4b"] = $data["gol4c"] = $data["gol4d"] = $data["gol4e"] = $data["gol3pppk"] = $data["gol5pppk"] = $data["gol7pppk"] = $data["gol9pppk"] = $data["gol10pppk"] = $data["jumlahGolongan"] = $data["sd"] = $data["smp"] = $data["sma"] = $data["d1"] = $data["d2"] = $data["d3"] = $data["d4"] = $data["s1"] = $data["profesi"] = $data["s2"] = $data["jumlahPendidikan"] = $data["laki"] = $data["perempuan"] = $data["eselon2a"] = $data["eselon2b"] = $data["eselon3a"] = $data["eselon3b"] = $data["eselon4a"] = $data["eselon4b"] = $data["nonEselon"] = $data["jumlahEselon"] = $data["islam"] = $data["kristen"] = $data["katholik"] = $data["hindu"] = $data["buddha"] = $data["struktural"] = $data["fungsional"] = $data["pelaksana"] = $data["jumlahJenisKepegawaian"] = $data["tenagaTeknis"] = $data["tenagaKesehatan"] = $data["tenagaGuru"] = $data["jumlahKategoriKepegawaian"] = 0;
        $query = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, p.nama AS namaLengkap, p.kota_lahir, p.tanggal_lahir, jk.nama_jns_kelamin, p.nip as tingkatPendidikan, p.nip as programStudi, g.nama_gol_ruang, g.nama_pangkat, r.tmt_pangkat, re.neselon, rjj.nama_jns_jab, rkj.nama_kategori_jab, j.nama_jab, j.nama_jab as tmt_jab, msk.satuan_kerja, j.id_unker AS idunkersimpeg, j.id_unker AS unker1, j.id_unker AS unker2, j.id_unker AS unker3, ra.nama_agama, rsp.nama_status_pegawai, rjp.nama_jns_pegawai, rsk.nama_status_kawin, rgd.nama_gol_darah, p.alamat, rwp.nama_wil_prov, rwkab.nama_wil_kab, rwkec.nama_wil_kec, rwkel.nama_wil_kel, p.rt, p.rw, p.no_hp, p.email, p.no_karpeg, p.no_bpjs, p.no_taspen, p.no_karis_su, p.npwp, p.nik, p.no_kk, p.no_akta, p.catatan, p.keterangan FROM ((((((((((((((((( pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif ) LEFT JOIN riw_pangkat r ON p.nip = r.nip ) LEFT JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode ) LEFT JOIN ref_wil_prov rwp ON p.kode_wil_prov = rwp.kode ) LEFT JOIN ref_wil_kab rwkab ON p.kode_wil_kab = rwkab.kode ) LEFT JOIN ref_wil_kec rwkec ON p.kode_wil_kec = rwkec.kode ) LEFT JOIN ref_wil_kel rwkel ON p.kode_wil_kel = rwkel.kode ) LEFT JOIN ref_jns_kelamin jk ON p.kode_jns_kelamin = jk.kode ) LEFT JOIN ref_agama ra ON p.kode_agama = ra.kode ) LEFT JOIN ref_status_pegawai rsp ON p.kode_status_pegawai = rsp.kode ) LEFT JOIN ref_jns_pegawai rjp ON p.kode_jns_pegawai = rjp.kode ) LEFT JOIN ref_status_kawin rsk ON p.kode_status_kawin = rsk.kode ) LEFT JOIN ref_gol_darah rgd ON p.kode_gol_darah = rgd.kode ) LEFT JOIN ref_eselon re ON j.kode_eselon = re.keselon ) LEFT JOIN master_satuan_kerja msk ON j.id_satker = msk.kode_satker ) LEFT JOIN ref_jns_jab rjj ON j.kode_jns_jab = rjj.kode ) LEFT JOIN ref_kategori_jab rkj ON j.kode_kategori_jab = rkj.kode ) WHERE p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_kedudukan_pegawai = 1 AND r.is_deleted = 0 AND r.tmt_pangkat = ( SELECT MAX( riw_pangkat.tmt_pangkat ) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip AND riw_pangkat.is_deleted = 0 );');
        foreach ($query as $key => $value) {
            // dd($value->nip);
            switch ($value->nama_gol_ruang) {
                case "I/a": $data["gol1a"]++; $data["gol1"]++; $data["jumlahGolongan"]++; break;
                case "I/b": $data["gol1b"]++; $data["gol1"]++; $data["jumlahGolongan"]++; break;
                case "I/c": $data["gol1c"]++; $data["gol1"]++; $data["jumlahGolongan"]++; break;
                case "I/d": $data["gol1d"]++; $data["gol1"]++; $data["jumlahGolongan"]++; break;
                case "II/a": $data["gol2a"]++; $data["gol2"]++; $data["jumlahGolongan"]++; break;
                case "II/b": $data["gol2b"]++; $data["gol2"]++; $data["jumlahGolongan"]++; break;
                case "II/c": $data["gol2c"]++; $data["gol2"]++; $data["jumlahGolongan"]++; break;
                case "II/d": $data["gol2d"]++; $data["gol2"]++; $data["jumlahGolongan"]++; break;
                case "III/a": $data["gol3a"]++; $data["gol3"]++; $data["jumlahGolongan"]++; break;
                case "III/b": $data["gol3b"]++; $data["gol3"]++; $data["jumlahGolongan"]++; break;
                case "III/c": $data["gol3c"]++; $data["gol3"]++; $data["jumlahGolongan"]++; break;
                case "III/d": $data["gol3d"]++; $data["gol3"]++; $data["jumlahGolongan"]++; break;
                case "IV/a": $data["gol4a"]++; $data["gol4"]++; $data["jumlahGolongan"]++; break;
                case "IV/b": $data["gol4b"]++; $data["gol4"]++; $data["jumlahGolongan"]++; break;
                case "IV/c": $data["gol4c"]++; $data["gol4"]++; $data["jumlahGolongan"]++; break;
                case "IV/d": $data["gol4d"]++; $data["gol4"]++; $data["jumlahGolongan"]++; break;
                case "IV/d": $data["gol4e"]++; $data["gol4"]++; $data["jumlahGolongan"]++; break;
                case "III": $data["gol3pppk"]++; $data["jumlahGolongan"]++; break;
                case "V": $data["gol5pppk"]++; $data["jumlahGolongan"]++; break;
                case "VII": $data["gol7pppk"]++; $data["jumlahGolongan"]++; break;
                case "IX": $data["gol9pppk"]++; $data["jumlahGolongan"]++; break;
                case "X": $data["gol10pppk"]++; $data["jumlahGolongan"]++; break;
                default: break;
            }
            $riwPendidikan = RiwPendidikan::where('nip',$value->nip)->where('is_deleted', 0)->orderBy('kode_tingkat_pendidikan','DESC')->first();
            switch ($riwPendidikan['kode_tingkat_pendidikan']) {
                case "01": $data["sd"]++; $data["jumlahPendidikan"]++; break;
                case "02": $data["smp"]++; $data["jumlahPendidikan"]++; break;
                case "03": $data["sma"]++; $data["jumlahPendidikan"]++; break;
                case "04": $data["d1"]++; $data["jumlahPendidikan"]++; break;
                case "05": $data["d2"]++; $data["jumlahPendidikan"]++; break;
                case "06": $data["d3"]++; $data["jumlahPendidikan"]++; break;
                case "07": $data["d4"]++; $data["jumlahPendidikan"]++; break;
                case "08": $data["s1"]++; $data["jumlahPendidikan"]++; break;
                case "09": $data["profesi"]++; $data["jumlahPendidikan"]++; break;
                case "10": $data["s2"]++; $data["jumlahPendidikan"]++; break;
                case "11": $data["s2"]++; $data["jumlahPendidikan"]++; break;
                default: break;
            }
            switch ($value->neselon) {
                case "II a": $data["eselon2a"]++; $data["jumlahEselon"]++; break;
                case "II b": $data["eselon2b"]++; $data["jumlahEselon"]++; break;
                case "III a": $data["eselon3a"]++; $data["jumlahEselon"]++; break;
                case "III b": $data["eselon3b"]++; $data["jumlahEselon"]++; break;
                case "IV a": $data["eselon4a"]++; $data["jumlahEselon"]++; break;
                case "IV b": $data["eselon4b"]++; $data["jumlahEselon"]++; break;
                default: $data["nonEselon"]++; $data["jumlahEselon"]++; break;
            }
            switch ($value->nama_jns_jab) {
                case "JABATAN STRUKTURAL": $data["struktural"]++; $data["jumlahJenisKepegawaian"]++; break;
                case "JABATAN FUNGSIONAL": $data["fungsional"]++; $data["jumlahJenisKepegawaian"]++; break;
                case "JABATAN PELAKSANA": $data["pelaksana"]++; $data["jumlahJenisKepegawaian"]++; break;
                default: break;
            }
            switch ($value->nama_kategori_jab) {
                case "TENAGA TEKNIS": $data["tenagaTeknis"]++; $data["jumlahKategoriKepegawaian"]++; break;
                case "TENAGA KESEHATAN": $data["tenagaKesehatan"]++; $data["jumlahKategoriKepegawaian"]++; break;
                case "TENAGA GURU": $data["tenagaGuru"]++; $data["jumlahKategoriKepegawaian"]++; break;
                default: break;
            }
        }
        $data["laki"] = Pegawai::where('kode_jns_kelamin', 1)->where('kode_kedudukan_pegawai',1)->count();
        $data["perempuan"] = Pegawai::where('kode_jns_kelamin', 2)->where('kode_kedudukan_pegawai',1)->count();
        $data["JumlahPegawaiAktif"] = Pegawai::where('kode_kedudukan_pegawai', 1)->count();
        $data["islam"] = Pegawai::where('kode_agama', 1)->where('kode_kedudukan_pegawai',1)->count();
        $data["kristen"] = Pegawai::where('kode_agama', 2)->where('kode_kedudukan_pegawai',1)->count();
        $data["katholik"] = Pegawai::where('kode_agama', 3)->where('kode_kedudukan_pegawai',1)->count();
        $data["hindu"] = Pegawai::where('kode_agama', 4)->where('kode_kedudukan_pegawai',1)->count();
        $data["buddha"] = Pegawai::where('kode_agama', 5)->where('kode_kedudukan_pegawai',1)->count();
        // $datasets = 1;
        $today = $this->helper->today();
        $data["today"] = $today;
        return view('dataBulanan', $data);
        // $data = Pdf::loadview('dataBulanan',$datasets);
        // $data->setPaper('legal', 'potrait');
        // return $data->stream($datasetPegawai["namaLengkap"].'.pdf');
    }
}
