@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Profile</h1>
                {{-- {{ $team }} --}}
                <form class="row g-3" action="{{ route('team.update', $team) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{ $team->name }}" id="title" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">Position</label>
                        <input type="text" class="form-control" value="{{ $team->position }}" id="title"
                            name="position">

                    </div>
                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">Bio</label>
                        <input type="text" class="form-control" value="{{ $team->bio }}" id="title"
                            name="bio">

                    </div>



                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
