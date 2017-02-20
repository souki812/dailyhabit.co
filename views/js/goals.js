 $(document).ready(function() {
    var goal = 0;
    var variable = 0;
    var value = 0;
    var unit = 0;



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





                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                            datasets: [{
                                label: [goal, variable, value, unit],
                                data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'

                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
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
                                }]
                            }
                        }
                    });
            });