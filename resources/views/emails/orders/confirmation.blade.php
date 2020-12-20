@component('mail::message')

Successful purchase!

<b>Hi {{ $body->user->name }} !</b>

<p>Thanks for your purchase on LaraShop!</p>


<h1>Invoice ID: {{ $body->invoice->id }}</h1>

<p>
    Order ID: {{ $body->order->id }}
</p>

<p>Created: {{  $body->order->created_at }}</p>

<p>Bill to: {{ $body->user->email }}</p>

<p>
    Total amount: {{ $body->amount }} {{ $body->currency }}
</p>

<p2>
    Purchase list:
</p2>

@foreach($body->shipmentItems as $si) 
    {{$si->orderItem->product->name}} - {{$si->orderItem->product->author}}
@endforeach

Thanks,<br>
LaraShop team
@endcomponent

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>