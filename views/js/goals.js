

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
                              console.log(updatevalues);
                           }
                        });






                  $.ajax({
                         type: 'POST',
                         async: false,
                         url: 'updatedate.php',
                         data: { updatedates:updatedates },
                         success: function(response) {
                              updatedates = JSON.parse(response);
                              console.log(updatedates);
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


                     function newDate(days) {
                           return moment().add(days, 'd');
                              };   


                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            
                            labels: [newDate(-4), newDate(-3), newDate(2), newDate(3), newDate(4), newDate(5), newDate(6)],
                            datasets: [{
                              label: goal,
                              data: [1, 3, 4, 2, 1, 4, 2],
                            }]
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
                                   scaleLabel: {
                                       display: true,
                                        labelString: unit
                                    },
                                   time: {
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


