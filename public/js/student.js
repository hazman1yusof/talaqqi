require(['c3', 'jquery'], function (c3, $) {

    $(document).ready(function() {

      loop_chart();

      function loop_chart(){
        var pattern = ['#467fcf', '#e74c3c' , '#5eba00' , '#f1c40f'];
        $( "div[chart-student]" ).each(function( index ) {
          chevron(index,pattern[index%4])
          makechart_student(index,pattern[index%4])
        })
      }

      function data_overall(index,pattern){
        var data_overall = [];
        $( "span[markah-student-"+index+"]" ).each(function( index ) {
          data_overall.push($(this).data('overall'));
        });
        data_overall.push('overall');
        data_overall = data_overall.reverse();

        return data_overall;
      }

      function chevron(index,pattern){
        var markahlast = Math.round($("span[markah-student-"+index+"][no='0']").data('overall'));
        if(isNaN(markahlast)){markahlast = 0;}
        $("span[markah-last-"+index+"]").text(markahlast);
        var length = $("span[markah-student-"+index+"]").length;
        var chevron = `<i class="fe fe-minus">`;

        if(length>=2){
          let last = $("span[markah-student-"+index+"][no='0']").data('overall');
          let second_last = $("span[markah-student-"+index+"][no='1']").data('overall');

          if(parseFloat(last)>parseFloat(second_last)){
            chevron = `<i class="fe fe-chevron-up">`;
          }else if(parseFloat(last)==parseFloat(second_last)){
            chevron = `<i class="fe fe-minus">`;
          }else if(parseFloat(last)<parseFloat(second_last)){
            chevron = `<i class="fe fe-chevron-down">`;
          }
        }

        $("span[chevron-"+index+"]").html(chevron);
        $("span[chevron-"+index+"], span[markah-last-"+index+"]").css("color",pattern);

      }

      function makechart_student(index,pattern){
        c3.generate({
          bindto: '#chart-student-'+index,
          padding: {
            bottom: -10,
            left: -1,
            right: -1
          },
          data: {
            names: {
              overall: 'Overall marks'
            },
            columns: [
              data_overall(index)
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
            pattern: [pattern] //'#467fcf', '#e74c3c' , '#5eba00' , '#f1c40f'
          }
        });
      }

      $("#bioform input[name='username']").blur(function(){
        $("#bioform input[name='password']").val($(this).val());
      })

    });
});