<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterJabatan;
use App\Models\Pegawai;
use App\Models\Diklat;
use App\Models\RiwJabatan;
use App\Models\RiwPangkat;
use App\Models\RiwPendidikan;
use App\Models\RiwPenghargaan;
use App\Models\RiwHukuman;
use App\Models\RiwKeluarga;

use App\Models\RefGolRuang;
use App\Models\RefJnsKp;
use App\Models\RefTingkatPendidikan;
use App\Models\RefJnsHukuman;
use App\Models\RefTingkatHukuman;
use App\Models\RefHubKeluarga;
use App\Models\RefJnsKelamin;
use App\Models\RefAgama;
use App\Models\RefWilKec;
use App\Models\RefWilKel;
use App\Models\RefWilKab;
use App\Models\RefWilProv;
use App\Models\RefStatusPegawai;

use Barryvdh\DomPDF\Facade\Pdf;

class CetakController extends Controller
{
    public function biodata($nip)
    {
        $datasetPegawai                 = $this->pegawai($nip);
        $datasetsRiwPangkat             = $this->riwPangkat($nip);
        $datasetsRiwJabatan             = $this->riwJabatan($nip);
        $datasetsRiwPendidikan          = $this->riwPendidikan($nip);
        $datasetsRiwDiklatStruktural    = $this->riwDiklat($nip,'01');
        $datasetsRiwDiklatFungsional    = $this->riwDiklat($nip,'02');
        $datasetsRiwDiklatTeknis        = $this->riwDiklat($nip,'03');
        $datasetsRiwPenataran           = $this->riwDiklat($nip,'03');
        $datasetsRiwSeminar             = $this->riwDiklat($nip,'03');
        $datasetsRiwKursus              = $this->riwDiklat($nip,'03');
        $datasetsRiwPenghargaan         = $this->riwPenghargaan($nip);
        $datasetsRiwHukuman             = $this->riwHukuman($nip);
        $datasetsOrangTua               = $this->riwKeluarga($nip,['41','42','43','51','52','53']);
        $datasetsPasangan               = $this->riwKeluarga($nip,['11','12','13','21','22','23']);
        $datasetsAnak                   = $this->riwKeluarga($nip,['31','32','33']);
        $penandatangan                  = $this->penandatangan();
        $today                          = $this->today();

        !isset($datasetPegawai) ? $datasetPegawai = null : $datasetPegawai;
        !isset($datasetsRiwPangkat[0]) ? $datasetsRiwPangkat = null : $datasetsRiwPangkat;
        !isset($datasetsRiwJabatan[0]) ? $datasetsRiwJabatan = null : $datasetsRiwJabatan;
        !isset($datasetsRiwPendidikan[0]) ? $datasetsRiwPendidikan = null : $datasetsRiwPendidikan;
        !isset($datasetsRiwDiklatStruktural[0]) ? $datasetsRiwDiklatStruktural = null : $datasetsRiwDiklatStruktural;
        !isset($datasetsRiwDiklatFungsional[0]) ? $datasetsRiwDiklatFungsional = null : $datasetsRiwDiklatFungsional;
        !isset($datasetsRiwDiklatTeknis[0]) ? $datasetsRiwDiklatTeknis = null : $datasetsRiwDiklatTeknis;
        !isset($datasetsRiwPenataran[0]) ? $datasetsRiwPenataran = null : $datasetsRiwPenataran;
        !isset($datasetsRiwSeminar[0]) ? $datasetsRiwSeminar = null : $datasetsRiwSeminar;
        !isset($datasetsRiwKursus[0]) ? $datasetsRiwKursus = null : $datasetsRiwKursus;
        !isset($datasetsRiwPenghargaan[0]) ? $datasetsRiwPenghargaan = null : $datasetsRiwPenghargaan;
        !isset($datasetsRiwHukuman[0]) ? $datasetsRiwHukuman = null : $datasetsRiwHukuman;
        !isset($datasetsOrangTua[0]) ? $datasetsOrangTua = null : $datasetsOrangTua;
        !isset($datasetsPasangan[0]) ? $datasetsPasangan = null : $datasetsPasangan;
        !isset($datasetsAnak[0]) ? $datasetsAnak = null : $datasetsAnak;

        $datasets['datasetPegawai']                 = $datasetPegawai;
        $datasets['datasetsRiwPangkat']             = $datasetsRiwPangkat;
        $datasets['datasetsRiwJabatan']             = $datasetsRiwJabatan;
        $datasets['datasetsRiwPendidikan']          = $datasetsRiwPendidikan;
        $datasets['datasetsRiwDiklatStruktural']    = $datasetsRiwDiklatStruktural;
        $datasets['datasetsRiwDiklatFungsional']    = $datasetsRiwDiklatFungsional;
        $datasets['datasetsRiwDiklatTeknis']        = $datasetsRiwDiklatTeknis;
        $datasets['datasetsRiwPenataran']           = $datasetsRiwPenataran;
        $datasets['datasetsRiwSeminar']             = $datasetsRiwSeminar;
        $datasets['datasetsRiwKursus']              = $datasetsRiwKursus;
        $datasets['datasetsRiwPenghargaan']         = $datasetsRiwPenghargaan;
        $datasets['datasetsRiwHukuman']             = $datasetsRiwHukuman;
        $datasets['datasetsOrangTua']               = $datasetsOrangTua;
        $datasets['datasetsPasangan']               = $datasetsPasangan;
        $datasets['datasetsAnak']                   = $datasetsAnak;
        $datasets['penandatangan']                  = $penandatangan;
        $datasets['today']                          = $today;

        $biodata = Pdf::loadview('biodata',$datasets);
        $biodata->setPaper('legal', 'potrait');
        return $biodata->stream('biodata.pdf');
    }

