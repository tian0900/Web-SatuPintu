<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SetoranExport implements FromQuery, WithHeadings, WithStyles
{
    private $startDate;
    private $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        return DB::table('setoran')
            ->join('transaksi_petugas', 'setoran.id', '=', 'transaksi_petugas.setoran_id')
            ->join('petugas', 'petugas.id', '=', 'transaksi_petugas.petugas_id')
            ->join('users', 'users.id', '=', 'petugas.user_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'setoran.sub_wilayah_id')
            ->select(
                'users.name as nama_petugas',
                'sub_wilayah.nama',
                'setoran.total'
            )
            ->where('setoran.status', 'MENUNGGU')
            ->whereBetween('setoran.created_at', [$this->startDate, $this->endDate]) // Filter by date range
            ->orderBy('setoran.id', 'ASC'); // Order by setoran.id in ascending order
    }

    public function headings(): array
    {
        return [
            'Nama Petugas',
            'Nama',
            'Total',
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => '538ED5',
                    ],
                ],
            ],
        ];
    }
}
