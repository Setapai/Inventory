$(document).ready(function(){
  loadMonthly();
  function loadMonthly()
  {
    $.ajax({
      url:"../model/reports/monthly.php",
      method:"POST",
      data:{},
      success:function(data)
      {
        var parse = JSON.parse(data);
        var dates = [];
        var labels = [];
        var newLabels = [];
        for(var i =  0;  i < parse.length - 1;  i++){
          labels.push(parse[i].total);
          dates.push(parse[i].curdate);
        }
        for(var x =  0;  x < labels.length;  x++){
          newLabels.push(labels[x] - parse[i][x].disc);
        }

        var ctx = document.getElementById('monthlyChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: dates,
            datasets: [{
              data: newLabels,
              backgroundColor:'#4DB6AC',
              borderWidth:1,
              borderColor:"#80CBC4",
              hoverBackgroundColor:"#80CBC4",
              hoverBorderWidth:2,
              fill: false,
              hoverBorderColor:"#80CBC4"

            }]
          },
          options:{
            responsive: true,
            title:{
              display:false,
            },
            legend:
            {
              display:false
            },
            tooltips:{
              custom: function(tooltip) {
                if (!tooltip) return;
                // disable displaying the color box;
                tooltip.displayColors = false;
              },
              callbacks: {
                // use label callback to return the desired label
                label: function(tooltipItem, data) {
                  return  "Income: "+ tooltipItem.value + " ₱";
                },
                // remove title
                title: function(tooltipItem, data) {
                  return;
                }
              }
            },scales: {
              xAxes: [{
                position: "bottom",
                type: 'category',
                ticks: {
                  display: true,
                  precision:0,
                },
                gridLines: {
                  display: true
                }
              },{
                position: "top",
                type: 'category',
                labels: newLabels,
                ticks: {
                  display: false,
                  precision:0,
                },
                gridLines: {
                  display: false
                }

              }],
              yAxes: [{
                ticks: {
                  min:0,
                  precision:0,
                  display:false,
                },
                gridLines: {
                  display: false,
                }
              }]

            }
          }
        });
      }
    });
  }
});
