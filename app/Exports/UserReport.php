<?php

namespace App\Exports;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserReport implements FromCollection, WithMapping, WithEvents, WithHeadings
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

    public function headings(): array
    {
        return [ 
            ['Name'],
            ['Email'],
            ['Member Since'],
            ['# of Orders Placed'],
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
            
            // Array callable, refering to a static method.
            // BeforeWriting::class => [self::class, 'beforeWriting'],
            
            // Using a class with an __invoke method.
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet->setCellValue('A4', 'test');
            }
        ];
    }
}
