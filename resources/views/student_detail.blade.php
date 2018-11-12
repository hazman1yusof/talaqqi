@extends('layouts.main')

@section('corejs')
  
  requirejs.config({
      baseUrl: '../'
  });

@endsection

@section('page')

<div class="container">
<!-- Button trigger modal -->

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
				    <h3 class="card-title">Chart name</h3>
				  </div>
				  <div class="card-body">
				  	<span id="data" 
				  		data-overall="overall, 7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3" 
				  		data-period="12/11/2018, 02/11/2018, 12/10/2018, 22/09/2018, 12/08/2018, 12/12/2018, 12/12/2018, 12/12/2018, 12/12/2018, 12/12/2018"
				  	>
				  	</span>

					@for ($i = 0; $i < 10; $i++)
					    <span id="comment_{{$i}}" data-comment="comment_{{$i}} Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus."></span>
					    <span id="markah_{{$i}}" data-markah="{{$i}}, 6, 7, 7.5"></span>
					@endfor

				    <div id="chart-wrapper" style="height: 16rem"></div>
				  </div>
				</div>

                <div class="card">
                  <div class="card-header">
              	    <h3 class="card-title">Markah</h3>
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

					<script>
					require(['c3', 'chartjs', 'jquery'], function(c3, chartjs, $) {
					  $(document).ready(function(){

					  	var chart = c3.generate({
					      bindto: '#chart-wrapper', // id of chart wrapper
					      data: {
					        columns: [
					            // each columns data
					        	$('#data').data('overall').split(',')
					        ],
					        labels: true,
					        type: 'spline', // default type of chart
					        selection: {
						      grouped: true
						    },
					        onclick: function (d, i) {
					        	$("#comment").fadeOut(100, function() {
								    $(this).text($('#comment_'+d.index).data('comment')).fadeIn(100);
								});
								markah_upd('#markah_'+d.index);
					        },
					      },
					      axis: {
					        x: {
					          type: 'category',
					          // name of each category
					          categories: $('#data').data('period').split(',')
					        },
					      },
					      legend: {
					                show: false, //hide legend
					      },
					      padding: {
					        bottom: 0,
					        top: 0
					      },
					    });

					  	var ctx = document.getElementById("myChart").getContext('2d');
					  	var config = {
						    type: 'radar',
						    data: {
						        labels: ["Overall", "Tarannum", "Tajwid", "Kelancaran"],
						        datasets: [{
								    label: "Student A",
								    backgroundColor: "rgba(200,0,0,0.2)",
								    data: $('#markah_9').data('markah').split(',')
								}]
						    },
						    options: {
								legend: false,
								scale: {
									ticks: {
										beginAtZero: true,
										min: 0,
      									max: 10,
      									stepSize: 2
									}
								}
							}
						}

					  	var myChart = new Chart(ctx, config);

					  	function markah_upd(markah){
					  		var markah_arr =  $(markah).data('markah').split(',');
					  		config.data.datasets[0].data = markah_arr
					  		myChart.update();

					  		$('#tag-overall').text(markah_arr[0]);
					  		$('#tag-tarannum').text(markah_arr[1]);
					  		$('#tag-tajwid').text(markah_arr[2]);
					  		$('#tag-kelancaran').text(markah_arr[3]);
					  	}
						
					  });
					});

					</script>
          	    </div>

				      <div class="card">
                  <div class="card-header">
                  	<h3 class="card-title">Komen Ustad</h3>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Bio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
	    <form>

	      <div class="form-group">
            <label class="form-label">Username</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fe fe-user"></i>
              </span>
              <input type="text" class="form-control" placeholder="Username">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Biodata</label>
            <textarea class="form-control" name="example-textarea-input" rows="3" placeholder="Content..">Student, Surau Assobah Seksyen 3 Bandar Baru Bangi</textarea>
          </div>

          <div class="form-group">
            <label class="form-label">Facebook</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fa fa-facebook"></i>
              </span>
              <input type="text" class="form-control" placeholder="Facebook">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Twitter</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fa fa-twitter"></i>
              </span>
              <input type="text" class="form-control" placeholder="Twitter">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Whatsapp / Handphone</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fa fa-phone"></i>
              </span>
              <input type="text" class="form-control" placeholder="Whatsapp / Handphone">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Instagram</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fa fa-instagram"></i>
              </span>
              <input type="text" class="form-control" placeholder="Instagram">
            </div>
          </div>

	    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection