@extends('layouts.main')

@section('corejs')
  
  requirejs.config({
      baseUrl: '.'
  });

@endsection

@section('page')

<div class="container">
  <div class="page-header">
    <h1 class="page-title">
      blog
    </h1>
  </div>

</div>

@endsection