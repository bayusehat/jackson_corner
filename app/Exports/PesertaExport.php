<?php

namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements FromCollection,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
            $query = DB::select(DB::raw("SELECT a.id, nama_peserta, DATE_FORMAT(tanggal_lahir,'%d-%m-%Y') tanggal_lahir,
                    CASE
                        WHEN kategori_peserta = 1 THEN
                            'Kategori A (5-8 tahun)'
                        ELSE
                            'Kategori B (9-12 tahun)'
                    END kategori,
                    nama_wali, nomor_handphone_wali, b.nama regional, c.nama tokos, a.created_at, a.updated_at
                    FROM pesertas a
                        LEFT JOIN regionals b on a.id_kota = b.id
                        LEFT JOIN tokos c on a.id_toko = c.id
                    ORDER BY a.created_at"));
            return  collect($query);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Peserta',
            'Tanggal Lahir',
            'Kategori',
            'Nama Wali',
            'Nomor HP Wali',
            'Regional',
            'Toko',
            'Dibuat pada',
            'Diubah pada',
        ];
    }
}
