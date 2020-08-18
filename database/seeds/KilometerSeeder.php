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
            'mileage_old' => 233041,
            'mileage_new' => 233112,
            'by' => 'root',
            'costs_for_parents' => false,
        ]);

        DB::table('kilometers')->insert([
            'created_at' => '2020-07-01 19:17:26',
            'mileage_old' => 233041,
            'mileage_new' => 233077,
            'by' => 'laura',
            'costs_for_parents' => false,
        ]);

        DB::table('kilometers')->insert([
            'created_at' => '2020-07-02 19:17:26',
            'mileage_old' => 233077,
            'mileage_new' => 233112,
            'by' => 'laura',
            'costs_for_parents' => false,
        ]);

        DB::table('kilometers')->insert([
            'created_at' => '2020-07-02 19:17:26',
            'mileage_old' => 233112,
            'mileage_new' => 233132,
            'by' => 'nicolas',
            'costs_for_parents' => false,
        ]);

        DB::table('kilometers')->insert([
            'created_at' => '2020-07-03 19:17:26',
            'mileage_old' => 233132,
            'mileage_new' => 233170,
            'by' => 'laura',
            'costs_for_parents' => false,
        ]);

        DB::table('kilometers')->insert([
            'created_at' => '2020-07-03 19:17:29',
            'mileage_old' => 233170,
            'mileage_new' => 233233,
            'by' => 'laura',
            'costs_for_parents' => true,
        ]);
            
        DB::table('kilometers')->insert([
                'created_at' => '2020-07-03 23:30:29',
                'mileage_old' => 233233,
                'mileage_new' => 233249,
                'by' => 'jonathan',
                'costs_for_parents' => false,
        ]);
    }
}
