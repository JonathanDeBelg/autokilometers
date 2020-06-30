<?php

namespace App\Http\Controllers;

use App\Kilometer;
use App\Mail\MileageMonthOverview;
use Dotenv\Exception\ValidationException;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KilometerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('dashboard', [
            'mileages' => Kilometer::orderBy('id', 'desc')->get(),
            'mileage_jonathan' => Kilometer::getMileageSumByRider('jonathan'),
            'mileage_nicolas' => Kilometer::getMileageSumByRider('nicolas'),
            'mileage_laura' => Kilometer::getMileageSumByRider('laura'),
            'mileage_jonathan_company' => Kilometer::getCompanyMileageSumByRider('jonathan'),
            'mileage_nicolas_company' => Kilometer::getCompanyMileageSumByRider('nicolas'),
            'mileage_laura_company' => Kilometer::getCompanyMileageSumByRider('laura'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $mileage = Kilometer::latest('id')->first();

        return view('register-kilometers', ['mileage' => $mileage->mileage_new]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function store(Request $request)
    {
        $mileage_atm = Kilometer::latest('id')->first();
        if ($mileage_atm->mileage_new == $request->mileage_new) {
            return redirect()->back()->withErrors('Geen aangepast kilometerstand');
        } else {
            $kilometerStand = new Kilometer([
                'by' => $request->by,
                'mileage_old' => $mileage_atm->mileage_new,
                'mileage_new' => (int)$request->mileage_new,
                'costs_for_parents' => (bool)$request->company_fare
            ]);

            $kilometerStand->save();

            return Redirect::route('dashboard')->with('message', 'Kilometers toegevoegd');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kilometer  $kilometer
     * @return \Illuminate\Http\Response
     */
    public function show(Kilometer $kilometer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kilometer  $kilometer
     * @return \Illuminate\Http\Response
     */
    public function edit(Kilometer $kilometer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Kilometer  $kilometer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kilometer $kilometer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kilometer  $kilometer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kilometer $kilometer)
    {
        //
    }
}
