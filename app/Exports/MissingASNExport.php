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
use App\Models\RefSatuanKerja;
use App\Models\RefTingkatPendidikan;
use App\Models\RiwPendidikan;

class MissingASNExport extends DefaultValueBinder implements FromCollection, WithHeadings, WithCustomValueBinder, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $queryFinal = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang FROM (((((((((((((( pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif ) LEFT JOIN riw_pangkat r ON p.nip = r.nip ) LEFT JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode ) LEFT JOIN ref_jns_kelamin jk ON p.kode_jns_kelamin = jk.kode ) LEFT JOIN ref_agama ra ON p.kode_agama = ra.kode ) LEFT JOIN ref_status_pegawai rsp ON p.kode_status_pegawai = rsp.kode ) LEFT JOIN ref_jns_pegawai rjp ON p.kode_jns_pegawai = rjp.kode ) LEFT JOIN ref_status_kawin rsk ON p.kode_status_kawin = rsk.kode ) LEFT JOIN ref_gol_darah rgd ON p.kode_gol_darah = rgd.kode ) LEFT JOIN ref_eselon re ON j.kode_eselon = re.keselon ) LEFT JOIN master_satuan_kerja msk ON j.id_satker = msk.kode_satker ) LEFT JOIN ref_jns_jab rjj ON j.kode_jns_jab = rjj.kode ) LEFT JOIN ref_kategori_jab rkj ON j.kode_kategori_jab = rkj.kode ) LEFT JOIN riw_jab rj ON p.nip = rj.nip ) WHERE p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_kedudukan_pegawai = 1 AND r.is_deleted = 0 AND rj.is_deleted = 0 AND r.tmt_pangkat = ( SELECT MAX( riw_pangkat.tmt_pangkat ) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip ) AND rj.tmt_jab = ( SELECT MAX( riw_jab.tmt_jab ) FROM riw_jab WHERE p.nip = riw_jab.nip );');

        $queryActive = DB::select('SELECT p.nip, p.nama, p.kode_kedudukan_pegawai FROM pegawai p WHERE p.kode_kedudukan_pegawai = 1');

        $final = [];

        foreach ($queryActive as $key => $valueActive) {
            foreach ($queryFinal as $key => $valueFinal) {
                if ($valueActive->nip === $valueFinal->nip) {
                    $valueActive->kode_kedudukan_pegawai = 0;
                }
            }
            if ($valueActive->kode_kedudukan_pegawai === "1") {
                $q1 = DB::select('SELECT nip_defenitif FROM master_jab WHERE nip_defenitif = ? AND is_delete = 0', [$valueActive->nip]);
                if (!isset($q1[0])) {
                    $final[] = (object) ['nip' => $valueActive->nip, 'nama' => $valueActive->nama, 'catatan' => 'Belum di Mapping Jabatan'];
                }

                $q2 = DB::select('SELECT nip FROM riw_pangkat WHERE nip = ? AND is_deleted = 0', [$valueActive->nip]);
                if (!isset($q2[0])) {
                    $final[] = (object) ['nip' => $valueActive->nip, 'nama' => $valueActive->nama, 'catatan' => 'Tidak Ada Data Pada Riwayat Pangkat'];
                }

                $q3 = DB::select('SELECT nip FROM riw_pendidikan WHERE nip = ? AND is_deleted = 0', [$valueActive->nip]);
                if (!isset($q3[0])) {
                    $final[] = (object) ['nip' => $valueActive->nip, 'nama' => $valueActive->nama, 'catatan' => 'Tidak Ada Data Pada Riwayat Pendidikan'];
                }

                $q4 = DB::select('SELECT nip FROM riw_jab WHERE nip = ? AND is_deleted = 0', [$valueActive->nip]);
                if (!isset($q4[0])) {
                    $final[] = (object) ['nip' => $valueActive->nip, 'nama' => $valueActive->nama, 'catatan' => 'Tidak Ada Data TMT Jabatan Pada Riwayat Jabatan'];
                }
            }
        }
        return collect($final);
    }

    public function headings(): array
    {
        return [
            'NIP',
            'NAMA',
            'CATATAN',
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
