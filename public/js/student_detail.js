require(['c3', 'chartjs', 'jquery','moment'], function(c3, chartjs, $,moment) {
    $(document).ready(function(){

      function lastid(){
        return $("span[talaqqi]").length - 1;
      }

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
            markah_upd(d.index);
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
              labels: ["Tartil", "Fasohah", "Tarannum", "Tajwid"],
              datasets: [{
              label: $('#name').text(),
              backgroundColor: "rgba(200,0,0,0.2)",
              data: data_load()
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
      
      function data_load(index){
        if($('#data_'+index).data('markah') == undefined){
          return [];
        }else{
          return $('#data_'+index).data('markah').split(',');
        }
      }

      var myChart = new Chart(ctx, config);
      var lastindex;

      markah_upd(lastid());
      function markah_upd(index_){
        var index = (index_-lastid())*-1 //tukar sebab dia terbalik 0-9 ke 9-0
        var markah_arr =  data_load(index);
        var period = $("#data_"+index).data('period');
        var ayat = $("#data_"+index).data('ayat');
        config.data.datasets[0].data = data_load(index);
        myChart.update();

        //markah tag
        $('.span-header').text(period);
        $('.span-ayat').text(ayat);
        $('#tag-overall').text($("#data_"+index).data('overall'));
        $('#tag-kefasihan').text($("#data_"+index).data('kefasihan'));
        $('#tag-tarannum').text($("#data_"+index).data('tarannum'));
        $('#tag-tajwid').text($("#data_"+index).data('tajwid'));
        $('#tag-kelancaran').text($("#data_"+index).data('kelancaran'));
        $("#comment").fadeOut(100, function() {
            $(this).html($('#data_'+index).data('comment')).fadeIn(100);
        });

        lastindex = index;
        // populate_form(index);

        //selected value dekat chart
        chart.xgrids([{value: index_, class: 'grid4', text: 'OVERALL'}]);

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

      function populate_form(index){
        //tukar markah-form
        $("#talaqqiform input[type=number][name='kefasihan']").val($("#data_"+index).data('kefasihan'));
        $("#talaqqiform input[type=number][name='tarannum']").val($("#data_"+index).data('tarannum'));
        $("#talaqqiform input[type=number][name='tajwid']").val($("#data_"+index).data('tajwid'));
        $("#talaqqiform input[type=number][name='kelancaran']").val($("#data_"+index).data('kelancaran'));
        $("#talaqqiform input[name='ayat_dari']").val($("#data_"+index).data('ayat_dari'));
        $("#talaqqiform input[name='ayat']").val($("#data_"+index).data('ayat'));
        $("#talaqqiform textarea[name='komen']").val($("#data_"+index).data('comment-nl'));
        $("#talaqqiform input[name='id']").val($("#data_"+index).data('id'));
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
          $('#talaqqiform select[name=level]').val($('#talaqqiform input[name=level_h]').val());
          var index = (lastid()-lastid())*-1
          $("#talaqqiform input[name='ayat_dari']").val($("#data_"+index).data('ayat'));
          start_timer_reset();
        }else{
          populate_form(lastindex);
        }
      });

      $('#bioform input[name=id_c]').val(pad('00000',$('#bioform input[name=id]').val(),true));
      $('#bioform select[name=gender]').val($('#bioform input[name=gender_h]').val());
      $('#bioform select[name=marital]').val($('#bioform input[name=marital_h]').val());
      $('#talaqqiform select[name=level]').val($('#talaqqiform input[name=level_h]').val());

      $('.custom-file-input').on('change', function() { 
         let fileName = $(this).val().split('\\').pop(); 
         $(this).next('.custom-file-label').addClass("selected").html(fileName); 
      });

      modal_alert()
      function modal_alert(){
        var modalalert = $("#modalalert-ul").data('has');
        if(modalalert){
          $('#modalalert').modal('show')
        }
        var modalmsg = $("#modalmsg-ul").data('has');
        if(modalmsg){
          $('#modalmsg').modal('show')
        }
      }

      $("#hide_li,#show_li").click(function(){
        $( "#card_li" ).toggle("fast");
        $( "#hide_li,#show_li" ).toggle();
      });

      $("#start_timer").click(function(){
        var oper = $(this).data('oper');
        if(oper == 'start'){
          $(this).data('oper','pause');
          start_timer();
        }else if(oper == 'pause'){
          $(this).data('oper','start');
          pause_timer();
        }
      });

      // function start_timer(){
      //   var now = moment(); // new Date().getTime();
      //   var then = moment().add(4, 'minutes'); // new Date(now + 60 * 1000);

      //   $(".now").text(moment(now).format('h:mm:ss a'));
      //   $(".then").text(moment(then).format('h:mm:ss a'));
      //   $(".duration").text(moment(now).to(then));
      //   (function timerLoop() {
      //     $(".difference > span").text(moment().to(then));
      //     $(".countdown").text(countdown(then).toString());
      //     requestAnimationFrame(timerLoop);
      //   })();
      // }

      function decide_timer_length(){
        var level = $('#talaqqiform input[name=level_h]').val();
        switch(level) {
          case "1":
            return {txt:"04:00",minute:4};
            break;
          case "2":
            return {txt:"06:00",minute:6};
            break;
          case "3":
            return {txt:"09:00",minute:9};
            break;
          case "SS":
            return {txt:"15:00",minute:15};
            break;
          default:
            return {txt:"04:00",minute:4};
        }
      }

      function start_timer_reset(){
        $( "#start_timer" ).removeClass( "btn-outline-danger" ).removeClass( "btn-outline-success" ).addClass( "btn-outline-info" );
        $('.countdown').text(decide_timer_length().txt);
        timer={interval:null,countDownDate:null,reset:true,reset_moment:null};
      }


      var timer={interval:null,countDownDate:null,reset:true,reset_moment:null};
      function start_timer(){
        $( "#start_timer" ).removeClass( "btn-outline-danger" ).removeClass( "btn-outline-success" ).addClass( "btn-outline-info" );
        if(timer.reset){
          timer.countDownDate = moment().add(decide_timer_length().minute, 'minutes');
        }else{
          var time_pausing = timer.reset_moment.diff(moment());
          timer.countDownDate = timer.countDownDate.subtract(time_pausing, 'milliseconds');
        }

        timer.interval = setInterval(function() {
          diff = timer.countDownDate.diff(moment());
      
          if (diff <= 0) {
            clearInterval(timer.interval);
            $("#start_timer").data('oper','expired');
             // If the count down is finished, write some text 
            $('.countdown').text("EXPIRED");
            $( "#start_timer" ).removeClass( "btn-outline-info" ).removeClass( "btn-outline-success" ).addClass( "btn-outline-danger" );
          } else
            $('.countdown').text(moment.utc(diff).format("mm:ss"));

        }, 1000);
      }

      function pause_timer(){
        clearInterval(timer.interval);
        timer.reset=false;
        timer.reset_moment=moment();
        $( "#start_timer" ).removeClass( "btn-outline-danger" ).removeClass( "btn-outline-info" ).addClass( "btn-outline-success" );
      }

    
    });
  });