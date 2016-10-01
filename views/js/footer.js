 $(document).ready(function() {
      var val = 0;
      var dbdates = new Array();
      
                  $.ajax({
                         type: 'POST',
                         url: 'loadcalendar.php',
                         data: { dbdates:dbdates },
                         success: function(response) {
                              dbdates = response;
                              alert(dbdates);
                                          
                              }
                                 
                        }); 




        /*    $.ajax({
                  type: 'POST',
                  url: 'progress.php',
                  data: { val:val },
                  success: function(response) {
                        val = response;
           
                        $('.progress-bar').css('width', val+'%').attr('aria-valuenow', val);
                  }
            });*/

            
                  // If the achieved button is pressed
                  $("#target").click(function() {
      
                        $.ajax({
                              type: 'POST',
                              url: 'getprogress.php',
                              data: { val:val },
                              success: function(response) {
            
                                    val = response;
                        
                                    if (val == 100) {
                                          window.alert("Congratulations on reaching 100%!");
                                    }
        
                                    // If the progress bar reaches 100% reset it back to 0
                                    if (val > 100) {
                                          val = 0;
                                    }
         
                                    $('.progress-bar').css('width', val+'%').attr('aria-valuenow', val);
                                    $("#progress1").html(response + '%');
                              }
                        });  
                  });
                  
                  
                  
                  
                  // If the reset button is pressed
                  $("#reset").click(function() {
                        $('.progress-bar').css('width', '0%').attr('aria-valuenow', 0);
                        $("#progress1").html('0%');       
                  });

                 $('#calendar').fullCalendar({
                        header: {
                              left: 'prev,next today',
                              center: 'title',
                              right: 'month, basicDay, basicWeek'
                        },

                        
                        defaultView: 'basicWeek',
                        editable: true,
                        height: 200,


                        dayClick: function(date, jsEvent, view) {
                              var moment = date.format('MM-DD-YYYY');
                              
                              $(this).css('background-color', 'green');    
                               $.ajax({
                                    type: 'POST',
                                    url: 'calendar.php',
                                    data: { moment:moment },
                                    success: function(response) {
                                          moment = response;
                                               
                                    }
                              });
                        },

                        dayRender: function (date, cell) {
                              var dbDates = ['2016-09-23', '2016-09-20', '2016-09-22'];

                                    for (var i = 0; i < dbDates.length; i++) {
                                    
                                          if (date.isSame(dbDates[i].toString())) {
                                                
                                                cell.css("background-color", "red");
                                                }
                                          }

                              
                              
                        }, 

                        
                  }); 
             
                                               
            });            
           






