@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Add New Team Member</h1>
                <form class="row g-3" action="{{route("team.store")}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">Name</label>
                        <input type="text" class="form-control" id="title" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">Position</label>
                        <input type="text" class="form-control" id="title" name="position">

                    </div>
                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">Bio</label>
                        <input type="text" class="form-control" id="title" name="bio">

                    </div>

                    <div class="col-12">
                        <p>Status</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"
                                value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2"
                                value="0" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                In Active
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
