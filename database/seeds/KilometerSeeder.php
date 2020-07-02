<?php

use App\Kilometer;
use Illuminate\Database\Seeder;

class KilometerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kilometers')->insert([
            'mileage_old' => 000000,
            'mileage_new' => 233112,
            'by' => 'root',
            'costs_for_parents' => false,
        ]);
    }
}