    function pegawai($nip){
        $pegawai = Pegawai::where('nip',$nip)->first();
        if ($pegawai != null || !empty($pegawai) || $pegawai != "") {
        $ref_jns_kelamin = RefJnsKelamin::all();
        $ref_agama = RefAgama::all();
        $ref_wil_kel = RefWilKel::all();
        $ref_wil_kec = RefWilKec::all();
        $ref_wil_kab = RefWilKab::all();
        $ref_wil_prov = RefWilProv::all();
        $refTingkatPendidikan = RefTingkatPendidikan::all();
        $ref_status_pegawai = RefStatusPegawai::all();
        $ref_gol_ruang = RefGolRuang::all();
        $ref_jns_kp = RefJnsKp::all();
        $nip1 = substr($pegawai['nip'],0,8);
        $nip2 = substr($pegawai['nip'],8,6);
        $nip3 = substr($pegawai['nip'],14,1);
        $nip4 = substr($pegawai['nip'],15,3);
        $nip = $nip1." ".$nip2." ".$nip3." ".$nip4;
        $namaLengkap = strtolower($pegawai['nama']);
        if ($pegawai['gelar_depan'] != null || !empty($pegawai['gelar_depan']) || $pegawai['gelar_depan'] != "") {
            $namaLengkap = $pegawai['gelar_depan'].". ".$namaLengkap;
        }
        if ($pegawai['gelar_belakang'] != null || !empty($pegawai['gelar_belakang']) || $pegawai['gelar_belakang'] != "") {
            $namaLengkap = $namaLengkap.", ".$pegawai['gelar_belakang'];
        }
        if ($pegawai['kode_jns_kelamin'] != null || !empty($pegawai['kode_jns_kelamin']) || $pegawai['kode_jns_kelamin'] != "") {
            foreach ($ref_jns_kelamin as $refJnsKelamin) {
                if ($pegawai['kode_jns_kelamin'] === $refJnsKelamin['kode']) {
                    $pegawai['kelamin'] = strtolower($refJnsKelamin['nama_jns_kelamin']);
                }
            }
        } else {
            $pegawai['kelamin'] = "-";
        }
        if ($pegawai['kota_lahir'] === null || empty($pegawai['kota_lahir']) || $pegawai['kota_lahir'] === "") {
            $pegawai['kota_lahir'] = null;
        }
        if ($pegawai['tanggal_lahir'] === null || empty($pegawai['tanggal_lahir']) || $pegawai['tanggal_lahir'] === "") {
            $pegawai['tanggal_lahir'] = null;
        }
        if ($pegawai['kota_lahir'] === null && $pegawai['tanggal_lahir'] != null) {
            $pegawai['lahir'] = $pegawai['tanggal_lahir'];
        }
        if ($pegawai['tanggal_lahir'] === null && $pegawai['kota_lahir'] != null) {
            $pegawai['lahir'] = strtolower($pegawai['kota_lahir']);
        }
        ($pegawai['tanggal_lahir'] != null && $pegawai['kota_lahir'] != null) ?
            $pegawai['lahir'] = strtolower($pegawai['kota_lahir']).", ".$this->tanggalIndo(date('d',strtotime($pegawai['tanggal_lahir'])), date('m',strtotime($pegawai['tanggal_lahir'])), date('Y',strtotime($pegawai['tanggal_lahir']))) :
                $pegawai['lahir'] = "-" ;
        if ($pegawai['kode_agama'] != null || !empty($pegawai['kode_agama']) || $pegawai['kode_agama'] != "") {
            foreach ($ref_agama as $refAgama) {
                if ($pegawai['kode_agama'] === $refAgama['kode']) {
                    $pegawai['agama'] = strtolower($refAgama['nama_agama']);
                }
            }
        } else {
            $pegawai['agama'] = "-";
        }
        if ($pegawai['alamat'] === null || empty($pegawai['alamat']) || $pegawai['alamat'] === "") {
            $pegawai['alamat'] = "-";
        }
        if ($pegawai['rt'] === null || empty($pegawai['rt']) || $pegawai['rt'] === "") {
            $pegawai['rt'] = "-";
        }
        if ($pegawai['rw'] === null || empty($pegawai['rw']) || $pegawai['rw'] === "") {
            $pegawai['rw'] = "-";
        }
        if ($pegawai['kode_wil_kel'] != null || !empty($pegawai['kode_wil_kel']) || $pegawai['kode_wil_kel'] != "") {
            foreach ($ref_wil_kel as $refWilKel) {
                if ($pegawai['kode_wil_kel'] === $refWilKel['kode']) {
                    $pegawai['kelurahan'] = strtolower($refWilKel['nama_wil_kel']);
                }
            }
        } else {
            $pegawai['kelurahan'] = "-";
        }
        if ($pegawai['kode_wil_prov'] != null || !empty($pegawai['kode_wil_prov']) || $pegawai['kode_wil_prov'] != "") {
            foreach ($ref_wil_prov as $refWilProv) {
                if ($pegawai['kode_wil_prov'] === $refWilProv['kode']) {
                    $pegawai['provinsi'] = strtolower($refWilProv['nama_wil_prov']);
                }
            }
        } else {
            $pegawai['provinsi'] = "-";
        }
        if ($pegawai['kode_wil_kab'] != null || !empty($pegawai['kode_wil_kab']) || $pegawai['kode_wil_kab'] != "") {
            foreach ($ref_wil_kab as $refWilKab) {
                if ($pegawai['kode_wil_kab'] === $refWilKab['kode']) {
                    $pegawai['kabupaten'] = strtolower($refWilKab['nama_wil_kab']);
                }
            }
        } else {
            $pegawai['kabupaten'] = "-";
        }
        if ($pegawai['kode_wil_kec'] != null || !empty($pegawai['kode_wil_kec']) || $pegawai['kode_wil_kec'] != "") {
            foreach ($ref_wil_kec as $refWilKec) {
                if ($pegawai['kode_wil_kec'] === $refWilKec['kode']) {
                    $pegawai['kecamatan'] = strtolower($refWilKec['nama_wil_kec']);
                }
            }
        } else {
            $pegawai['kecamatan'] = "-";
        }
        $alamat = strtolower($pegawai['alamat']);
        $rtrwkel = 'RT. '.strtolower($pegawai['rt']).', RW. '.strtolower($pegawai['rw']).', Kelurahan/Desa '.$pegawai['kelurahan'];
        $keckabprov = 'Kecamatan '.$pegawai['kecamatan'].', Kabupaten/Kota '.$pegawai['kabupaten'].', Provinsi '.$pegawai['provinsi'];
        $datasetPendidikanTerakhir  = RiwPendidikan::where('nip',$pegawai['nip'])->where('is_deleted', 0)->orderBy('kode_tingkat_pendidikan','DESC')->first();
        if ($datasetPendidikanTerakhir['kode_tingkat_pendidikan'] != null || !empty($datasetPendidikanTerakhir['kode_tingkat_pendidikan']) || $datasetPendidikanTerakhir['kode_tingkat_pendidikan'] != ""){
            foreach ($refTingkatPendidikan as $ref) {
                if (strval($datasetPendidikanTerakhir['kode_tingkat_pendidikan']) === $ref['kode']) {
                    $datasetPendidikanTerakhir['tingkatPendidikan'] = $ref['nama_tingkat_pendidikan_lengkap'];
                }
            }
        } else {
            $datasetPendidikanTerakhir['tingkatPendidikan'] = "-";
        }
        if ($datasetPendidikanTerakhir['program_studi'] === null || empty($datasetPendidikanTerakhir['program_studi']) || $datasetPendidikanTerakhir['program_studi'] === "") {
            $datasetPendidikanTerakhir['program_studi'] = "-";
        }
        if ($datasetPendidikanTerakhir['nama_institusi'] === null || empty($datasetPendidikanTerakhir['nama_institusi']) || $datasetPendidikanTerakhir['nama_institusi'] === "") {
            $datasetPendidikanTerakhir['nama_institusi'] = "-";
        }
        ($datasetPendidikanTerakhir['tanggal_ijazah'] === null || empty($datasetPendidikanTerakhir['tanggal_ijazah']) || $datasetPendidikanTerakhir['tanggal_ijazah'] === "") ?
            $datasetPendidikanTerakhir['tahunLulus'] = "-" :
                $datasetPendidikanTerakhir['tahunLulus'] = date('Y',strtotime($datasetPendidikanTerakhir['tanggal_ijazah']));
        $pendidikanTingkatAkhir = strtolower($datasetPendidikanTerakhir['tingkatPendidikan']).' '.strtolower($datasetPendidikanTerakhir['program_studi']);
        $pendidikanTingkatSekolah = strtolower($datasetPendidikanTerakhir['nama_institusi']).' - Tahun '.$datasetPendidikanTerakhir['tahunLulus'];
        if ($pegawai['kode_status_pegawai'] != null || !empty($pegawai['kode_status_pegawai']) || $pegawai['kode_status_pegawai'] != "") {
            foreach ($ref_status_pegawai as $refStatusPegawai) {
                if ($pegawai['kode_status_pegawai'] === $refStatusPegawai['kode']) {
                    $pegawai['status'] = $refStatusPegawai['nama_status_pegawai'];
                }
            }
        } else {
            $pegawai['status'] = "-";
        }
        $datasetPangkat = RiwPangkat::where('nip',$pegawai['nip'])->where('is_deleted', 0)->orderBy('tmt_pangkat','DESC')->first();
        if ($datasetPangkat['kode_gol_ruang'] != null || !empty($datasetPangkat['kode_gol_ruang']) || $datasetPangkat['kode_gol_ruang'] != "") {
            foreach ($ref_gol_ruang as $refGolRuang) {
                if (strval($datasetPangkat['kode_gol_ruang']) === $refGolRuang['kode']) {
                    $datasetPangkat['namaPangkat'] = $refGolRuang['nama_pangkat'];
                    $datasetPangkat['namaGolRuang'] = $refGolRuang['nama_gol_ruang'];
                }
            }
        } else {
            $datasetPangkat['namaPangkat'] = "-";
            $datasetPangkat['namaGolRuang'] = "-";
        }
        if ($datasetPangkat['kode_jns_kp'] != null || !empty($datasetPangkat['kode_jns_kp']) || $datasetPangkat['kode_jns_kp'] != ""){
            foreach ($ref_jns_kp as $refJnsKp) {
                if ($datasetPangkat['kode_jns_kp'] === (int)$refJnsKp['kode']) {
                    $datasetPangkat['keterangan'] = $refJnsKp['nama_jns_kp'];
                }
            }
        } else {
            $datasetPangkat['keterangan'] = "-";
        }
        ($datasetPangkat['tmt_pangkat'] === null || empty($datasetPangkat['tmt_pangkat']) || $datasetPangkat['tmt_pangkat'] === "") ?
            $datasetPangkat['tmt_pangkat'] = "-" :
                $datasetPangkat['tmt_pangkat'] = $this->tanggalIndo(date('d',strtotime($datasetPangkat['tmt_pangkat'])), date('m',strtotime($datasetPangkat['tmt_pangkat'])), date('Y',strtotime($datasetPangkat['tmt_pangkat'])));
        $pangkatAkhir = strtolower($datasetPangkat['namaPangkat']).' ('.$datasetPangkat['namaGolRuang'].')';
        $pangkatTMTAkhir = 'TMT. '.$datasetPangkat['tmt_pangkat'];
        $datasetJabatan = RiwJabatan::where('nip',$pegawai['nip'])->where('is_deleted', 0)->orderBy('tmt_jab','DESC')->first();
        if ($datasetJabatan['nama_jab'] === null || empty($datasetJabatan['nama_jab']) || $datasetJabatan['nama_jab'] === "") {
            $datasetJabatan['nama_jab'] = "-";
        }
        if ($datasetJabatan['nama_satuan_kerja'] === null || empty($datasetJabatan['nama_satuan_kerja']) || $datasetJabatan['nama_satuan_kerja'] === "") {
            $datasetJabatan['nama_satuan_kerja'] = "-";
        }
        if ($datasetJabatan['nama_unit_kerja'] === null || empty($datasetJabatan['nama_unit_kerja']) || $datasetJabatan['nama_unit_kerja'] === "") {
            $datasetJabatan['nama_unit_kerja'] = "-";
        }
        ($datasetJabatan['tmt_jab'] === null || empty($datasetJabatan['tmt_jab']) || $datasetJabatan['tmt_jab'] === "") ?
            $datasetJabatan['tmt_jab'] = "-" :
                $datasetJabatan['tmt_jab'] = $this->tanggalIndo(date('d',strtotime($datasetJabatan['tmt_jab'])), date('m',strtotime($datasetJabatan['tmt_jab'])), date('Y',strtotime($datasetJabatan['tmt_jab'])));
        $jabatanTMTAkhir = 'TMT. '.$datasetJabatan['tmt_jab'];
        $jabatanSatkerAkhir = strtolower($datasetJabatan['nama_satuan_kerja']);
        $jabatanUnorAkhir = strtolower($datasetJabatan['nama_unit_kerja']);
        $jabatanAkhir = strtolower($datasetJabatan['nama_jab']);
        $datasetPegawai['nip'] = $nip;
        $datasetPegawai['namaLengkap'] = $namaLengkap;
        $datasetPegawai['lahir'] = $pegawai['lahir'];
        $datasetPegawai['kelamin'] = $pegawai['kelamin'];
        $datasetPegawai['agama'] = $pegawai['agama'];
        $datasetPegawai['alamat'] = $alamat;
        $datasetPegawai['rtrwkel'] = $rtrwkel;
        $datasetPegawai['keckabprov'] = $keckabprov;
        $datasetPegawai['pendidikanTingkatAkhir'] = $pendidikanTingkatAkhir;
        $datasetPegawai['pendidikanTingkatSekolah'] = $pendidikanTingkatSekolah;
        $datasetPegawai['status'] = $pegawai['status'];
        $datasetPegawai['pangkatAkhir'] = $pangkatAkhir;
        $datasetPegawai['pangkatTMTAkhir'] = $pangkatTMTAkhir;
        $datasetPegawai['jabatanTMTAkhir'] = $jabatanTMTAkhir;
        $datasetPegawai['jabatanSatkerAkhir'] = $jabatanSatkerAkhir;
        $datasetPegawai['jabatanUnorAkhir'] = $jabatanUnorAkhir;
        $datasetPegawai['jabatanAkhir'] = $jabatanAkhir;
        } else {
            $datasetPegawai = null;
        }
        return $datasetPegawai;
    }

