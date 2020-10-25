<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Faker\Generator as Faker;

class ImportBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:books';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports books from CSV';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Faker $faker)
    {
        $filename = public_path() . '/books.csv';

        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = array();

        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, ',')) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        foreach ($data as $bookData) 
        {
            Product::create([
                'name' => $bookData['Title'],
                'author' => $bookData['Author'],
                'publisher' => $bookData['Publisher'],
                'genre' => $bookData['Genre'],
                'description' => $faker->paragraph,
                'price' => $faker->numberBetween(1,199),
                'color' => $faker->hexcolor,
                'size' => $faker->numberBetween(1,199),
                'quantity' => $faker->numberBetween(1,199),
                'other_product_details' => $faker->paragraph,
                'product_type_id' => $faker->numberBetween(1,2),
            ]);
        }
    }
}
