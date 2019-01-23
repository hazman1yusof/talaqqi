
<div class="header py-4" style="
    background: linear-gradient(135deg, rgb(255, 82, 146)   0%,rgba(33,138,174,1) 69%,rgba(24,42,115,1) 89%)">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="./index.html">
        <img src="{{ asset('./demo/LOGO-BARU-PROTAZz2-smaller.png')}}" class="header-brand-img" alt="tabler logo">
      </a>
      <h2 class="mb-0"><i></i></h2>
      <div class="d-flex order-lg-2 ml-auto">
        <!-- <div class="nav-item d-none d-md-flex">
          <a href="https://github.com/tabler/tabler" class="btn btn-sm btn-outline-primary" target="_blank">Source code</a>
        </div> -->
        <!-- <div class="dropdown d-none d-md-flex">
          <a class="nav-link icon" data-toggle="dropdown">
            <i class="fe fe-bell"></i>
            <span class="nav-unread"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a href="#" class="dropdown-item d-flex">
              <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
              <div>
                <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                <div class="small text-muted">10 minutes ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item d-flex">
              <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
              <div>
                <strong>Alice</strong> started new task: Tabler UI design.
                <div class="small text-muted">1 hour ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item d-flex">
              <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
              <div>
                <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                <div class="small text-muted">2 hours ago</div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
          </div>
        </div> -->
        @auth
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar" style="background-image: url({{env('APP_URL')}}/thumbnail/{{Auth::user()->image_path}}); border: 1px solid #9E9E9E;"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-white">{{ Auth::user()->name }}</span>
              <small class="text-muted d-block mt-1">
                @if(Auth::user()->role == "Student" ) {{'Student'}}
                @else {{'Administrator'}}
                @endif
              </small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="\student\{{Auth::user()->id}}">
              <i class="dropdown-icon fe fe-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon fe fe-help-circle"></i> Need help?
            </a>
            <a class="dropdown-item" href="\logout">
              <i class="dropdown-icon fe fe-log-out"></i> Sign out
            </a>
          </div>
        </div>
        @endauth
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>