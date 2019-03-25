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
  hr.type_7 {
      border: 0;
      height: 55px;
      background-image: url(../css/img/type_7.png);
      background-repeat: no-repeat;
      background-size: contain;
      margin-bottom: 0;
  }
@endsection

@section('page')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=586391718455509&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">

  <div class="my-3 my-md-5">

    <div class="container">
      <div class="row">

        <div class="col-lg-4">

          <div class="card card-profile">
            <div class="card-header" style="background-image: url({{ asset('demo/eberhard-grossgasteiger-311213-500.jpg') }});"></div>
            <div class="card-body text-center">
              @if($user->image_path!='')
                <img class="avatar-xxl card-profile-img" src="{{env('APP_URL')}}/uploads/{{$user->image_path}}">
              @else
                <img class="avatar-xxl card-profile-img" src="{{env('APP_URL')}}/uploads/image/avatar-empty.png">
              @endif
              <h3 class="mb-3">{{$user->firstname}} {{$user->lastname}}</h3>
              <p class="text-muted mb-0"></p>
              <p class="mb-4">
                {{$user->bio}}
              </p>
              @if(Auth::user()->id == $user->id ) 
                <button type="button" class="btn btn-outline-primary btn-sm m-2" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="static">
                  <span class="fe fe-edit-3"></span> Edit Bio
                </button>
                <button type="button" class="btn btn-outline-danger btn-sm m-2" data-toggle="modal" data-target="#passwordChange" data-backdrop="static">
                  <span class="fe fe-edit-3"></span> Change Password
                </button>
                <button type="button" class="btn btn-outline-success btn-sm m-2">
                  <span class="fa fa-whatsapp"></span> Make Appointment
                </button>
               @endif
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="media">
                @if($user->image_path!='')
                  <span class="avatar avatar-xxl mr-5" style="background-image: url({{env('APP_URL')}}/uploads/{{$user->image_path}})"></span>
                @else
                  <span class="avatar avatar-xxl mr-5" style="background-image: url({{env('APP_URL')}}/uploads/image/avatar-empty.png)"></span>
                @endif
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

          <div class="card">
            <div class="card-header p-1" style="border-bottom: none;border-bottom: none;background-color: #cd201fa6;color: white;">
              <span class="col">
                <h3 class="card-title"> <i class="fe fe-alert-triangle"></i> Talaqqi Preparation 
                  <button type="button" class="btn btn-sm btn-icon btn-red float-right" id="hide_li"><i class="fe fe-chevron-up"></i>Hide</button>
                  <button type="button" class="btn btn-sm btn-icon btn-red float-right" id="show_li" style="display: none"><i class="fe fe-chevron-down"></i>Show</button>
                </h3>
              </span>
            </div>

            <div class="card-body" id="card_li"> 
              <form method="POST" action="/student_li" id="liform" >
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">

                Sediakan 5 perkara untuk dapatkan 5 perkara, Tick-kan commitment anda:
                
                <hr class="type_7">
                <b>Sediakan lima perkara ini</b>
                <div class="custom-controls-stacked">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="li_1" value="1" 
                      @if( $user->li_1 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                    <span class="custom-control-label">1. Mushaf Quran yang diiktiraf serta berbalut</span>
                  </label>
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="li_2" value="1" @if( $user->li_2 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                    <span class="custom-control-label">2. Pensil untuk tanda pada mushaf</span>
                  </label>
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="li_3" value="1" @if( $user->li_3 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                    <span class="custom-control-label">3. Buku nota tebal. 400 pages</span>
                  </label>
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="li_4" value="1" @if( $user->li_4 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                    <span class="custom-control-label">4. Pen untuk tulis nota pada buku</span>
                  </label>
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="li_5" value="1" @if( $user->li_5 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                    <span class="custom-control-label">5 .Gelas kosong (Hati yang bersedia untuk belajar)</span>
                  </label>
                </div>
                <br>

                <b>Semoga mudah untuk anda dapatkan lima perkara kemudian</b>
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="li2_1" value="1" @if( $user->li2_1 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                  <span class="custom-control-label">1. Dengar bacaan dari Sheikh Husari pada ayat yang nak ditalaqi dgn Ustad Uwais Qotny. Perhatikan waqaf dan ibtidaq serta sebutan huruf</span>
                </label>
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="li2_2" value="1" @if( $user->li2_2 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                  <span class="custom-control-label">2. Baca nazirah 10 kali</span>
                </label>
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="li2_3" value="1" @if( $user->li2_3 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                  <span class="custom-control-label">3. Tasmik dengan kawan. Tandakan dengan pensil pada tempat yang salah</span>
                </label>
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="li2_4" value="1" @if( $user->li2_4 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                  <span class="custom-control-label">4. Ulang baca nazirah 10 kali. Fokus pada tempat yang ditandakan oleh kawan sebelum itu</span>
                </label>
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="li2_5" value="1" @if( $user->li2_5 == 1 ) {{'checked'}} @endif 
                      @if(Auth::user()->id != $user->id ) {{'disabled'}} @endif
                    >
                  <span class="custom-control-label">5. Baca 10 kali nazirah dalam 10 rakaat solat sunat</span>
                </label>


                @if(Auth::user()->id == $user->id )
                  <button type="submit" class="btn btn-danger btn-block" style="background-color: #cd201fa6; "><i class="fe fe-check mr-2"></i>Insya Allah</button>
                @endif

              </form>
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
                @if(Auth::user()->role == "Admin" ) 
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalmarkah" data-oper='add' data-backdrop="static"><span class="fa fa-plus"></span> Markah Baru</button>
                @endif
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
                <a class="col nav-item nav-link active pill_mark" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" >Markah 
                
                  @if($user->level=='1')
                    <span class="badge bg-orange" style="position: absolute; top: 5px;right: 5px">Lv. 1</span>
                  @elseif($user->level=='2')
                    <span class="badge bg-azure" style="position: absolute; top: 5px;right: 5px">Lv. 2</span>
                  @else
                    <span class="badge bg-purple" style="position: absolute; top: 5px;right: 5px">Lv. 3</span>
                  @endif

                </a>
                <a class="col nav-item nav-link pl-auto pill_mark" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Komen Ustad</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

              <!-- card kedua markah -->
              <div class="card">
                <div class="card-header">

                  <span class="col">
                    <h3 class="card-title"><span class="span-header text-muted"></span></h3>
                  </span>
                  <span class="col text-right"><span class="span-ayat text-muted" id="ayat"></span></span>


                @if(Auth::user()->role == "Admin" ) 
                  <button type="button" class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modalmarkah" data-oper='edit' data-backdrop="static">Edit</button>
                @endif

                </div>

                <div class="card-body mx-auto">
                  <div class="tags">
                    <span class="tag">Overall<span class="tag-addon tag-red" id="tag-overall"></span></span>
                    <span class="tag">Kefasihan<span class="tag-addon tag-cyan" id="tag-kefasihan"></span></span>
                    <span class="tag">Tarannum<span class="tag-addon tag-cyan" id="tag-tarannum"></span></span>
                    <span class="tag">Tajwid<span class="tag-addon tag-cyan" id="tag-tajwid"></span></span>
                    <span class="tag">Kelancaran<span class="tag-addon tag-cyan" id="tag-kelancaran"></span></span>
                  </div>
                  <canvas id="myChart" class="d-none d-md-block"></canvas>
                </div>
              </div>
              <!-- end -->

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              
              <!-- card ketiga -->
               <div class="card">
                  <div class="card-header">
                    <span class="col">
                      <h3 class="card-title"><span class="span-header text-muted"></span></h3>
                    </span>
                    <span class="col text-right"><span class="span-ayat text-muted" id="ayat"></span></span>

                @if(Auth::user()->role == "Admin" ) 
                    <button type="button" class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modalmarkah" data-oper='edit'>Edit</button>
                @endif

                  </div>

                  <ul class="list-group card-list-group">
                    <li class="list-group-item py-5">
                      <div class="media">
                        <div class="media-object avatar avatar-md mr-4" style="background-image: url({{env('APP_URL')}}/uploads/image/uwaisqorny.jpg)"></div>
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

            <div class="card">
              <div class="card-body mx-auto">
                <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
              </div>
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
@include('layouts.modal_alert')

@endsection