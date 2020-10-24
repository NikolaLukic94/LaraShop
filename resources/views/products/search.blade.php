@extends('layouts.app')

@include('partials.navbar')

@section('content')

<search-page-component></search-page-component>
<products-table-component :filter="'none'"></products-table-component> 

@endsection
