@extends('layouts.app')
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<meta name="stripe_key" content="{{ $stripeKey }}">
<!-- <script src="https://js.stripe.com/v3/"></script> -->
@section('content')

<navbar-component></navbar-component>
<checkout-component></checkout-component>


@endsection
