<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductTypeSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(UserAddressSeeder::class);
        $this->call(OrderStatusCodesSeeder::class);
        $this->call(OrderItemsStatusCodesSeeder::class);
        $this->call(InvoiceStatusCodesSeeder::class);
        $this->call(OrderItemsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(StoresSeeder::class);

        factory(App\Models\UserAddress::class, 50)->create();
        factory(App\Models\User::class, 50)->create();
        factory(App\Models\Order::class, 50)->create();
    }
}
