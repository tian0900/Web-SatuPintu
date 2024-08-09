<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TagihanExport implements FromQuery, WithHeadings, WithStyles
{
    use Exportable;

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

        $query = DB::table('tagihan')
            ->join('kontrak', 'kontrak.id', '=', 'tagihan.kontrak_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('wajib_retribusi', 'kontrak.wajib_retribusi_id', '=', 'wajib_retribusi.id')
            ->join('users', 'wajib_retribusi.user_id', '=', 'users.id')
            ->select(
                'users.name',
                'item_retribusi.kategori_nama',
                'tagihan.total_harga',
                'tagihan.status as pembayaran_status'
            )
            ->whereBetween('tagihan.created_at', [$this->startDate, $this->endDate])
            ->where('tagihan.status', 'NEW')
            ->where('tagihan.active', '1')
            ->where('item_retribusi.retribusi_id', $retribusi_id);

        return $query->orderBy('tagihan.id');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Kategori Nama',
            'Total Harga',
            'Status Pembayaran'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                    'color' => ['argb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => '000000',
                    ],
                ],
            ],
            'A1:E1' => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => '538ED5',
                    ],
                ],
            ],
            'A' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],
            ],
            'B' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ],
            ],
            'C' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                ],
            ],
            'D' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
            'E' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }
}
