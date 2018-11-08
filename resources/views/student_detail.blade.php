@extends('layouts.main')

@section('corejs')
  
  requirejs.config({
      baseUrl: '../'
  });

@endsection

@section('page')

<div class="container">
  <div class="row row-cards row-deck">
    <div class="col-md-12 col-lg-12">
      <div class="row">

      </div>
    </div>
  </div>
</div>


@endsection