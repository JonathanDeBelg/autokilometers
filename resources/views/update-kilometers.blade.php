@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3>Kilometers aanpassen</h3>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-auto">Terug</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form
                                    action="{{ route('edit-km.update') }}"
                                    method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-form-label" for="title">
                                            Door:
                                        </label>

                                        <select name="by" class="form-control">
                                            <option value="laura">laura</option>
                                            <option value="nicolas">nicolas</option>
                                            <option value="jonathan">jonathan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Gereden op;</label>
                                        <input class="form-control" disabled value="{{ $kilometer->created_at->format('m-d-Y') }} om {{ $kilometer->created_at->format('H:i') }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="company_fare">
                                            Op kosten van de zaak?
                                        </label>

                                        <br>

                                        @if($kilometer->costs_for_parents === 1)
                                            <input type="checkbox" name="company_fare" checked>
                                        @else
                                            <input type="checkbox" name="company_fare">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label" for="mileage_new">
                                            Kilometer aantal:
                                        </label>
                                        <input class="form-control" type="number" name="mileage_new" value="{{ $kilometer->mileage_new }}" required>
                                    </div>
                                    <input type="hidden" value="{{ $kilometer->id }}" name="kilometer-id">
                                    <button class="btn btn-primary" type="submit">Pas kilometers aan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
