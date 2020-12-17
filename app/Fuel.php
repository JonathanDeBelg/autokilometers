<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $fillable = [
        'by', 'amount'
    ];

    protected $dates = [
        'created_at'
    ];

    public static function getRefuelsByMonth($month) {
        return Fuel::whereRaw('MONTH(created_at) = '. $month . ' AND YEAR(created_at) = ' . date('Y'))
            ->get();
    }
}
