@extends('app')

@section('content')

    <h1>About Me</h1>

    <h3>People I Like:</h3>

    @if (count($names))
        <ul>
            @foreach($names as $name)
                <li>{{ $name }}</li>
            @endforeach
        </ul>
    @else
        <p>You don't like anyone!</p>
    @endforelse

    <p>Lorum Ipsum</p>

@endsection