    function riwPangkat($nip) {
        $ref_gol_ruang = RefGolRuang::all();
        $ref_jns_kp = RefJnsKp::all();
        $datasetsRiwPangkat = RiwPangkat::where('nip',$nip)->where('is_deleted', 0)->orderBy('tmt_pangkat','ASC')->get();
        foreach ($datasetsRiwPangkat as $key => $value) {
            if ($value['kode_gol_ruang'] != null || !empty($value['kode_gol_ruang']) || $value['kode_gol_ruang'] != "") {
                foreach ($ref_gol_ruang as $refGolRuang) {
                    if (strval($value['kode_gol_ruang']) === $refGolRuang['kode']) {
                        $value['namaPangkat'] = $refGolRuang['nama_pangkat'];
                        $value['namaGolRuang'] = $refGolRuang['nama_gol_ruang'];
                    }
                }
            } else {
                $value['namaPangkat'] = "-";
                $value['namaGolRuang'] = "-";
            }
            if ($value['kode_jns_kp'] != null || !empty($value['kode_jns_kp']) || $value['kode_jns_kp'] != ""){
                foreach ($ref_jns_kp as $refJnsKp) {
                    if ($value['kode_jns_kp'] === (int)$refJnsKp['kode']) {
                        $value['keterangan'] = $refJnsKp['nama_jns_kp'];
                    }
                }
            } else {
                $value['keterangan'] = "-";
            }
            ($value['tmt_pangkat'] === null || empty($value['tmt_pangkat']) || $value['tmt_pangkat'] === "") ?
                $value['tmt_pangkat'] = "-" :
                    $value['tmt_pangkat'] = $this->tanggalIndo(date('d',strtotime($value['tmt_pangkat'])), date('m',strtotime($value['tmt_pangkat'])), date('Y',strtotime($value['tmt_pangkat'])));
        }
        return $datasetsRiwPangkat;
    }

