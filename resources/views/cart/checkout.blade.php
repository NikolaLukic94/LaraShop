<x-layout>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <meta name="stripe_key" content="{{ $stripeKey }}">

    <navbar-component></navbar-component>
    <order-review></order-review>
    <user-addresses></user-addresses>
    <stripe-checkout-component></stripe-checkout-component>   
</x-layout>
