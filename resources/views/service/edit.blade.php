<h1>Edit Post</h1>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Add New Services</h1>
                <form class="row g-3" action="{{ route('service.update', $service) }}" method="POST">
                    @csrf
                        @method('PUT')

                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">Title</label>
                        <input type="text" class="form-control" value="{{ $service->title }}" required id="title" name="title">
                    </div>
                    <div class="col-md-6">
                        <label for="inputtitle" class="form-label">Description</label>
                        <input type="text" class="form-control" id="title" value="{{ $service->details }}" name="details">

                    </div>

                    <div class="col-12">
                        <p>Status</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"
                                value="1" {{ $service->status == 1 ? "checked" : "" }} >
                            <label class="form-check-label" for="flexRadioDefault1">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2"
                                value="0" {{ $service->status == 0 ? "checked" :"" }}>
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
