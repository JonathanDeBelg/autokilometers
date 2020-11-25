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
        $monthNumber = date('m');
        return $this->overview($monthNumber);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $month
     * @return Factory|View
     */
    public function overview($month)
    {
        return view('dashboard', [
            'mileages' => Kilometer::orderBy('id', 'desc')->get(),
            'mileage_jonathan' => Kilometer::getMileageSumByRiderAndMonth('jonathan', $month),
            'mileage_nicolas' => Kilometer::getMileageSumByRiderAndMonth('nicolas', $month),
            'mileage_laura' => Kilometer::getMileageSumByRiderAndMonth('laura', $month),
            'mileage_jonathan_company' => Kilometer::getCompanyMileageSumByRiderAndMonth('jonathan', $month),
            'mileage_nicolas_company' => Kilometer::getCompanyMileageSumByRiderAndMonth('nicolas', $month),
            'mileage_laura_company' => Kilometer::getCompanyMileageSumByRiderAndMonth('laura', $month),
            'mileage_atm' => Kilometer::getLastInsertedMileage(),
            'month' => date('F', mktime(0,0,0,(int)$month)),
            'monthNumber' => (int)$month
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
        } elseif ($request->mileage_new < $mileage_atm->mileage_new ) {
            return redirect()->back()->withErrors('Kilometerstand kan niet lager dan voorgaande kilometerstand zijn');
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
     * @return Factory|View
     */
    public function show(Kilometer $kilometer)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kilometer  $kilometer
     * @return \Illuminate\Http\Response
     */
    public function edit(Kilometer $kilometer)
    {
        return view('update-kilometers', ['kilometer' => $kilometer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Kilometer  $kilometer
     * @return RedirectResponse
     */
    public function update(Request $request, Kilometer $kilometer)
    {
        $mileage_atm = Kilometer::find($kilometer->id + 1);
        if(isset($mileage_atm)) {
            return redirect()->back()->withErrors('Kan niet meer aanpassen');
        } else {
            if ($kilometer->mileage_new == $request->mileage_new) {
                return redirect()->back()->withErrors('Geen aangepast kilometerstand');
            } else {
                $kilometer->mileage_new = $request->mileage_new;
                $kilometer->save();

                return Redirect::route('dashboard')->with('message', 'Kilometerstand aangepast');
            }
        }
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
