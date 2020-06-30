<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kilometer extends Model
{
    protected $fillable = [
        'by', 'mileage_new', 'mileage_old', 'costs_for_parents'
    ];

    public static function getMileageSumByRider(string $rider): int
    {
        $kilometers = Kilometer::where('by', $rider)
            ->whereRaw('MONTH(created_at) = '. date('n'))
            ->get();
        $kilometerToAdd = 0;
        foreach ($kilometers as $kilometer) {
            $kilometerToAdd += $kilometer->mileage_new - $kilometer->mileage_old;
        }

        return $kilometerToAdd;
    }

    public static function getThisMonthsEndingMileage(): int
    {
        $lastMileage = Kilometer::orderBy('id', 'desc')
            ->first();

        return $lastMileage->mileage_old;
    }
}
