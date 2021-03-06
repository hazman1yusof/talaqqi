<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 ml-auto">
        <form class="input-icon my-3 my-lg-0" method="GET" action="/student">
          @csrf
          <input type="search" name="search" class="form-control header-search" placeholder="Search Student&hellip;" tabindex="1">
          <div class="input-icon-addon">
            <i class="fe fe-search"></i>
          </div>
        </form>
      </div>
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
          <li class="nav-item">
            <a href="\home" class="nav-link @if(Request::is('home') || Request::is('/')) {{'active'}} @endif"><i class="fe fe-home"></i> Home</a>
          </li>
          <!-- <li class="nav-item">
            <a href="\mission" class="nav-link {{(Request::is('mission') ? 'active' : '')}}"><i class="fe fe-layers"></i> Mission</a>
          </li> -->
          <li class="nav-item">
            <a href="\about" class="nav-link {{(Request::is('about') ? 'active' : '')}}"><i class="fa fa-graduation-cap"></i> Instructor</a>
          </li>
          <li class="nav-item dropdown">
            <a href="\student" class="nav-link  @if(Request::is('student') || Request::is('student/*')) {{'active'}} @endif"><i class="fe fe-users"></i> Student</a>
          </li>
          <li class="nav-item">
            <a href="\contact" class="nav-link {{(Request::is('contact') ? 'active' : '')}}"><i class="fe fe-map-pin"></i> Contact</a>
          </li>
          <li class="nav-item">
            <a href="\donate" class="nav-link {{(Request::is('donate') ? 'active' : '')}}" style="color: yellowgreen;"><i class="fe fe-award"></i> Donate</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>