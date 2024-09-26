
@extends('layouts.app')
@if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
@endif
@section('content')
    <h1>Hotels</h1>
    <ul>
        @foreach($hotels as $hotel)
            <li>{{ $hotel->name }}</li>
        @endforeach
    </ul>
@endsection

