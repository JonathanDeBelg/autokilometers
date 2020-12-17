@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3>Tankbeurt toevoegen</h3>
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
                                    action="{{ route('refuels.store') }}"
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
                                            Bedrag:
                                        </label>

                                        <br>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">€</span>
                                            </div>
                                            <input type="number" value="1.00" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="amount" name="amount" />
                                            @error('amount')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Voeg tankbeurt toe</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
