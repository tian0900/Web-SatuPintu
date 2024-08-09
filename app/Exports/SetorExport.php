<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SetorExport implements FromQuery, WithHeadings, WithStyles
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

        return DB::table('setoran')
            ->join('petugas', 'petugas.id', '=', 'setoran.petugas_id')
            ->join('users', 'users.id', '=', 'petugas.user_id')
            ->join('sub_wilayah', 'sub_wilayah.id', '=', 'setoran.sub_wilayah_id')
            ->select(
                'users.name as nama_petugas',
                'sub_wilayah.nama',
                'setoran.total',
                'setoran.status'
            )
            ->where('setoran.status', 'DITERIMA')
            ->where('sub_wilayah.retribusi_id', $retribusi_id)
            ->whereBetween('setoran.created_at', [$this->startDate, $this->endDate]) // Filter by date range
            ->orderBy('setoran.id', 'ASC');
    }

    public function headings(): array
    {
        return [
            'Petugas',
            'Wilayah',
            'Nominal',
            'Status',
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
