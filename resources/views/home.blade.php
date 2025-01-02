@extends('layouts.default')

@section('content')
    <h1>Welcome to he Home Page</h1>
    <p>Name: {{ $name }}</p>
    <p>Age: {{ $age }}</p>
    <p>Position: {{ $position }}</p>
    <p>Address: {{ $address }}</p>

    @if ($age > 18)
        <p>Age is: {{ $age }}</p>
    @else
        <p style="color: red;">The person is too young</p>
    @endif
@stop