@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row" style="height:100%;">
        @include('sidebar')
        <main class="col bg-faded py-3 flex-grow-1">
			<order-item-status-codes-component></order-item-status-codes-component>
        </main>
    </div>
</div>

@endsection