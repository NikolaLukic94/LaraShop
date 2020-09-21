@extends('layouts.app')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<div class="container-fluid">
  <div class="row">
  <new-sidebar-component></new-sidebar-component>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button class="pt-3 mt-3" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
          </button>
        </div>
      </div>
      
      <div class="card pb-3">
        <div class="card-header"></div>
        <div class="card-body">
          <div class="row">
            <div class="col">
                <i class="fa fa-user" aria-hidden="true"></i>
                {{ $user->name }}
            </div>
            <div class="col">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                {{ $user->email }}
            </div>
          </div>
        </div>
      </div>
      <form action="/users/update/{{ $user->id }}" method="POST">
        {{ csrf_field() }}
        <div class="card mt-3">
          <div class="card-header">Permissions</div>
          <div class="card-body">
            @foreach($permissions as $permission)
              <div class="row">
                <div class="col">
                  <input 
                    value="{{ $permission->id }}" 
                    name="permissions[]"
                    class="mr-3" 
                    type="checkbox"
                    @can($permission->name) checked=checked @endcan>
                      {{ $permission->name }}
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <div class="card mt-3">
          <div class="card-header">Roles</div>
          <div class="card-body">
            @foreach($roles as $role)
              <div class="row">
                <div class="col">
                  <input 
                    value="{{ $role->id }}" 
                    name="roles[]"
                    class="mr-3" 
                    type="checkbox"
                    @if($user->hasRole($role->name)) checked=checked @endcan>
                      {{ $role->name }}
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <button type="submit" class="btn btn-info mt-3">Update</button>
      </form>
    </main>
  </div>
</div>

@endsection