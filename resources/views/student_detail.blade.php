@extends('layouts.main')

@section('corejs')
  
  requirejs.config({
      baseUrl: '../'
  });

@endsection

@section('script')
    <script src="{{ asset('./js/student_detail.js') }}"></script>
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
              <img class="card-profile-img" src="{{ asset('demo/faces/male/16.jpg') }}">
              <h3 class="mb-3">Hazman Yusof</h3>
              <p class="text-muted mb-0"></p>
              <p class="mb-4">
                Student, Surau Assobah Seksyen 3 Bandar Baru Bangi
              </p>
              <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                <span class="fe fe-edit-3"></span> Edit Bio
              </button>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="media">
                <span class="avatar avatar-xxl mr-5" style="background-image: url({{ asset('demo/faces/male/16.jpg') }})"></span>
                <div class="media-body">
                  <h4 class="m-0">Hazman Yusof</h4>
                  <p class="text-muted mb-0">Student</p>
                  <ul class="social-links list-inline mb-0 mt-2">
                    <li class="list-inline-item">
                      <a href="javascript:void(0)" title="Facebook" data-toggle="tooltip"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)" title="Twitter" data-toggle="tooltip"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)" title="011-23090948" data-toggle="tooltip"><i class="fa fa-phone"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)" title="Instagram" data-toggle="tooltip"><i class="fa fa-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card">
        	  <div class="card-header">
              <span class="col">
                <h3 class="card-title">Progress Chart</h3>
              </span>
              <span class="col text-right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalmarkah"><span class="fa fa-plus"></span> Markah Baru</button>
              </span>
        	  </div>
        	  <div class="card-body">
        	  	<span id="data" data-overall="overall, 4.0, 5.9, 5.5, 6.5, 7.4, 7.5, 7.2, 7.5, 8, 9.3" data-period="12/11/2018, 02/11/2018, 12/10/2018, 22/09/2018, 12/08/2018, 12/12/2018, 12/12/2018, 12/12/2018, 12/12/2018, 12/12/2018" ></span>

        		  @for ($i = 0; $i < 10; $i++)
        		    <span id="data_{{$i}}" data-ayat="bakharah, ayat 2{{$i}}" data-overall="{{$i}}" data-markah="{{$i}}, 6, 7, 7.5" data-period="{{$i}}/11/2018" data-comment="comment_{{$i}} Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus."></span>
        		  @endfor

        	    <div id="chart-wrapper" style="height: 16rem"></div>
        	  </div>
        	</div>

          <div class="card">
            <div class="card-header">

              <span class="col">
                <h3 class="card-title">Markah <span class="span-header text-muted">12/12/2018</span></h3>
              </span>
              <span class="col text-right"><span class="span-ayat text-muted" id="ayat"> bakharah, ayat 21</span></span>

            </div>

        	  <div class="card-body mx-auto">
        	  	<div class="tags">
        		  	<span class="tag">Overall<span class="tag-addon tag-red" id="tag-overall">8</span></span>
          			<span class="tag">Tarannum<span class="tag-addon tag-cyan" id="tag-tarannum">6</span></span>
          			<span class="tag">Tajwid<span class="tag-addon tag-cyan" id="tag-tajwid">7</span></span>
          			<span class="tag">Kelancaran<span class="tag-addon tag-cyan" id="tag-kelancaran">7.5</span></span>
          		</div>
        	  	<canvas id="myChart"></canvas>
        	  </div>
    	    </div>

	       <div class="card">
            <div class="card-header">
              <span class="col">
                <h3 class="card-title">Komen Ustad <span class="span-header text-muted">12/12/2018</span></h3>
              </span>
              <span class="col text-right"><span class="span-ayat text-muted" id="ayat"> bakharah, ayat 21</span></span>
            </div>

            <ul class="list-group card-list-group">
              <li class="list-group-item py-5">
                <div class="media">
                  <div class="media-object avatar avatar-md mr-4" style="background-image: url({{ asset('demo/faces/male/16.jpg') }}"></div>
                  <div class="media-body">
                    <div class="media-heading">
                      <h5>Uwais Qorny</h5>
                    </div>
                    <div id="comment">
                    	comment_11 Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          
        </div>

      </div>
    </div>
  </div>
</div>

@include('layouts.modal_bio')

@include('layouts.modal_markah')

@endsection