<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\Auth;

class TagihanManualExport implements FromQuery, WithHeadings, WithStyles
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
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        return DB::table('tagihan_manual')
            ->join('setoran', 'setoran.id', '=', 'tagihan_manual.setoran_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'tagihan_manual.item_retribusi_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'tagihan_manual.sub_wilayah_id')
            ->join('petugas', 'petugas.id', '=', 'tagihan_manual.petugas_id')
            ->join('users', 'users.id', '=', 'petugas.user_id')
            ->select(
                'users.name',
                'sub_wilayah.nama as nama',
                'tagihan_manual.total_harga'
            )
            ->where('tagihan_manual.status', 'NEW') // Filter based on tagihan_manual status
            ->where('item_retribusi.retribusi_id', $retribusi_id) // Filter based on item_retribusi retribusi_id
            ->whereBetween('tagihan_manual.created_at', [$this->startDate, $this->endDate]) // Filter by date range
            ->orderBy('tagihan_manual.id', 'ASC'); // Order by tagihan_manual.id in ascending order
    }

    public function headings(): array
    {
        return [
            'Name',
            'Nama',
            'Total Harga',
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
