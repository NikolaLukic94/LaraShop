@extends('layouts.app')

@section('content')
    <meta name="stripe_key" content="{{ $stripeKey }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="authUser" content="{{ json_encode(auth()->user()) }}">
    <meta name="apiToken" content="{{ json_encode(auth()->user()->api_token) }}">

    <home-page></home-page>
@endsection

