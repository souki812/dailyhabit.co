

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

 
                    console.log(updatevalues);
                    console.log(updatedates);

                    console.log(updatedates[0]);
                    console.log(updatevalues[0]);

                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            
                        
                            datasets: [{
                              label: goal,
                              data: [{
                                      x: updatedates[0],
                                      y: updatevalues[0]
                                  }, {
                                      x: updatedates[1],
                                      y: updatevalues[1]
                                  }, {
                                      x: updatedates[2],
                                      y: updatevalues[2]
                                  }],
                              fill:false,
                              backgroundColor: 'rgba(255, 99, 132, 0.2)',
                              borderColor: 'rgba(255,99,132,1)',
                              borderWidth: 1
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
                    });

          

            });


