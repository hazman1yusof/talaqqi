@extends('layouts.main')

@section('corejs')
  
  requirejs.config({
      baseUrl: '.'
  });

@endsection

@section('script')
    <script src="{{ asset('./js/student.js') }}"></script>
@endsection

@section('page')

<div class="container">
  <div class="page-header">
    <h1 class="page-title">
      Talaqqi Student
    </h1>
    <span class="col text-right">
      @if(Auth::user()->role == "Admin" ) 
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalstudent" data-oper='add' data-backdrop="static"><span class="fe fe-user-plus"></span> Student Baru</button>
      @endif
    </span>
  </div>
  <div class="row row-cards row-deck">
    <div class="col-md-12 col-lg-12">
      <div class="row">

      @foreach($students as $index => $student )
        <div class="col-sm-6 col-lg-3 col-md-3">
          <div class="card">
            <div class="card-body">
              @if($student->level=='1')
                <span class="badge bg-orange" style="position: absolute; top: 5px;right: 5px">Lv. 1</span>
              @elseif($student->level=='2')
                <span class="badge bg-azure" style="position: absolute; top: 5px;right: 5px">Lv. 2</span>
              @else
                <span class="badge bg-purple" style="position: absolute; top: 5px;right: 5px">Lv. 3</span>
              @endif
              <div class="card-value float-right text-blue">
                <div class="text-right text-primary">
                  <span markah-last-{{$index}}></span>
                  <span chevron-{{$index}}><i class="fe fe-chevron-up"></i></span>
                </div>
              </div>
              <a href="student/{{$student->id}}" style="text-decoration: none ">
                @if($student->image_path!='')
                  <span class="avatar avatar-md mr-3" style="background-image: url({{env('APP_URL')}}/thumbnail/{{$student->image_path}})"></span>
                @else
                  <span class="avatar avatar-md mr-3" style="background-image: url({{env('APP_URL')}}/thumbnail/image/avatar-empty.png)"></span>
                @endif
              </a>
              <a href="student/{{$student->id}}">{{$student->name}}</a>
              <div class="text-muted" div-a-{{$index}} ><p>&nbsp;{{$student->firstname}} {{$student->lastname}}</p></div>
            </div>
            <div class="card-chart-bg">
              <div chart-student id="chart-student-{{$index}}" data-id="{{$student->id}}" style="height: 100%"></div>
            </div>

            @foreach($student->talaqqi as $index2 => $markah )
              <span markah-student-{{$index}} no="{{$index2}}" data-id="{{$student->id}}" data-overall='{{$markah->overall}}'></span>
            @endforeach
          </div>
        </div>
      @endforeach

      </div>
    </div>
  </div>
</div>

@include('layouts.modal_student')

@endsection