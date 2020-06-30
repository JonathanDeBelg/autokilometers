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
            'mileage_old' => random_int(0, 1000000),
            'mileage_new' => random_int(0, 1000000),
            'by' => 'jonathan',
            'costs_for_parents' => true,
        ]);
    }
}
