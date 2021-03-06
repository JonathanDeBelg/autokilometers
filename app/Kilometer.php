<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kilometer extends Model
{
    protected $fillable = [
        'by', 'mileage_new', 'mileage_old', 'costs_for_parents'
    ];

    protected $dates = [
        'created_at'
    ];

    public static function getMileageSumByRider(string $rider): int
    {
        $kilometers = Kilometer::where('by', $rider)
            ->get();
        $kilometerToAdd = 0;
        foreach ($kilometers as $kilometer) {
            $kilometerToAdd += $kilometer->mileage_new - $kilometer->mileage_old;
        }

        return $kilometerToAdd;
    }

    public static function getMileageSumByRiderAndMonth(string $rider, string $year, string $month): int
    {
        $kilometers = Kilometer::where('by', $rider)
            ->whereRaw('MONTH(created_at) = '. $month . ' AND YEAR(created_at) = ' . $year)
            ->get();
        $kilometerToAdd = 0;
        foreach ($kilometers as $kilometer) {
            $kilometerToAdd += $kilometer->mileage_new - $kilometer->mileage_old;
        }

        return $kilometerToAdd;
    }

    public static function getLastInsertedMileage(): int
    {
        $lastMileage = Kilometer::orderBy('id', 'desc')
            ->first();

        return $lastMileage->mileage_new;
    }

    public static function getCompanyMileageSumByRider(string $rider)
    {
        $kilometers = Kilometer::where('by', $rider)
            ->get();

        $kilometerToReturn = 0;
        foreach ($kilometers as $kilometer) {
            if($kilometer->costs_for_parents) {
                $kilometerToReturn += $kilometer->mileage_new - $kilometer->mileage_old;
            }
        }

        return $kilometerToReturn;
    }

    public static function getCompanyMileageSumByRiderAndMonth(string $rider, string $year, string $month)
    {
        $kilometers = Kilometer::where('by', $rider)
            ->whereRaw('MONTH(created_at) = '. $month . ' AND YEAR(created_at) = ' . $year)
            ->get();

        $kilometerToReturn = 0;
        foreach ($kilometers as $kilometer) {
            if($kilometer->costs_for_parents) {
                $kilometerToReturn += $kilometer->mileage_new - $kilometer->mileage_old;
            }
        }

        return $kilometerToReturn;
    }
}
