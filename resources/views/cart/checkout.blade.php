<x-layout>
    <meta name="stripe_key" content="{{ $stripeKey }}">

    <navbar-component></navbar-component>

    <div class="container">
        <order-review></order-review>
        <stripe-checkout-component></stripe-checkout-component>   
    </div>
</x-layout>
