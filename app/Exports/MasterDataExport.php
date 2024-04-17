<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;

class MasterDataExport extends DefaultValueBinder implements FromCollection, WithHeadings, WithCustomValueBinder, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, p.kota_lahir, p.tanggal_lahir, jk.nama_jns_kelamin, rtp.nama_tingkat_pendidikan_lengkap, rp.program_studi, g.nama_gol_ruang, g.nama_pangkat, re.neselon, rjj.nama_jns_jab, j.nama_jab, msk.satuan_kerja, j.id_unker, ra.nama_agama, rsp.nama_status_pegawai, rjp.nama_jns_pegawai, rsk.nama_status_kawin, rgd.nama_gol_darah, p.alamat,  p.rt,  p.rw,  p.no_hp, p.email, p.no_karpeg, p.no_bpjs, p.no_taspen, p.no_karis_su, p.npwp, p.nik, p.no_kk, p.no_akta, p.catatan, p.keterangan FROM ((((((((((((((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) LEFT JOIN riw_pangkat r ON p.nip = r.nip) LEFT JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) LEFT JOIN ref_jns_kelamin jk ON p.kode_jns_kelamin = jk.kode)LEFT JOIN ref_agama ra ON p.kode_agama = ra.kode)LEFT JOIN ref_status_pegawai rsp ON p.kode_status_pegawai = rsp.kode)LEFT JOIN ref_jns_pegawai rjp ON p.kode_jns_pegawai = rjp.kode) LEFT JOIN ref_status_kawin rsk ON p.kode_status_kawin = rsk.kode) LEFT JOIN ref_gol_darah rgd ON p.kode_gol_darah = rgd.kode) LEFT JOIN ref_eselon re ON j.kode_eselon = re.keselon) LEFT JOIN master_satuan_kerja msk ON j.id_satker = msk.kode_satker) LEFT JOIN ref_jns_jab rjj ON j.kode_jns_jab = rjj.kode) LEFT JOIN riw_pendidikan rp ON p.nip = rp.nip) LEFT JOIN ref_tingkat_pendidikan rtp ON rp.kode_tingkat_pendidikan = rtp.kode) WHERE p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_kedudukan_pegawai = 1 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip) AND rp.id = (SELECT MAX(riw_pendidikan.id) FROM riw_pendidikan WHERE rp.nip = nip);');

        return collect($query);
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Gelar Depan',
            'Nama',
            'Gelar Belakang',
            'Kota Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Tingkat Pendidikan',
            'Program Studi',
            'Golongan Ruang',
            'Pangkat',
            'Eselon',
            'Jenis Jabatan',
            'Jabatan',
            'Satuan Kerja',
            'idUnitKerja',
            'Agama',
            'Status Pegawai',
            'Jenis Pegawai',
            'Status Kawin',
            'Golongan Darah',
            'Alamat',
            'RT',
            'RW',
            'Nomor Telepon',
            'Email',
            'Nomor Karpeg',
            'No BPJS',
            'Nomor Taspen',
            'Nomor Karis Karsu',
            'NPWP',
            'NIK',
            'Nomor KK',
            'Nomor Akta',
            'Catatan',
            'Keterangan',
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        $cell->setValueExplicit($value, DataType::TYPE_STRING2);
        return true;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true, 'size' => 16]]
        ];
    }
}
