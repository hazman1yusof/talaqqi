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
            markah_upd((d.index-9)*-1);
          },
        },
        axis: {
          x: {
            type: 'category',
            // name of each category
            categories: data_date()
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
              labels: ["Kefasihan", "Tarannum", "Tajwid", "Kelancaran"],
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

      markah_upd(-0);
      function markah_upd(index){
        var markah_arr =  $("#data_"+index).data('markah').split(',');
        var period = $("#data_"+index).data('period');
        var ayat = $("#data_"+index).data('ayat');
        config.data.datasets[0].data = $("#data_"+index).data('markah').split(',');
        myChart.update();

        $('.span-header').text(period);
        $('.span-ayat').text(ayat);

        $('#tag-overall').text($("#data_"+index).data('overall'));
        $('#tag-kefasihan').text(markah_arr[0]);
        $('#tag-tarannum').text(markah_arr[1]);
        $('#tag-tajwid').text(markah_arr[2]);
        $('#tag-kelancaran').text(markah_arr[3]);

        $("#comment").fadeOut(100, function() {
            $(this).text($('#data_'+index).data('comment')).fadeIn(100);
        });

        //tukar markah-form
        $("#talaqqiform input[type=number][name='kefasihan']").val($("#data_"+index).data('kefasihan'));
        $("#talaqqiform input[type=number][name='tarannum']").val($("#data_"+index).data('tarannum'));
        $("#talaqqiform input[type=number][name='tajwid']").val($("#data_"+index).data('tajwid'));
        $("#talaqqiform input[type=number][name='kelancaran']").val($("#data_"+index).data('kelancaran'));
        $("#talaqqiform input[name='ayat']").val($("#data_"+index).data('ayat'));
        $("#talaqqiform textarea[name='komen']").val($("#data_"+index).data('comment'));
        $("#talaqqiform input[name='id']").val($("#data_"+index).data('id'));

      }

      function data_overall(){
        var data_overall = [];
        $( "span[talaqqi]" ).each(function( index ) {
          data_overall.push($(this).data('overall'));
        });
        data_overall.push('overall');
        data_overall = data_overall.reverse();

        return data_overall;
      }

      function data_date(){
        var data_date = [];
        $( "span[talaqqi]" ).each(function( index ) {
          data_date.push($(this).data('period'));
        });
        data_date = data_date.reverse();

        return data_date;
      }

      function pad(pad, str, padLeft) {
        if (typeof str === 'undefined') 
          return pad;
        if (padLeft) {
          return (pad + str).slice(-pad.length);
        } else {
          return (str + pad).substring(0, pad.length);
        }
      }

      $("button[data-target='#modalmarkah']").click(function(){
        $("#talaqqiform input[name='oper']").val($(this).data('oper'));
        if($(this).data('oper') == 'add'){
          document.getElementById("talaqqiform").reset();
        }
      });

      $('#bioform input[name=id_c]').val(pad('00000',$('#bioform input[name=id]').val(),true));
      $('#bioform select[name=gender]').val($('#bioform input[name=gender_h]').val());
      $('#bioform select[name=marital]').val($('#bioform input[name=marital_h]').val());
    
    });
  });