<nav class="navbar navbar-expand-lg navbar-light bg-secondary" style="max-height:35px;font-family:'Roboto'">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  @if (!Auth::check())
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-light" href="/" disabled><i class="fa fa-home" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/" disabled><i class="fa fa-map-marker" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/products/search" disabled><i class="fa fa-search" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#" disabled>Customer Support 24/7</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="#">011 552 335</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Partners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="#">011 552 334</a>
        </li>
      </ul>
    </div>
    <div style="margin-right: 0;">
      <div class="btn-group form-inline p-0" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary"  style="max-height:35px"><i class="fa fa-user pr-1" aria-hidden="true"></i>Login</button>
        <button type="button" class="btn btn-secondary" style="max-height:35px">Register</button>
      </div>
    </div>
  @else
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-light" href="/" disabled><i class="fa fa-home" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/products/search" disabled><i class="fa fa-search" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/" disabled><i class="fa fa-map-marker" aria-hidden="true"></i></a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light" href="#"><i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Log Out</a>
        </li>
      </ul>
    </div>
  @endif
</nav>