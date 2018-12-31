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
      Talaqqi Student
    </h1>
  </div>
  <div class="row row-cards row-deck">
    <div class="col-md-12 col-lg-12">
      <div class="row">

        <div class="col-sm-6 col-lg-3 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="card-value float-right text-blue">
                <div class="text-right text-primary">
                  8
                  <i class="fe fe-chevron-up"></i>
                </div>
              </div>
              <div class="avatar avatar-md mr-3" style="background-image: url(demo/faces/male/15.jpg)">
              </div>
              <div class="text-muted"><a href="student/2?offset=0&limit=10">Hazman Yusof</a></div>
            </div>
            <div class="card-chart-bg">
              <div id="chart-bg-users-1" style="height: 100%"></div>
            </div>
          </div>
          <script>
            require(['c3', 'jquery'], function (c3, $) {
              $(document).ready(function() {
                var chart = c3.generate({
                  bindto: '#chart-bg-users-1',
                  padding: {
                    bottom: -10,
                    left: -1,
                    right: -1
                  },
                  data: {
                    names: {
                      data1: 'Users online'
                    },
                    columns: [
                      ['data1', 7.5, 8, 8, 7.5, 7.5, 6, 6]
                    ],
                    type: 'area'
                  },
                  legend: {
                    show: false
                  },
                  transition: {
                    duration: 0
                  },
                  point: {
                    show: false
                  },
                  tooltip: {
                    format: {
                      title: function (x) {
                        return '';
                      }
                    }
                  },
                  axis: {
                    y: {
                      padding: {
                        bottom: 0,
                      },
                      show: false,
                      tick: {
                        outer: false
                      }
                    },
                    x: {
                      padding: {
                        left: 0,
                        right: 0
                      },
                      show: false
                    }
                  },
                  color: {
                    pattern: ['#467fcf']
                  }
                });
              });
            });
          </script>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection