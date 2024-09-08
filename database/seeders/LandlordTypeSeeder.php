<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandlordTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('landlord_types')->insert([
            ['name' => 'Consumer'],
            ['name' => 'Business'],
        ]);
    }
}
