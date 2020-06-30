<?php

namespace App\Console\Commands;

use App\Mail\MileageMonthOverview;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailMileageOverviewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mileage:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail mileage overview from this month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Mail::to(getenv('MAIL_ADDRESS_SITE'))
            ->send(new MileageMonthOverview());
    }
}
