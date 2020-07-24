@extends('layouts.app')

@include('partials.navbar')

@section('content')

<!-- page where users can browse for books -->
<!-- it should incude search functionality -->

<div class="container-fluid">
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="nav navbar-nav navbar-center">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Catalog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/products/search"><i class="fa fa-search" aria-hidden="true"></i></a>
      </li>
    </ul>
      <!-- <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </nav>

    <div class="container">
        <search-page-component></search-page-component>
    </div>

</div>


@endsection