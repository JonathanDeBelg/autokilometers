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
            ->subject('Autokilometers maand ' . date('M', strtotime('-1 months')))
            ->markdown('mailing.mileage_overview')
            ->with([
                'mileageJonathan' => Kilometer::getMileageSumByRiderAndMonth('jonathan', date('n', strtotime('-1 months'))),
                'mileageNicolas' => Kilometer::getMileageSumByRiderAndMonth('nicolas', date('n', strtotime('-1 months'))),
                'mileageLaura' => Kilometer::getMileageSumByRiderAndMonth('laura', date('n', strtotime('-1 months'))),
                'endingMileage' => Kilometer::getLastInsertedMileage(),
                'mileageJonathanCompany' => Kilometer::getCompanyMileageSumByRiderAndMonth('jonathan', date('n', strtotime('-1 months'))),
                'mileageNicolasCompany' => Kilometer::getCompanyMileageSumByRiderAndMonth('nicolas', date('n', strtotime('-1 months'))),
                'mileageLauraCompany' => Kilometer::getCompanyMileageSumByRiderAndMonth('laura', date('n', strtotime('-1 months')))
        ]);
    }
}
