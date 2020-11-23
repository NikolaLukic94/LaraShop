<?php

namespace App\Exports;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserReport implements FromArray, WithMapping, WithEvents, ShouldAutoSize
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

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $userData = $this->data;

        return [
            // Handle by a closure.
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('Patrick');

            },
            
            BeforeSheet::class => function (BeforeSheet $event) use ($userData) {
                $event->sheet->setCellValue('B2', 'User Report');

                $event->sheet->setCellValue('B4', 'Name');
                $event->sheet->setCellValue('C4', $userData['name']);

                $event->sheet->setCellValue('B5', 'Email');
                $event->sheet->setCellValue('C5', $userData['email']);

                $event->sheet->setCellValue('B6', 'Member since');
                $event->sheet->setCellValue('C6', \Carbon\Carbon::parse($userData['created_at'])->diffForHumans());

                $event->sheet->setCellValue('B7', 'Total spending');
                $event->sheet->setCellValue('B8', '% Paperback vs Digital');
                $event->sheet->setCellValue('B9', 'Biggest purchase');

                $event->sheet->setCellValue('B11', 'Purchasing history');

                $rowNumber = 12;

                foreach ($userData['orders'] as $order) 
                {
                    ++$rowNumber;

                    $event->sheet->setCellValue('B' . $rowNumber, 'Date Placed:');
                    $event->sheet->setCellValue('C' . $rowNumber, $order['date_placed']);

                    ++$rowNumber;

                    $event->sheet->setCellValue('B' . $rowNumber, 'Order Details:');
                    $event->sheet->setCellValue('C' . $rowNumber, $order['date_placed']);   

                    ++$rowNumber;

                    $event->sheet->setCellValue('B' . $rowNumber, 'Order Status:');
                    $event->sheet->setCellValue('C' . $rowNumber, $order['order_status_codes_id']);   

                    ++$rowNumber;

                    $event->sheet->setCellValue('B' . $rowNumber, 'Order Items:');

                    ++$rowNumber;

                    foreach ($order['order_items'] as $orderItem)
                    {
                        ++$rowNumber;
                        $event->sheet->setCellValue('B' . $rowNumber, 'Name:');
                        $event->sheet->setCellValue('C' . $rowNumber, $orderItem['product']['name']);

                        ++$rowNumber;
                        $event->sheet->setCellValue('B' . $rowNumber, 'Author:');
                        $event->sheet->setCellValue('C' . $rowNumber, $orderItem['product']['author']);

                        ++$rowNumber;
                        $event->sheet->setCellValue('B' . $rowNumber, 'Publisher:');
                        $event->sheet->setCellValue('C' . $rowNumber, $orderItem['product']['publisher']);

                        ++$rowNumber;
                        $event->sheet->setCellValue('B' . $rowNumber, 'Genre:');
                        $event->sheet->setCellValue('C' . $rowNumber, $orderItem['product']['genre']);

                        ++$rowNumber;
                        $event->sheet->setCellValue('B' . $rowNumber, 'Price:');
                        $event->sheet->setCellValue('C' . $rowNumber, $orderItem['product']['price']);
                    }
                }

                $this->applyStyles($event);
            }
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
        
        $event->sheet->mergeCells("C4:F4");
        $event->sheet->mergeCells("C5:F5");
        $event->sheet->mergeCells("C6:F6");
        $event->sheet->mergeCells("C7:F7");
        $event->sheet->mergeCells("C8:F8");
        $event->sheet->mergeCells("C9:F9");
        $event->sheet->mergeCells("C10:F10");

        $event->sheet->getStyle('B4:B9')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('C0C0C0');
          
        $styleArray = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ];

        $event->sheet->getStyle('C4:C10')->applyFromArray($styleArray);

        
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
                'size'  => 12,
                'name'  => 'Verdana'
            )
        ];

        $event->sheet->getStyle('B11:F11')->applyFromArray($styleArray);

        $event->sheet->mergeCells("B11:F11");
    }

    // public function getNameFromNumber($num) {

    //     $numeric = $num % 26;
    //     $letter = chr(65 + $numeric);
    //     $num2 = intval($num / 26);

    //     if ($num2 > 0) {
    //         return getNameFromNumber($num2 - 1) . $letter;
    //     } else {
    //         return $letter;
    //     }
    // }
}
