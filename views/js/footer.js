 $(document).ready(function() {
      var val = 0;
      var moment = 0;

      
            $.ajax({
                  type: 'POST',
                  url: 'progress.php',
                  data: { val:val },
                  success: function(response) {
                        val = response;
           
                        $('.progress-bar').css('width', val+'%').attr('aria-valuenow', val);
                  }
            });

            
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
                              moment = $('#calendar').fullCalendar('getDate').format();
                              alert("The current date of the calendar is " + moment);
                              $(this).css('background-color', 'green');
                              


                             
                              
                        },


                        dayRender: function (date, cell) {
                              if (date.isSame('2016-09-14')) {
                                    cell.css("background-color","red");
                        }
                  } ,


                  events: [
                              {
                               title  : 'event1',
                               start  : '2016-09-17'
                              },
                              {
                              title  : 'event2',
                              start  : '2016-09-15',
                              end    : '2016-09-16'
                               },
                              {
                              title  : 'event3',
                              start  : '2016-09-14T12:30:00',
                              allDay : false // will make the time show
                              }   
                              ]

                                    }); 




                              $.ajax({
                                    type: 'POST',
                                    url: 'calendar.php',
                                    data: { moment:moment },
                                    success: function(response) {
                                          moment = response;
                                          
                        
                  }
            });
          



      });