    function riwJabatan($nip) {
        $datasetsRiwJabatan = RiwJabatan::where('nip',$nip)->where('is_deleted', 0)->orderBy('tmt_jab','ASC')->get();
        foreach ($datasetsRiwJabatan as $key => $value) {
            if ($value['nama_jab'] === null || empty($value['nama_jab']) || $value['nama_jab'] === "") {
                $value['nama_jab'] = "-";
            }
            if ($value['nama_satuan_kerja'] === null || empty($value['nama_satuan_kerja']) || $value['nama_satuan_kerja'] === "") {
                $value['nama_satuan_kerja'] = "-";
            }
            if ($value['nama_unit_kerja'] === null || empty($value['nama_unit_kerja']) || $value['nama_unit_kerja'] === "") {
                $value['nama_unit_kerja'] = "-";
            }
            ($value['tmt_jab'] === null || empty($value['tmt_jab']) || $value['tmt_jab'] === "") ?
                $value['tmt_jab'] = "-" :
                    $value['tmt_jab'] = $this->tanggalIndo(date('d',strtotime($value['tmt_jab'])), date('m',strtotime($value['tmt_jab'])), date('Y',strtotime($value['tmt_jab'])));
        }
        return $datasetsRiwJabatan;
    }

    function riwPendidikan($nip) {
        $refTingkatPendidikan = RefTingkatPendidikan::all();
        $datasetsRiwPendidikan  = RiwPendidikan::where('nip',$nip)->where('is_deleted', 0)->orderBy('kode_tingkat_pendidikan','ASC')->get();
        foreach ($datasetsRiwPendidikan as $key => $value) {
            if ($value['kode_tingkat_pendidikan'] != null || !empty($value['kode_tingkat_pendidikan']) || $value['kode_tingkat_pendidikan'] != ""){
                foreach ($refTingkatPendidikan as $ref) {
                    if (strval($value['kode_tingkat_pendidikan']) === $ref['kode']) {
                        $value['tingkatPendidikan'] = $ref['nama_tingkat_pendidikan_lengkap'];
                    }
                }
            } else {
                $value['tingkatPendidikan'] = "-";
            }
            if ($value['program_studi'] === null || empty($value['program_studi']) || $value['program_studi'] === "") {
                $value['program_studi'] = "-";
            }
            if ($value['nama_institusi'] === null || empty($value['nama_institusi']) || $value['nama_institusi'] === "") {
                $value['nama_institusi'] = "-";
            }
            ($value['tanggal_ijazah'] === null || empty($value['tanggal_ijazah']) || $value['tanggal_ijazah'] === "") ?
                $value['tahunLulus'] = "-" :
                    $value['tahunLulus'] = date('Y',strtotime($value['tanggal_ijazah']));
        }
        return $datasetsRiwPendidikan;
    }

