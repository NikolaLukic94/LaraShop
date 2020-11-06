@extends('layouts.app')

@section('content')

<ul>
    <li>
        Visits: {{ $visits }}
    </li>
    <li>
        Name: {{ $product->name }}
    </li>
</ul>


@endsection