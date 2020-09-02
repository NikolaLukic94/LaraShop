@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <br>
        <div class="row">
            <new-sidebar-component></new-sidebar-component>
            <br>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Invoice Status Codes</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>
                <invoice-status-code-component></invoice-status-code-component>
            </main>
        </div>
    </div>

@endsection
