<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ToModel;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Illuminate\Support\Facades\DB;

use App\Models\Pegawai;
use App\Models\RefUnitKerja;
use App\Models\MasterJabatan;
use App\Models\RefSatuanKerja;

class OpdDataExport implements FromCollection
{
    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $result = [];
        $query = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, p.kota_lahir, p.tanggal_lahir, jk.nama_jns_kelamin, rtp.nama_tingkat_pendidikan_lengkap, rp.program_studi, g.nama_gol_ruang, g.nama_pangkat, r.tmt_pangkat, re.neselon, rjj.nama_jns_jab, rkj.nama_kategori_jab, j.nama_jab, msk.satuan_kerja, j.id_unker as unker1, j.id_unker as unker2, j.id_unker as unker3, ra.nama_agama, rsp.nama_status_pegawai, rjp.nama_jns_pegawai, rsk.nama_status_kawin, rgd.nama_gol_darah, p.alamat,  p.rt,  p.rw,  p.no_hp, p.email, p.no_karpeg, p.no_bpjs, p.no_taspen, p.no_karis_su, p.npwp, p.nik, p.no_kk, p.no_akta, p.catatan, p.keterangan FROM (((((((((((((((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) LEFT JOIN riw_pangkat r ON p.nip = r.nip) LEFT JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) LEFT JOIN ref_jns_kelamin jk ON p.kode_jns_kelamin = jk.kode)LEFT JOIN ref_agama ra ON p.kode_agama = ra.kode)LEFT JOIN ref_status_pegawai rsp ON p.kode_status_pegawai = rsp.kode)LEFT JOIN ref_jns_pegawai rjp ON p.kode_jns_pegawai = rjp.kode) LEFT JOIN ref_status_kawin rsk ON p.kode_status_kawin = rsk.kode) LEFT JOIN ref_gol_darah rgd ON p.kode_gol_darah = rgd.kode) LEFT JOIN ref_eselon re ON j.kode_eselon = re.keselon) LEFT JOIN master_satuan_kerja msk ON j.id_satker = msk.kode_satker) LEFT JOIN ref_jns_jab rjj ON j.kode_jns_jab = rjj.kode) LEFT JOIN riw_pendidikan rp ON p.nip = rp.nip) LEFT JOIN ref_tingkat_pendidikan rtp ON rp.kode_tingkat_pendidikan = rtp.kode) LEFT JOIN ref_kategori_jab rkj ON j.kode_kategori_jab = rkj.kode) WHERE p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_kedudukan_pegawai = 1 AND r.is_deleted = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip) AND rp.id = (SELECT MAX(riw_pendidikan.id) FROM riw_pendidikan WHERE rp.nip = nip);');
        $satker = substr($this->id, 0, 4)."000000";
        $satuanKerja = RefSatuanKerja::where('id_satuan_kerja', $satker)->first();
        $unitKerja = RefUnitKerja::where('id_satuan_kerja', $satker)->orderBy('id_unit_kerja', 'ASC')->get();
        $kabandis = MasterJabatan::where('id_unker',$satker)->where('is_delete',0)->orderBy('id', 'DESC')->first();
        // dd($kabandis );
        $nip = "";
        $gelar_depan = "";
        $nama = "";
        $gelar_belakang = "";
        $kota_lahir = "";
        $tanggal_lahir = "";
        $nama_jns_kelamin = "";
        $nama_tingkat_pendidikan_lengkap = "";
        $program_studi = "";
        $nama_gol_ruang = "";
        $nama_pangkat = "";
        $tmt_pangkat = "";
        $neselon = "";
        $nama_jns_jab = "";
        $kategori_jab = "";
        $nama_jab = "";
        $satuan_kerja = "";
        $unker1 = "";
        $unker2 = "";
        $unker3 = "";
        $nama_agama = "";
        $nama_status_pegawai = "";
        $nama_jns_pegawai = "";
        $nama_status_kawin = "";
        $nama_gol_darah = "";
        $alamat = "";
        $rt = "";
        $rw = "";
        $no_hp = "";
        $email = "";
        $no_karpeg = "";
        $no_bpjs = "";
        $no_taspen = "";
        $no_karis_su = "";
        $npwp = "";
        $nik = "";
        $no_kk = "";
        $no_akta = "";
        $catatan = "";
        $keterangan = "";
        if ($kabandis != null) {
            // dd($kabandis);
            // $result [0] =
        } else {
            $result[0]["nip"] = "";
            $result[0]["gelar_depan"] = "";
            $result[0]["nama"] = "";
            $result[0]["gelar_belakang"] = "";
            $result[0]["kota_lahir"] = "";
            $result[0]["tanggal_lahir"] = "";
            $result[0]["nama_jns_kelamin"] = "";
            $result[0]["nama_tingkat_pendidikan_lengkap"] = "";
            $result[0]["program_studi"] = "";
            $result[0]["nama_gol_ruang"] = "";
            $result[0]["nama_pangkat"] = "";
            $result[0]["tmt_pangkat"] = "";
            $result[0]["neselon"] = "";
            $result[0]["nama_jns_jab"] = "";
            $result[0]["kategori_jab"] = "";
            $result[0]["nama_jab"] = "";
            $result[0]["satuan_kerja"] = "";
            $result[0]["unker1"] = "";
            $result[0]["unker2"] = "";
            $result[0]["unker3"] = "";
            $result[0]["nama_agama"] = "";
            $result[0]["nama_status_pegawai"] = "";
            $result[0]["nama_jns_pegawai"] = "";
            $result[0]["nama_status_kawin"] = "";
            $result[0]["nama_gol_darah"] = "";
            $result[0]["alamat"] = "";
            $result[0]["rt"] = "";
            $result[0]["rw"] = "";
            $result[0]["no_hp"] = "";
            $result[0]["email"] = "";
            $result[0]["no_karpeg"] = "";
            $result[0]["no_bpjs"] = "";
            $result[0]["no_taspen"] = "";
            $result[0]["no_karis_su"] = "";
            $result[0]["npwp"] = "";
            $result[0]["nik"] = "";
            $result[0]["no_kk"] = "";
            $result[0]["no_akta"] = "";
            $result[0]["catatan"] = "";
            $result[0]["keterangan"] = "";
            dd($result);
        }
        dd($query);
        // $result [0] =
        foreach ($unitKerja as $key => $value) {

        }
    }
}
