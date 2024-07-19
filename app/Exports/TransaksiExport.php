<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiExport implements FromCollection, WithHeadings, WithStyles
{
    private $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    public function collection()
    {
        $user = Auth::user();
        $retribusi_id = $user->admin->retribusi_id;

        $query = DB::table('tagihan')
            ->join('pembayaran', 'pembayaran.tagihan_id', '=', 'tagihan.id')
            ->join('kontrak', 'kontrak.id', '=', 'tagihan.kontrak_id')
            ->join('item_retribusi', 'item_retribusi.id', '=', 'kontrak.item_retribusi_id')
            ->join('wajib_retribusi', 'kontrak.wajib_retribusi_id', '=', 'wajib_retribusi.id')
            ->join('users', 'wajib_retribusi.user_id', '=', 'users.id')
            ->select(
                'users.name',
                'item_retribusi.kategori_nama',
                'tagihan.total_harga',
                'pembayaran.metode_pembayaran',
                'tagihan.status as pembayaran_status',
                'kontrak.status as kontrak_status'
            )
            ->where('tagihan.status', 'VERIFIED')
            ->where('tagihan.active', '1')
            ->where('item_retribusi.retribusi_id', $retribusi_id);

        if ($this->filter === 'tunai') {
            $query->where('pembayaran.metode_pembayaran', 'CASH');
        } elseif ($this->filter === 'non-tunai') {
            $query->whereIn('pembayaran.metode_pembayaran', ['VA', 'QRIS']);
        }

        $data = $query->get();
        $totalHarga = $data->sum('total_harga');

        // Add a row for the total price
        $data->push([
            'name' => 'Total',
            'kategori_nama' => '',
            'total_harga' => $totalHarga,
            'metode_pembayaran' => '',
            'pembayaran_status' => '',
            'kontrak_status' => ''
        ]);

        return $data->map(function ($item) {
            return (object) [
                'name' => $item->name ?? '',
                'kategori_nama' => $item->kategori_nama ?? '',
                'total_harga' => $item->total_harga ?? 0,
                'metode_pembayaran' => $item->metode_pembayaran ?? '',
                'pembayaran_status' => $item->pembayaran_status ?? '',
                'kontrak_status' => $item->kontrak_status ?? ''
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Kategori Nama',
            'Total Harga',
            'Metode Pembayaran',
            'Status Pembayaran',
            'Status Kontrak'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Format column C as currency in Rupiah
        $sheet->getStyle('C')->getNumberFormat()->setFormatCode('Rp #,##0');
        $sheet->getStyle('C')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        // Apply header styles
        $sheet->getStyle('A1:F1')->applyFromArray([
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
        ]);

        // Style the total row
        $totalRow = $sheet->getHighestRow();
        $sheet->getStyle("A{$totalRow}:F{$totalRow}")->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

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
                'font' => [
                    'bold' => true,
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
            'F' => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }
}
