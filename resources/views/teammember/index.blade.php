@extends('layouts.app');
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('team.create') }}">Add New Team Member</a>
        </div>
        @foreach ($teams as $item)
            <div class="col-lg-12">
                <p><Strong>ID :</Strong><span> {{ $item->id }} </span></p>
                <p><Strong>Name :</Strong><span> {{ $item->name }} </span></p>
                <p><Strong>Position :</Strong><span> {{ $item->position }} </span></p>
                <p><Strong>Bio :</Strong><span> {{ $item->bio }} </span></p>
                <p><Strong>Created at :</Strong><span> {{ $item->created_at }} </span></p>
                <a href="{{ route('team.edit', $item->id) }}">Edit</a>
                <form action="{{ route('team.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
