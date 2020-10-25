@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <br>
        <div class="row">
            <new-sidebar-component></new-sidebar-component>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Roles</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <form action="/roles/create" method="get">
                            <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fa fa-plus"></i></button>
                        </form> 
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        Roles
                    </div>
                    <div class="container">
                        @foreach ($roles as $role)
                            <div class="row">
                                <div class="col">
                                    {{ $role->name }}
                                </div>
                                <div class="col">
                                    <a href="/roles/{{ $role->id }}">See</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>

@endsection
