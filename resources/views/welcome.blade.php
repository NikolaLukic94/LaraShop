@extends('layouts.app')

<meta name="csrf-token" content="{{ csrf_token() }}">


@section('content')
    <meta name="stripe_key" content="{{ $stripeKey }}">
    <home-page></home-page>

@endsection

