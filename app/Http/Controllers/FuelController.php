<?php

namespace App\Http\Controllers;

use App\Fuel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $monthNumber = date('m');
        return $this->overview($monthNumber);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('refuels-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'amount' => 'required|numeric|min:1',
            'by' => 'required'
        ]);

        $fuel = new Fuel($payload);
        $fuel->save();

        return redirect(route('refuels.overview'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(Fuel $fuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuel $fuel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuel $fuel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuel $fuel)
    {
        //
    }

    /**
     * @param $month
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function overview($month)
    {
        return view('refuels', [
            'refuels' => Fuel::getRefuelsByMonth($month),
            'month' => date('F', mktime(0, 0, 0, (int)$month)),
            'monthNumber' => (int)$month
        ]);
    }
}
