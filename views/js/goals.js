

//Only display dates for data points
//http://stackoverflow.com/questions/41284788/chart-js-only-show-labels-on-x-axis-for-data-points


 $(document).ready(function() {
    var goal = 0;
    var variable = 0;
    var value = 0;
    var unit = 0;
    var updatedates = new Array();
    var updatevalues = new Array();
   
            $.ajax({
                         type: 'POST',
                         async: false,
                         url: 'updatevalue.php',
                         data: { updatevalues:updatevalues },
                         success: function(response) {
                              updatevalues = JSON.parse(response);
                              
                           }
                        });






                  $.ajax({
                         type: 'POST',
                         async: false,
                         url: 'updatedate.php',
                         data: { updatedates:updatedates },
                         success: function(response) {
                              updatedates = JSON.parse(response);
                              
                           }
                        });



                      $.ajax({
                                    type: 'POST',
                                    async: false,
                                    url: 'graph.php',
                                    data: { goal:goal},
                                    success: function(response) {
                                          goal = response;
                                          
                                               
                                    }
                              });


                       $.ajax({
                                    type: 'POST',
                                    async: false,
                                    url: 'variable.php',
                                    data: { variable:variable},
                                    success: function(response) {
                                          variable = response;
                                          
                                          
                                               
                                    }
                              });


                       $.ajax({
                                    type: 'POST',
                                    async: false,
                                    url: 'value.php',
                                    data: { value:value},
                                    success: function(response) {
                                          value = response;
                                          
                                          
                                               
                                    }
                              });


                       $.ajax({
                                    type: 'POST',
                                    async: false,
                                    url: 'unit.php',
                                    data: { unit:unit},
                                    success: function(response) {
                                          unit = response;
                                          
                                          
                                               
                                    }
                              });

 
              function randomColorFactor() {
                    return Math.round(Math.random() * 255);
                    }
              function randomColor(opacity) {
                    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
                  }

                  
                    var config = {
                        type: 'line',
                        data: {
                            
                        
                            datasets: [{
                              label: goal,
                              data: [{
                                      x: updatedates[0],
                                      y: updatevalues[0]
                          
                                  }],

                              fill:false,
                              
                            }],

                        },
                        options: {
                            title: {
                                display: true,
                                text: goal
                                },
                            scales: {
                                yAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: variable
                                        },
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }],
                                xAxes: [{

                                   type: 'time',
                                   barPercentage: 0.1,
                                    gridLines:{
                                            display: true,
                                            },
                                   scaleLabel: {
                                       display: true,
                                       labelString: unit
                                    },
                                   time:{
                                     displayFormats: {
                                       'millisecond': 'MMM DD',
                                       'second': 'MMM DD',
                                       'minute': 'MMM DD',
                                       'hour': 'MMM DD',
                                       'day': 'MMM DD',
                                       'week': 'MMM DD',
                                       'month': 'MMM DD',
                                       'quarter': 'MMM DD',
                                       'year': 'MMM DD',
                                     }
                                   }
                                 }],
                                   
                              
                            }
                        }
                    };

        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, config);

       jQuery.each(config.data.datasets, function(i, dataset) {
            dataset.borderColor = randomColor(0.4);
            dataset.backgroundColor = randomColor(0.5);
            dataset.pointBorderColor = randomColor(0.7);
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });
        jQuery.each(config.data.datasets, function() {
          for (var index = 0; index < updatedates.length; ++index) {
                    config.data.datasets[0].data.push({
                        x: updatedates[index],
                        y: updatevalues[index]
                    });
                } 
                myChart.update();   
        });

          

            });


