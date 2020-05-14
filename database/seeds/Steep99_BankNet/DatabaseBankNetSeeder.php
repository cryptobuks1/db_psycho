<?php

use App\Models\AccessRight;
use Illuminate\Database\Seeder;

class DatabaseBankNetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(BnCurrenciesTableSeeder::class);
       // $this->call(BnPaymentMethodsTableSeeder::class);
       // $this->call(BnPaymentMethodGroupsTableSeeder::class);
       // $this->call(BnExchangersTableSeeder::class);
       // $this->call(BnExchangeDirectionsTableSeeder::class);
       // $this->call(BnExchangeOffersTableSeeder::class);

       // $this->call(MenuItemsTableSeeder::class);
       // $this->call(AccessRolesTableSeeder::class);


        $this->call(FeUrlsTableSeeder::class);
        $this->call(UserInterfacesTableSeeder::class);
        $this->call(MenuItemAccessRolesSeeder::class);
        $this->call(AccessRightByRolesTableSeeder::class);
        $this->call(AccessRolesTableSeeder::class);
        $this->call(ConsumerAccessRolesTableSeeder::class);
        $this->call(ConsumersTableSeeder::class);
        $this->call(ControllersTableSeeder::class);
    }
}
