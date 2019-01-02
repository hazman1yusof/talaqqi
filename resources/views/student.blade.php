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
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalstudent" data-oper='add' data-backdrop="static"><span class="fe fe-user-plus"></span> Student Baru</button>
    </span>
  </div>
  <div class="row row-cards row-deck">
    <div class="col-md-12 col-lg-12">
      <div class="row">

      @foreach($students as $index => $student )
        <div class="col-sm-6 col-lg-3 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="card-value float-right text-blue">
                <div class="text-right text-primary">
                  8
                  <i class="fe fe-chevron-up"></i>
                </div>
              </div>
              <div class="avatar avatar-md mr-3" style="background-image: url({{env('APP_URL')}}thumbnail/{{$student->image_path}})">
              </div>
              <div class="text-muted"><a href="student/{{$student->id}}">{{$student->firstname}} {{$student->lastname}}</a></div>
            </div>
            <div class="card-chart-bg">
              <div chart-student id="chart-student-{{$index}}" data-id="{{$student->id}}" style="height: 100%"></div>
            </div>

            @foreach($student->talaqqi as $index2 => $markah )
              <span markah-student-{{$index}} data-id="{{$student->id}}" data-overall='{{$markah->overall}}'></span>
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