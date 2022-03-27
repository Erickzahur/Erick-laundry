<?php

namespace App\Exports;

use App\Models\PenggunaanBarang;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;


class PenggunaanBarangExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    use Importable, RegistersEventListeners;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PenggunaanBarang::all();
    }

    public function map($PenggunaanBarang): array
    {
        return [
            $PenggunaanBarang->id,
            $PenggunaanBarang->nama_barang,
            $PenggunaanBarang->qty,
            $PenggunaanBarang->harga,
            $PenggunaanBarang->waktu_beli,
            $PenggunaanBarang->supplier,
            $PenggunaanBarang->StatusBarang
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'Nama Barang',
            'Qty',
            'Harga',
            'Waktu beli',
            'Supplier',
            'Status'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setAutosize(true); //no
                $event->sheet->getColumnDimension('B')->setAutosize(true);
                $event->sheet->getColumnDimension('C')->setAutosize(true);
                $event->sheet->getColumnDimension('D')->setAutosize(true);
                $event->sheet->getColumnDimension('E')->setAutosize(true);
                $event->sheet->getColumnDimension('F')->setAutosize(true);
                $event->sheet->getColumnDimension('G')->setAutosize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->setCellValue('A1', 'DATA PAKET CUCIAN');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A3:G' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->styleCells(
                    'A3:E3',
                    [
                        //Set border style
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => '000000']
                            ],
                        ],
                    ],
                );
            }
        ];
    }
}
