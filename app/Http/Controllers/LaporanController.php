<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Helper;

use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    private $helper;

    public function __construct()
    {
        $this->helper = new Helper;
    }

    public function dataBulanan() {
        $gol1 = $gol2 = $gol3 = $gol4 = $gol3pppk = $gol5pppk = $gol7pppk = $gol9pppk = $gol10pppk = $jumlahGolongan = $sd = $smp = $sma = $d1 = $d2 = $d3 = $d4 = $s1 = $profesi = $s2 = $jumlahPendidikan = $laki = $perempuan = $jumlahKelamin = $eselon2a = $eselon2b = $eselon3a = $eselon3b = $eselon4a = $eselon4b = $nonEselon = $jumlahEselon = $islam = $kristen = $katholik = $hindu = $buddha = $jumlahAgama = $struktural = $fungsional = $pelaksana = $jumlahJenisKepegawaian = $tenagaTeknis = $tenagaKesehatan = $tenagaGuru = $jumlahKategoriKepegawaian = 0;
        $query = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, p.nama AS namaLengkap, p.kota_lahir, p.tanggal_lahir, jk.nama_jns_kelamin, p.nip as tingkatPendidikan, p.nip as programStudi, g.nama_gol_ruang, g.nama_pangkat, r.tmt_pangkat, re.neselon, rjj.nama_jns_jab, rkj.nama_kategori_jab, j.nama_jab, j.nama_jab as tmt_jab, msk.satuan_kerja, j.id_unker AS idunkersimpeg, j.id_unker AS unker1, j.id_unker AS unker2, j.id_unker AS unker3, ra.nama_agama, rsp.nama_status_pegawai, rjp.nama_jns_pegawai, rsk.nama_status_kawin, rgd.nama_gol_darah, p.alamat, rwp.nama_wil_prov, rwkab.nama_wil_kab, rwkec.nama_wil_kec, rwkel.nama_wil_kel, p.rt, p.rw, p.no_hp, p.email, p.no_karpeg, p.no_bpjs, p.no_taspen, p.no_karis_su, p.npwp, p.nik, p.no_kk, p.no_akta, p.catatan, p.keterangan FROM ((((((((((((((((( pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif ) LEFT JOIN riw_pangkat r ON p.nip = r.nip ) LEFT JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode ) LEFT JOIN ref_wil_prov rwp ON p.kode_wil_prov = rwp.kode ) LEFT JOIN ref_wil_kab rwkab ON p.kode_wil_kab = rwkab.kode ) LEFT JOIN ref_wil_kec rwkec ON p.kode_wil_kec = rwkec.kode ) LEFT JOIN ref_wil_kel rwkel ON p.kode_wil_kel = rwkel.kode ) LEFT JOIN ref_jns_kelamin jk ON p.kode_jns_kelamin = jk.kode ) LEFT JOIN ref_agama ra ON p.kode_agama = ra.kode ) LEFT JOIN ref_status_pegawai rsp ON p.kode_status_pegawai = rsp.kode ) LEFT JOIN ref_jns_pegawai rjp ON p.kode_jns_pegawai = rjp.kode ) LEFT JOIN ref_status_kawin rsk ON p.kode_status_kawin = rsk.kode ) LEFT JOIN ref_gol_darah rgd ON p.kode_gol_darah = rgd.kode ) LEFT JOIN ref_eselon re ON j.kode_eselon = re.keselon ) LEFT JOIN master_satuan_kerja msk ON j.id_satker = msk.kode_satker ) LEFT JOIN ref_jns_jab rjj ON j.kode_jns_jab = rjj.kode ) LEFT JOIN ref_kategori_jab rkj ON j.kode_kategori_jab = rkj.kode ) WHERE p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_kedudukan_pegawai = 1 AND r.is_deleted = 0 AND r.tmt_pangkat = ( SELECT MAX( riw_pangkat.tmt_pangkat ) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip AND riw_pangkat.is_deleted = 0 );');
        foreach ($query as $key => $value) {
            // dd($value->nip);
            switch ($value->nama_gol_ruang) {
                case "I/a": $gol1++; $jumlahGolongan++; break;
                case "I/b": $gol1++; $jumlahGolongan++; break;
                case "I/c": $gol1++; $jumlahGolongan++; break;
                case "I/d": $gol1++; $jumlahGolongan++; break;
                case "II/a": $gol2++; $jumlahGolongan++; break;
                case "II/b": $gol2++; $jumlahGolongan++; break;
                case "II/c": $gol2++; $jumlahGolongan++; break;
                case "II/d": $gol2++; $jumlahGolongan++; break;
                case "III/a": $gol3++; $jumlahGolongan++; break;
                case "III/b": $gol3++; $jumlahGolongan++; break;
                case "III/c": $gol3++; $jumlahGolongan++; break;
                case "III/d": $gol3++; $jumlahGolongan++; break;
                case "IV/a": $gol4++; $jumlahGolongan++; break;
                case "IV/b": $gol4++; $jumlahGolongan++; break;
                case "IV/c": $gol4++; $jumlahGolongan++; break;
                case "IV/d": $gol4++; $jumlahGolongan++; break;
                case "III": $gol3pppk++; $jumlahGolongan++; break;
                case "V": $gol5pppk++; $jumlahGolongan++; break;
                case "VII": $gol7pppk++; $jumlahGolongan++; break;
                case "IX": $gol9pppk++; $jumlahGolongan++; break;
                case "X": $gol10pppk++; $jumlahGolongan++; break;
                default:
                    break;
            }
        }
        $datasets = 1;
        $today = $this->helper->today();
        $data["today"] = $today;
        return view('dataBulanan', $data);
        // $data = Pdf::loadview('dataBulanan',$datasets);
        // $data->setPaper('legal', 'potrait');
        // return $data->stream($datasetPegawai["namaLengkap"].'.pdf');
    }
}
