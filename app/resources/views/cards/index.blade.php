@extends('layout')

@section('title', 'Cards')


@section('content')
    <div class="row">
        <div class="col m-2">
            <h1>Cards</h1>
        </div>
    </div>

    <div class="row">
        @foreach($cards as $card)
            <div class="col col-sm-12 col-lg-6 my-2">
                @include('cards/_card')
            </div>
        @endforeach
    </div>
@endsection
