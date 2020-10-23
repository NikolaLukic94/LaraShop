@extends('layouts.app')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <header></header>
<body>
<div id="app">


@include('partials.navbar')

</div>

<nav class="navbar navbar-light bg-light justify-content-between">
  <div class="container">
    <a class="navbar-item text-warning"><b>BOOKSTORE</b></a>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 600px; border: solid 1px;">
      <button class="btn btn-outline-warning my-2 my-sm-0 btn-outline-secondary" type="submit" style="color: black; border: solid 1px;">Search</button>
    </form>
    <a class="navbar-item"><button type="button" class="btn btn-warning">Best Deals</button></a>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="max-height: 320px;">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/img/carousel/1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img/carousel/1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img/carousel/1.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="row ml-3 mt-2 mr-3 mb-2 text-center">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <i class="fa fa-tags mr-3" style="font-size: 25px"></i>
        Newest
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <i class="fa fa-diamond mr-3" style="font-size: 25px" aria-hidden="true"></i>
        Most Popular
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <i class="fa fa-info-circle mr-3" style="font-size: 25px" aria-hidden="true"></i>
        Info
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <i class="fa fa-truck mr-3" style="font-size: 25px" aria-hidden="true"></i>
        Delivery
      </div>
    </div>
  </div>
</div>

<div class="col m-3">
  <p>Recomended for you</p>
  <div class="row">
  @foreach ($mostPopularProducts as $mpp)
    <div class="col mt-2 mr-3 mb-2">
    <div class="card h-100">
      <img class="p-2 image" style="margin: 0 auto;" src="/img/cover.jpg" width="170" height="200" alt="">
      <p class="text-center">{{ $mpp->name }}</p>
      <p class="text-center" style="color: #e60000">{{ $mpp->price }}</p>    
    </div>
    </div>
  @endforeach
  </div>
</div>

<div class="col m-3">
  <p>Bestsellers</p>
  <div class="container">
  
  </div>
  <div class="row">
  @foreach ($recomendedProducts as $rp)
    <div class="col ml-3 mt-2 mr-3 mb-2">
    <div class="card h-100">
      <img class="p-2" style="margin: 0 auto;" src="/img/cover.jpg" width="170" height="200" alt="">
      <p class="text-center">{{ $rp->name }}</p>    
      <p class="text-center" style="color: #e60000">{{ $rp->price }}</p>    
    </div>
    </div>
  @endforeach
  </div>
</div>

</body>
</html>

<style>
  .auth {
    border-style: solid;
    border-color: red;
    border-radius: 5px;
  }

  .image {
    opacity: 1;
    display: block;
    transition: .5s ease;
    backface-visibility: hidden;
  }
</style>