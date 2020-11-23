<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
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

class MonthlyReport implements FromArray, WithMapping, WithEvents, WithStyles, ShouldAutoSize
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
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
        $data = $this->data;

        $sum = 0;
        $numberPaperback = 0;
        $numberDigital = 0;

        // todo: redo
        foreach ($data as $aoi)
        {
            foreach ($aoi['order_items'] as $oi) 
            {
                $sum += $oi['product']['price'];

                $oi['product']['product_type']['name'] === 'paperback' 
                    ? $numberPaperback++
                    : $numberDigital++;
            }
        }

        $ratio = $this->getRatio($numberPaperback, $numberDigital);

        return [
            // Handle by a closure.
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('Patrick');

            },
            
            BeforeSheet::class => function (BeforeSheet $event) use ($data, $sum, $numberPaperback, $numberDigital, $ratio) {

                $event->sheet->setCellValue('B2', 'Monthly Report');

                $event->sheet->setCellValue('B4', 'Total number of orders');
                $event->sheet->setCellValue('C4', count($data));

                $event->sheet->setCellValue('B5', 'Total spendings');
                $event->sheet->setCellValue('C5', $sum);

                $event->sheet->setCellValue('B6', 'Most items sold on');
                $event->sheet->setCellValue('C6', 'Most items sold on');

                $event->sheet->setCellValue('B7', '# of Digital books sold');
                $event->sheet->setCellValue('C7', $numberDigital);

                $event->sheet->setCellValue('B8', '# of Paperback books sold');
                $event->sheet->setCellValue('C8', $numberPaperback);

                $event->sheet->setCellValue('B9', 'Ratio paperback vs digital');
                $event->sheet->setCellValue('C9', $ratio);

                $this->applyStyles($event);
                
                $event->sheet->mergeCells("C4:F4");
                $event->sheet->mergeCells("C5:F5");
                $event->sheet->mergeCells("C6:F6");
                $event->sheet->mergeCells("C7:F7");
                $event->sheet->mergeCells("C8:F8");
                $event->sheet->mergeCells("C9:F9");
                $event->sheet->mergeCells("C10:F10");

            },
        ];
    }

    public function applyStyles($event)
    {
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
        
        $event->sheet->getStyle('B4:B10')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('C0C0C0');
      
        $styleArray = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ];

        $event->sheet->getStyle('C4:C10')->applyFromArray($styleArray);
    }

    public function getRatio($num1, $num2){
        for($i = $num2; $i > 1; $i--) {
            if(($num1 % $i) == 0 && ($num2 % $i) == 0) {
                $num1 = $num1 / $i;
                $num2 = $num2 / $i;
            }
        }
        return "$num1:$num2";
    }
}
