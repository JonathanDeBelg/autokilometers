@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3>Tankbeurten</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-responsive table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Door</th>
                                            <th scope="col">Kosten</th>
                                            <th scope="col">Toegevoegd op</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($refuels as $refuel)
                                            <tr>
                                                <th scope="row"><a href="{{ route('refuels.edit', ['fuel' => $refuel]) }}">{{ $refuel->id }}</a></th>
                                                <td>{{ $refuel->by }}</td>
                                                <td>€{{ $refuel->amount }}</td>
                                                <td>{{ $refuel->created_at->format('d-m-Y') }}</td>
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
@endsection
