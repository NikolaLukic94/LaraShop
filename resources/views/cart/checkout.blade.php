@extends('layouts.app')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<meta name="stripe_key" content="{{ $stripeKey }}">

@include('partials.navbar')

@section('content')

<checkout-component></checkout-component>

@endsection
