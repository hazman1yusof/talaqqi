require(['c3', 'jquery'], function (c3, $) {

    $(document).ready(function() {

      loop_chart();

      function loop_chart(){
        $( "div[chart-student]" ).each(function( index ) {
          makechart_student(index)
        })
      }

      function data_overall(index){
        var data_overall = [];
        $( "span[markah-student-"+index+"]" ).each(function( index ) {
          data_overall.push($(this).data('overall'));
        });
        data_overall.push('overall');
        data_overall = data_overall.reverse();

        return data_overall;
      }

      function makechart_student(index){
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
            pattern: ['#467fcf']
          }
        });
      }

    });
});