    function riwDiklat($nip,$kodeDiklat) {
        $datasetsRiwDiklat = Diklat::where('nip',$nip)->where('kode_jns_diklat',$kodeDiklat)->where('is_deleted', 0)->orderBy('tanggal_sertifikat','ASC')->get();
        foreach ($datasetsRiwDiklat as $key => $value) {
            if ($value['nama_diklat'] === null || empty($value['nama_diklat']) || $value['nama_diklat'] === "") {
                $value['nama_diklat'] = "-";
            }
            if ($value['tempat'] === null || empty($value['tempat']) || $value['tempat'] === "") {
                $value['tempat'] = "-";
            }
            if ($value['panitia'] === null || empty($value['panitia']) || $value['panitia'] === "") {
                $value['panitia'] = "-";
            }
            ($value['tanggal_sertifikat'] === null || empty($value['tanggal_sertifikat']) || $value['tanggal_sertifikat'] === "") ?
                $value['tahun'] = "-" :
                    $value['tahun'] = date('Y',strtotime($value['tanggal_sertifikat']));
        }
        return $datasetsRiwDiklat;
    }

    function riwPenghargaan($nip) {
        $datasetsPenghargaan = RiwPenghargaan::where('nip',$nip)->where('is_deleted', 0)->orderBy('tanggal','ASC')->get();
        foreach ($datasetsPenghargaan as $key => $value) {
            if ($value['nama_penghargaan'] === null || empty($value['nama_penghargaan']) || $value['nama_penghargaan'] === "") {
                $value['nama_penghargaan'] = "-";
            }
            if ($value['nama_pemberi'] === null || empty($value['nama_pemberi']) || $value['nama_pemberi'] === "") {
                $value['nama_pemberi'] = "-";
            }
            ($value['tanggal'] === null || empty($value['tanggal']) || $value['tanggal'] === "") ?
                $value['tahun'] = "-" :
                    $value['tahun'] = date('Y',strtotime($value['tanggal_sertifikat']));
        }
        return $datasetsPenghargaan;
    }

