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

class ProductsReport implements FromCollection, WithMapping, WithEvents, WithStyles, ShouldAutoSize
{
    private $data;
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

                $event->sheet->setCellValue('B2', 'Products Report');
                $event->sheet->setCellValue('B4', 'Total # of products sold all time');
                $event->sheet->setCellValue('B5', 'Total # of products sold current year');
                $event->sheet->setCellValue('B6', '# of Products avaliable');
                $event->sheet->setCellValue('B7', '# of Digital books');
                $event->sheet->setCellValue('B8', '# of Paperback books');
                $event->sheet->setCellValue('B9', '# of Digital books sold all time');
                $event->sheet->setCellValue('B10', '# of Paperback books sold all time');

                $event->sheet->setCellValue('B12', 'Bestsellers:');
                // list top 10 products

                $event->sheet->setCellValue('B14', 'Trending books:');
                // list top 10 products

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
