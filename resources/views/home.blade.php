@extends('layouts.app')

@section('content')
<navbar-component></navbar-component>

<div class="container">
<!-- <new-sidebar-component></new-sidebar-component> -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <dashboard-chart-component></dashboard-chart-component>   
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