    function riwHukuman($nip) {
        $datasetsHukuman = RiwHukuman::where('nip',$nip)->where('is_deleted', 0)->orderBy('tmt_hukuman','ASC')->get();
        $ref_jns_hukuman = RefJnsHukuman::all();
        $ref_tingkat_hukuman = RefTingkatHukuman::all();
        foreach ($datasetsHukuman as $key => $value) {

            if ($value['kode_jns_hukuman'] != null || !empty($value['kode_jns_hukuman']) || $value['kode_jns_hukuman'] != "") {
                foreach ($ref_jns_hukuman as $refJnsHukuman) {
                    if ($value['kode_jns_hukuman'] === $refJnsHukuman['kode']) {
                        $value['jenis']   = $refJnsHukuman['nama_hukuman'];
                    }
                }
            } else {
                $value['jenis'] = "-";
            }
            if ($value['kode_tingkat_hukuman'] != null || !empty($value['kode_tingkat_hukuman']) || $value['kode_tingkat_hukuman'] != "") {
                foreach ($ref_tingkat_hukuman as $refTingkatHukuman) {
                    if ($value['kode_tingkat_hukuman'] === $refTingkatHukuman['kode']) {
                        $value['tingkat']   = $refTingkatHukuman['nama_tingkat'];
                    }
                }
            } else {
                $value['tingkat'] = "-";
            }
            ($value['tmt_hukuman'] === null || empty($value['tmt_hukuman']) || $value['tmt_hukuman'] === "") ?
                $value['tmt_hukuman'] = "-" :
                    $value['tmt_hukuman'] = date('d-m-Y',strtotime($value['tmt_hukuman']));
        }
        return $datasetsHukuman;
    }

