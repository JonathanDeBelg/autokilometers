@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3><strong>Dashboard</strong></h3>
                        <p class="ml-auto font-weight-bold">Huidige stand; {{ $mileage_atm }}km</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(Session::has('message'))
                                    <div class="alert alert-info">
                                        <p>{{ Session::get('message') }}</p>
                                    </div>
                                @endif

                                <div class="d-flex">
                                    @if (isset($month))
                                            <p><a href="{{ route('overview-past-month', ['month' => $monthNumber - 1])  }}">< Kilometers vorige maand</a></p>
                                        <p class="ml-auto"><a href="{{ route('overview-past-month', ['month' => $monthNumber + 1])  }}">Kilometers volgende maand ></a></p>
                                    @else
                                        <p><a href="{{ route('overview-past-month', ['month' => date('n', strtotime('-1 months'))])  }}">< Kilometers vorige maand</a></p>
                                    @endif
                                </div>

                                <div class="mileage-overview">
                                    @if (isset($month))
                                        <h5>Kilometeroverzicht {{ $month }}</h5>
                                    @else
                                        <h5>Kilometeroverzicht {{ date('F') }}</h5>
                                    @endif
                                        <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Naam</th>
                                                <th scope="col">Gereden kilometers</th>
                                                <th scope="col">KM's op de zaak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jonathan</td>
                                                <td>{{ $mileage_jonathan}}km</td>
                                                <td>{{ $mileage_jonathan_company }}km</td>
                                            </tr>
                                            <tr>
                                                <td>Nicolas</td>
                                                <td>{{ $mileage_nicolas}}km</td>
                                                <td>{{ $mileage_nicolas_company }}km</td>
                                            </tr>
                                            <tr>
                                                <td>Laura</td>
                                                <td>{{ $mileage_laura }}km</td>
                                                <td>{{ $mileage_laura_company }}km</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                                <div class="all-mileage">
                                    <h5>Kilometeroverzicht</h5>
                                    <table class="table table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Door</th>
                                                <th scope="col">Kilometerstand</th>
                                                <th scope="col">Kosten van de zaak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mileages as $mileage)
                                            <tr>
                                                <th scope="row">{{ $mileage->id }}</th>
                                                <td>{{ $mileage->by }}</td>
                                                <td>{{ $mileage->mileage_new }}</td>
                                                @if($mileage->costs_for_parents == 1)
                                                    <td>Ja</td>
                                                @else
                                                    <td>Nee</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
