@extends('layouts.default')

@section('content')
    <h1>Contact Information</h1>
    <p>Address: {{ $address }}</p>
    <p>Post code: {{ $post_code }}</p> 
    <p>Email:
        @if (!empty($email))
            {{ $email }}
        @else
            <p style="color: red;">No email</p>
        @endif
    </p>
    <p>Phone: {{ $phone }}</p>
@stop