    function riwKeluarga($nip,$kodeHubungan) {
        $datasets = RiwKeluarga::where('nip',$nip)->wherein('kode_hub_keluarga',$kodeHubungan)->where('is_deleted', 0)->orderBy('kode_hub_keluarga','ASC')->get();
        $ref_hub_keluarga = RefHubKeluarga::all();
        $ref_jns_kelamin = RefJnsKelamin::all();
        foreach ($datasets as $key => $value) {
            if ($value['nama_keluarga'] === null || empty($value['nama_keluarga']) || $value['nama_keluarga'] === "") {
                $value['nama_keluarga'] = "-";
            }
            if ($value['kota_lahir'] === null || empty($value['kota_lahir']) || $value['kota_lahir'] === "") {
                $value['kota_lahir'] = null;
            }
            if ($value['tanggal_lahir'] === null || empty($value['tanggal_lahir']) || $value['tanggal_lahir'] === "") {
                $value['tanggal_lahir'] = null;
            } else {
                $value['tanggal_lahir'] = $this->tanggalIndo(date('d',strtotime($value['tanggal_lahir'])), date('m',strtotime($value['tanggal_lahir'])), date('Y',strtotime($value['tanggal_lahir'])));
            }
            if ($value['kota_lahir'] === null && $value['tanggal_lahir'] != null) {
                $value['lahir'] = $value['tanggal_lahir'];
            }
            if ($value['tanggal_lahir'] === null && $value['kota_lahir'] != null) {
                $value['lahir'] = $value['kota_lahir'];
            }
            ($value['tanggal_lahir'] != null && $value['kota_lahir'] != null) ?
                $value['lahir'] = $value['kota_lahir'].", ".$this->tanggalIndo(date('d',strtotime($value['tanggal_lahir'])), date('m',strtotime($value['tanggal_lahir'])), date('Y',strtotime($value['tanggal_lahir']))) :
                    $value['lahir'] = "-" ;
            if ($value['keterangan_pekerjaan'] === null || empty($value['keterangan_pekerjaan']) || $value['keterangan_pekerjaan'] === "") {
                $value['keterangan_pekerjaan'] = "-";
            }
            if ($value['kode_hub_keluarga'] != null || !empty($value['kode_hub_keluarga']) || $value['kode_hub_keluarga'] != "") {
                foreach ($ref_hub_keluarga as $refHubKeluarga) {
                    if ($value['kode_hub_keluarga'] === $refHubKeluarga['kode']) {
                        $value['hubungan'] = $refHubKeluarga['nama_hub_keluarga'];
                    }
                }
            } else {
                $value['hubungan'] = "-";
            }
            if ($value['kode_jns_kelamin'] != null || !empty($value['kode_jns_kelamin']) || $value['kode_jns_kelamin'] != "") {
                foreach ($ref_jns_kelamin as $refJnsKelamin) {
                    if ($value['kode_jns_kelamin'] === $refJnsKelamin['kode']) {
                        $value['kelamin'] = $refJnsKelamin['nama_jns_kelamin'];
                    }
                }
            } else {
                $value['kelamin'] = "-";
            }
        }
        return $datasets;
    }

