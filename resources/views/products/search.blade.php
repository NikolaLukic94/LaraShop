@extends('layouts.app')

@section('content')

    <navbar-component></navbar-component>

    <search-page-component></search-page-component>

    <products-table-component :filter="'none'"></products-table-component> 

@endsection
