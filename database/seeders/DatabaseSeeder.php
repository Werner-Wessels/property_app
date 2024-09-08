<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AddressTypeSeeder::class,
            PropertyTypeSeeder::class,
            TenantTypeSeeder::class,
            VendorTypeSeeder::class,
            LandlordTypeSeeder::class,
            BankAccountTypeSeeder::class,
            AccountTypeSeeder::class,
            PrioritySeeder::class,
        ]);
    }
}