    function penandatangan() {
        $masterjab = MasterJabatan::where('id_satker', '0419000000')->where('id_unker','0419000000')->where('is_delete',0)->first();
        $penandatangan = Pegawai::where('nip',$masterjab['nip_defenitif'])->first();
        $namaPenandatangan = $penandatangan['nama'];
        if ($penandatangan['gelar_depan'] != null || !empty($penandatangan['gelar_depan']) || $penandatangan['gelar_depan'] != "") {
            $namaPenandatangan = $penandatangan['gelar_depan'].". ".$namaPenandatangan;
        }
        if ($penandatangan['gelar_belakang'] != null || !empty($penandatangan['gelar_belakang']) || $penandatangan['gelar_belakang'] != "") {
            $namaPenandatangan = $namaPenandatangan.", ".$penandatangan['gelar_belakang'];
        }
        $nipPenandatangan1 = substr($penandatangan['nip'],0,8);
        $nipPenandatangan2 = substr($penandatangan['nip'],8,6);
        $nipPenandatangan3 = substr($penandatangan['nip'],14,1);
        $nipPenandatangan4 = substr($penandatangan['nip'],15,3);
        $nipPenandatangan = $nipPenandatangan1." ".$nipPenandatangan2." ".$nipPenandatangan3." ".$nipPenandatangan4;
        $riwPangkat = RiwPangkat::where('nip',$masterjab['nip_defenitif'])->orderBy('kode_gol_ruang','DESC')->first();
        $pangkat = RefGolRuang::where('kode',$riwPangkat['kode_gol_ruang'])->first();
        $identitasPenandatangan['nipPenandatangan'] = $nipPenandatangan;
        $identitasPenandatangan['namaPenandatangan'] = $namaPenandatangan;
        $identitasPenandatangan['namaPangkat'] = strtolower($pangkat['nama_pangkat']);
        return $identitasPenandatangan;
    }

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

    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show(string $id)
    // {
    //     //
    // }

    // public function edit(string $id)
    // {
    //     //
    // }

    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // public function destroy(string $id)
    // {
    //     //
    // }
}
