 $(document).ready(function() {
      var val = 0;
      
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
                              var moment = $('#calendar').fullCalendar('getDate');
                              alert("The current date of the calendar is " + moment.format());
                              $(this).css('background-color', 'green');
                        },


                        dayRender: function (date, cell) {
                              if (date.isSame('2016-09-14')) {
                                    cell.css("background-color","red");
                        }
                  } 
                 }); 

          



      });