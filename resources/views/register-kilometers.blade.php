@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h3>Kilometers toevoegen</h3>
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
                                action="{{ route('register-km.add') }}"
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
                                        <option value="jonathan" selected>jonathan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="company_fare">
                                        Op kosten van de zaak?
                                    </label>

                                    <br>

                                    <input type="checkbox" name="company_fare" value="true">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="mileage_new">
                                        Kilometer aantal:
                                    </label>

                                    <input class="form-control" type="number" name="mileage_new" value="{{ $mileage }}" required>
                                    @error('mileage_new')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Voeg kilometers toe</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
