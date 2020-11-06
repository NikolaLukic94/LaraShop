@extends('layouts.app')



@section('content')

<navbar-component></navbar-component>

<!-- <nav class="navbar navbar-light bg-light justify-content-between">
  <div class="container">
    <a class="navbar-item text-warning"><b>BOOKSTORE</b></a>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 600px; border: solid 1px;">
      <button class="btn btn-outline-warning my-2 my-sm-0 btn-outline-secondary" type="submit" style="color: black; border: solid 1px;">Search</button>
    </form>
    <a class="navbar-item"><button type="button" class="btn btn-warning">Best Deals</button></a>
    @if (Auth::check())
      <cart-component></cart-component>  
    @endif
  </div>
</nav> -->

<div id="carouselExampleIndicators" class="carousel slide mt-0 pt-0" data-ride="carousel" style="border-bottom: 2px solid #008080;">
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

<info-component></info-component>

<div>
  <p>Recomended for you</p>
    <products-table-component :filter="'recommended'"></products-table-component> 

  <p>Bestsellers</p>
    <products-table-component :filter="'mostPopular'"></products-table-component>
</div>
@endsection

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