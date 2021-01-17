<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            'product',
            'order',
            'dashboard',
            'shipment',
            'user',
            'role',
            'permission',
            'report',
            'invoice status code',
            'order status code',
            'product type',
            'payment method',
            'order items status code',
            'invoices'
        ];

        foreach ($classes as $class) {
            Permission::create([
                'name' => 'view ' . $class,
                'guard_name' => 'web'
            ]);

            Permission::create([
                'name' => 'crate ' . $class,
                'guard_name' => 'web'
            ]);

            Permission::create([
                'name' => 'edit ' . $class,
                'guard_name' => 'web'
            ]);

            Permission::create([
                'name' => 'delete ' . $class,
                'guard_name' => 'web'
            ]);
        }
    }
}
