@extends('layouts.main')


@section('page')

<div class="container">
  <div class="page-header">
    <h1 class="page-title">
      Dashboard
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
                <div class="avatar avatar-md mr-3" style="background-image: url(demo/faces/female/26.jpg)">
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
              <div class="card-value float-right text-red">-3%</div>
              <h3 class="mb-1">423</h3>
              <div class="text-muted">Users online</div>
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
                      ['data1', 30, 40, 10, 40, 12, 22, 40]
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
                    pattern: ['#e74c3c']
                  }
                });
              });
            });
          </script>
        </div>
        <div class="col-sm-6 col-lg-3 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="card-value float-right text-green">-3%</div>
              <h3 class="mb-1">423</h3>
              <div class="text-muted">Users online</div>
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
                      ['data1', 30, 40, 10, 40, 12, 22, 40]
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
                    pattern: ['#5eba00']
                  }
                });
              });
            });
          </script>
        </div>
        <div class="col-sm-6 col-lg-3 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="card-value float-right text-yellow">9%</div>
              <h3 class="mb-1">423</h3>
              <div class="text-muted">Users online</div>
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
                      ['data1', 30, 40, 10, 40, 12, 22, 40]
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