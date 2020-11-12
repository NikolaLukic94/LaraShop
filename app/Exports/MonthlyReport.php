<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MonthlyReport implements FromCollection, WithMapping, WithEvents, WithStyles, ShouldAutoSize
{
    private $data;

    public function construct($data)
    {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }

    
    public function map($data): array
    {
        return [];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            2    => ['font' => ['bold' => true]],

            'B2:B10'    => ['font' => ['bold' => true]],

            'B2' => ['font' => ['italic' => true]],

            'C'  => ['font' => ['size' => 16]],
        ];
    }
    /**
     * @return array
     */
    public function registerEvents(): array
    {

        return [
            // Handle by a closure.
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('Patrick');

            },
            
            BeforeSheet::class => function (BeforeSheet $event)  {

                $event->sheet->setCellValue('B2', 'Monthly Report');
                $event->sheet->setCellValue('B4', 'Total number of orders');
                $event->sheet->setCellValue('B5', 'Total spendings');
                $event->sheet->setCellValue('B6', 'Best day');
                $event->sheet->setCellValue('B7', '# of Digital books sold');
                $event->sheet->setCellValue('B8', '# of Paperback books sold');
                $event->sheet->setCellValue('B9', 'Most sold item');
                $event->sheet->setCellValue('B10', 'Ratio paperback vs digital');

                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'top' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => 'FFA0A0A0',
                        ],
                        'endColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ],
                    'font'  => array(
                        'bold'  => true,
                        'color' => array('rgb' => '505050'),
                        'size'  => 15,
                        'name'  => 'Verdana'
                    )
                ];

                $event->sheet->getStyle('B2:F2')->applyFromArray($styleArray);

                $event->sheet->mergeCells("B2:F2");
                
                $event->sheet->mergeCells("C4:F4");
                $event->sheet->mergeCells("C5:F5");
                $event->sheet->mergeCells("C6:F6");
                $event->sheet->mergeCells("C7:F7");
                $event->sheet->mergeCells("C8:F8");
                $event->sheet->mergeCells("C9:F9");
                $event->sheet->mergeCells("C10:F10");

                $event->sheet->getStyle('B4:B10')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('C0C0C0');
                  
                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                    ],
                ];

                $event->sheet->getStyle('C4:C10')->applyFromArray($styleArray);
            },
        ];
    }
}
