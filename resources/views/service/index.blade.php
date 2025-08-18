@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <h1>All Prodcut</h1>
                <a href="{{ route('service.create') }}">Add New prodcut</a>

                <ul>
                    @foreach ($serv as $post)
                        <li>
                            <strong>{{ $post->title }}</strong>
                            <p>{{ $post->description }}</p>

                            <a href="{{ route('service.edit', $post) }}">Edit</a>

                            <form action="{{ route('service.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </section>
@endsection
