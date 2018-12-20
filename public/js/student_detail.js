require(['c3', 'chartjs', 'jquery'], function(c3, chartjs, $) {
    $(document).ready(function(){

      var chart = c3.generate({
        bindto: '#chart-wrapper', // id of chart wrapper
        data: {
          columns: [
              // each columns data
            data_overall()
          ],
          labels: true,
          type: 'spline', // default type of chart
          selection: {
          grouped: true
        },
          onclick: function (d, i) {
            $("#comment").fadeOut(100, function() {
                $(this).text($('#data_'+d.index).data('comment')).fadeIn(100);
            });
            markah_upd(d.index);
          },
        },
        axis: {
          x: {
            type: 'category',
            // name of each category
            categories: []
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
              data: $('#data_'+$('#lastid').data('id')).data('markah').split(',')
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

      markah_upd($('#lastid').data('id'));
      function markah_upd(index){
        var markah_arr =  $("#data_"+index).data('markah').split(',');
        var period = $("#data_"+index).data('period');
        var ayat = $("#data_"+index).data('ayat');
        config.data.datasets[0].data = markah_arr;
        myChart.update();

        $('.span-header').text(period);
        $('.span-ayat').text(ayat);

        $('#tag-overall').text(markah_arr[0]);
        $('#tag-tarannum').text(markah_arr[1]);
        $('#tag-tajwid').text(markah_arr[2]);
        $('#tag-kelancaran').text(markah_arr[3]);
      }

      function data_overall(){
        var data_overall = ["overall"];
        $( "span[talaqqi]" ).each(function( index ) {
          data_overall.push($(this).data('overall'));
        });
        return data_overall
      }
      data_overall();

      function pad(pad, str, padLeft) {
        if (typeof str === 'undefined') 
          return pad;
        if (padLeft) {
          return (pad + str).slice(-pad.length);
        } else {
          return (str + pad).substring(0, pad.length);
        }
      }

      $('#bioform input[name=id_c]').val(pad('00000',$('#bioform input[name=id]').val(),true));
      $('#bioform select[name=gender]').val($('#bioform input[name=gender_h]').val());
      $('#bioform select[name=marital]').val($('#bioform input[name=marital_h]').val());
    
    });
  });