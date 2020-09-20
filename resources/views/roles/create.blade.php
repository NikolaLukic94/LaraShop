@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <br>
        <div class="row">
            <new-sidebar-component></new-sidebar-component>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Create new role</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <form action="/roles/create" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Name</span>
                                    </div>
                                    <input
                                        name="name"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Enter name here..." 
                                        aria-describedby="basic-addon1">
                                </div>
                                <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fa fa-plus"></i></button>
                            </form> 
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

@endsection
