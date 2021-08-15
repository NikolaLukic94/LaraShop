@extends('layouts.app')

@section('content')
    <meta name="stripe_key" content="{{ env('STRIPE_KEY') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth-token" content="{{ auth()->check() ? auth()->user()->api_token : '' }}">

    <div id="app">
        <navbar-component></navbar-component>
        <router-view></router-view>
    </div>
@endsection

