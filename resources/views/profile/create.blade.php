@extends('layouts/app')
@section('content')


<div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Add New Profile</h1>
                <form class="row g-3" action="{{ route('profile.store') }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">Name</label>
                        <input type="text" class="form-control" id="title" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address">

                    </div>
                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">City</label>
                        <input type="text" class="form-control" id="title" name="city">
                    </div>
                    <div class="col-md-6">
                        <label for="inputcountry" class="form-label">County</label>
                        <input type="text" class="form-control" id="country" name="country">

                    </div>

                    <div class="col-12">
                        <p>UserType</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1"
                                value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Student
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2"
                                value="0" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Non Student
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  


@endsection