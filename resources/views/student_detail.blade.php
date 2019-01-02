@extends('layouts.main')

@section('corejs')
  
  requirejs.config({
      baseUrl: '../'
  });

@endsection

@section('script')
    <script src="{{ asset('./js/student_detail.js') }}"></script>
@endsection

@section('styles')
  .pill_mark{
    border-radius: 5px 5px 0px 0px !important;
    padding: 0.5rem !important;
    text-align: center;
  }
  .c3-xgrid-line.grid4 line {
    stroke: pink;
  }
  .c3-xgrid-line.grid4 text {
      fill: pink;
  }
@endsection

@section('page')

<div class="container">

  <div class="my-3 my-md-5">

    <div class="container">
      <div class="row">

        <div class="col-lg-4">
          <div class="card card-profile">
            <div class="card-header" style="background-image: url({{ asset('demo/photos/eberhard-grossgasteiger-311213-500.jpg') }});"></div>
            <div class="card-body text-center">
              <img class="card-profile-img" src="{{env('APP_URL')}}thumbnail/{{$user->image_path}}">
              <h3 class="mb-3">{{$user->firstname}} {{$user->lastname}}</h3>
              <p class="text-muted mb-0"></p>
              <p class="mb-4">
                {{$user->bio}}
              </p>
              <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="static">
                <span class="fe fe-edit-3"></span> Edit Bio
              </button>
              <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#passwordChange" data-backdrop="static">
                <span class="fe fe-edit-3"></span> Change Password
              </button>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="media">
                <span class="avatar avatar-xxl mr-5" style="background-image: url({{env('APP_URL')}}thumbnail/{{$user->image_path}})"></span>
                <div class="media-body">
                  <h4 class="m-0">{{$user->firstname}} {{$user->lastname}}</h4>
                  <p class="text-muted mb-0">Talaqqi Student</p>
                  <ul class="social-links list-inline mb-0 mt-2">
                    <li class="list-inline-item">
                      <a href="javascript:void(0)" title="{{$user->facebook}}" data-toggle="tooltip"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)" title="{{$user->twitter}}" data-toggle="tooltip"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)" title="{{$user->whatsapp}}" data-toggle="tooltip"><i class="fa fa-phone"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)" title="{{$user->instagram}}" data-toggle="tooltip"><i class="fa fa-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8">

          <!-- card pertama progress chart -->
          <div class="card">
        	  <div class="card-header" style="border-bottom: none;">
              <span class="col">
                <h3 class="card-title">Progress Chart</h3>
              </span>
              <span class="col text-right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalmarkah" data-oper='add' data-backdrop="static"><span class="fa fa-plus"></span> Markah Baru</button>
              </span>
        	  </div>
            <div class="card-header">
              <div class="col alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"></button>
                <ul>
                  <li>The graph shows your marks over time</li>
                  <li>Click on any chart pointer to see your marks and instructor comments below</li>
                </ul>
              </div>
            </div>
        	  <div class="card-body"> 

              @foreach($talaqqi as $index => $obj )
                <span talaqqi id="data_{{$index}}" data-ayat="{{$obj->ayat}}" data-overall="{{$obj->overall}}" data-markah="{{$obj->kefasihan}}, {{$obj->tajwid}}, {{$obj->tarannum}}, {{$obj->kelancaran}}" data-period="{{\Carbon\Carbon::parse($obj->adddate)->toFormattedDateString()}}" data-comment="{{$obj->komen}}" data-id="{{$obj->id}}" data-kefasihan="{{$obj->kefasihan}}" data-tajwid="{{$obj->tajwid}}" data-tarannum="{{$obj->tarannum}}" data-kelancaran="{{$obj->kelancaran}}"></span>
              @endforeach

        	    <div id="chart-wrapper" style="height: 16rem;cursor: pointer;"></div>
              <div class="d-flex">
                <button type="button" class="btn btn-lime btn-sm" onclick="location.href='{{$talaqqi->nextPageUrl()}}';" @if(!$talaqqi->nextPageUrl()) disabled @endif>Previous</button>
                <button type="button" class="btn btn-lime btn-sm ml-auto" onclick="location.href='{{$talaqqi->previousPageUrl()}}';"  @if(!$talaqqi->previousPageUrl()) disabled @endif>Next</button>
              </div>
        	  </div>
        	</div>

          <nav>
            <div class="nav nav-pills" id="nav-tab" role="tablist" style="padding: 1rem 1rem 0rem 1rem;">
                <a class="col nav-item nav-link active pill_mark" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" >Markah</a>
                <a class="col nav-item nav-link pl-auto pill_mark" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Komen Ustad</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

              <!-- card kedua markah -->
              <div class="card">
                <div class="card-header">

                  <span class="col">
                    <h3 class="card-title">Markah <span class="span-header text-muted">12/12/2018</span></h3>
                  </span>
                  <span class="col text-right"><span class="span-ayat text-muted" id="ayat"> bakharah, ayat 21</span></span>

                  <button type="button" class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modalmarkah" data-oper='edit' data-backdrop="static">Edit</button>

                </div>

                <div class="card-body mx-auto">
                  <div class="tags">
                    <span class="tag">Overall<span class="tag-addon tag-red" id="tag-overall"></span></span>
                    <span class="tag">Kefasihan<span class="tag-addon tag-cyan" id="tag-kefasihan"></span></span>
                    <span class="tag">Tarannum<span class="tag-addon tag-cyan" id="tag-tarannum"></span></span>
                    <span class="tag">Tajwid<span class="tag-addon tag-cyan" id="tag-tajwid"></span></span>
                    <span class="tag">Kelancaran<span class="tag-addon tag-cyan" id="tag-kelancaran"></span></span>
                  </div>
                  <canvas id="myChart"></canvas>
                </div>
              </div>
              <!-- end -->

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              
              <!-- card ketiga -->
               <div class="card">
                  <div class="card-header">
                    <span class="col">
                      <h3 class="card-title">Komen Ustad <span class="span-header text-muted"></span></h3>
                    </span>
                    <span class="col text-right"><span class="span-ayat text-muted" id="ayat"></span></span>

                    <button type="button" class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modalmarkah" data-oper='edit'>Edit</button>

                  </div>

                  <ul class="list-group card-list-group">
                    <li class="list-group-item py-5">
                      <div class="media">
                        <div class="media-object avatar avatar-md mr-4" style="background-image: url({{env('APP_URL')}}thumbnail/image/13925176_536584779877695_896856907230760834_n.jpg)"></div>
                        <div class="media-body">
                          <div class="media-heading">
                            <h5>Uwais Qorny</h5>
                          </div>
                          <div id="comment">
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- end -->

            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>

@include('layouts.modal_bio')
@include('layouts.modal_password')
@include('layouts.modal_markah')

@endsection