@extends('layouts.main')

@section('corejs')
  
  requirejs.config({
      baseUrl: '../'
  });

@endsection

@section('page')

<!-- <div class="container">
  <div class="row row-cards row-deck">
    <div class="col-md-12 col-lg-12">
      <div class="row">

      </div>
    </div>
  </div>
</div>
 -->
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
              <div class="text-muted">Username</div>
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

        <div class="col-sm-6 col-lg-3 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="card-value float-right text-blue">
                <div class="text-right text-lime">
                  6
                  <i class="fe fe-chevron-down"></i>
                </div>
              </div>
              <div class="avatar avatar-md mr-3" style="background-image: url(demo/faces/male/2.jpg)">
              </div>
              <div class="text-muted">Username</div>
            </div>
            <div class="card-chart-bg">
              <div id="chart-bg-users-2" style="height: 100%"></div>
            </div>
          </div>
          <script>
            require(['c3', 'jquery'], function (c3, $) {
              $(document).ready(function() {
                var chart = c3.generate({
                  bindto: '#chart-bg-users-2',
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
                      ['data1', 6.5, 5, 4, 7.5, 7.5, 6, 6]
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
                    pattern: ['#7bd235']
                  }
                });
              });
            });
          </script>
        </div>

        <div class="col-sm-6 col-lg-3 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="card-value float-right text-blue">
                <div class="text-right text-cyan">
                  7.5
                  <i class="fe fe-chevron-up"></i>
                </div>
              </div>
              <div class="avatar avatar-md mr-3" style="background-image: url(demo/faces/male/16.jpg)">
              </div>
              <div class="text-muted">Username</div>
            </div>
            <div class="card-chart-bg">
              <div id="chart-bg-users-3" style="height: 100%"></div>
            </div>
          </div>
          <script>
            require(['c3', 'jquery'], function (c3, $) {
              $(document).ready(function() {
                var chart = c3.generate({
                  bindto: '#chart-bg-users-3',
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
                      ['data1', 7.5, 4, 5, 7.5, 7, 6, 8]
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
                    pattern: ['#17a2b8']
                  }
                });
              });
            });
          </script>
        </div>

        <div class="col-sm-6 col-lg-3 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="card-value float-right text-blue">
                <div class="text-right text-yellow">
                  9
                  <i class="fe fe-chevron-up"></i>
                </div>
              </div>
              <div class="avatar avatar-md mr-3" style="background-image: url(demo/faces/female/31.jpg)">
              </div>
              <div class="text-muted">Username</div>
            </div>
            <div class="card-chart-bg">
              <div id="chart-bg-users-4" style="height: 100%"></div>
            </div>
          </div>
          <script>
            require(['c3', 'jquery'], function (c3, $) {
              $(document).ready(function() {
                var chart = c3.generate({
                  bindto: '#chart-bg-users-4',
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
                    pattern: ['#f1c40f']
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