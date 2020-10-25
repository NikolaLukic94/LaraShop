@extends('layouts.app')

@include('partials.navbar')

@section('content')


    <div class="container">
        <checkout-component></checkout-component>
    </div>

    <!-- @include('partials.stripe-card') -->

@endsection
