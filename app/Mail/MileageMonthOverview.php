<?php

namespace App\Mail;

use App\Http\Controllers\KilometerController;
use App\Kilometer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\Factory;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\View\View;

class MileageMonthOverview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return MileageMonthOverview|Factory|View
     */
    public function build()
    {
        return $this->from(['address' => 'j.dionant@gmail.com', 'name' => 'Autokilometers'])
            ->subject('Autokilometers maand ' . date('F'))
            ->markdown('mailing.mileage_overview')
            ->with([
                'mileageJonathan' => Kilometer::getMileageSumByRider('jonathan'),
                'mileageNicolas' => Kilometer::getMileageSumByRider('nicolas'),
                'mileageLaura' => Kilometer::getMileageSumByRider('laura'),
                'endingMileage' => Kilometer::getThisMonthsEndingMileage()
        ]);
    }
}
