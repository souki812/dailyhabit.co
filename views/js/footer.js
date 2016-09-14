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

                              alert('Clicked on' + date.format());


                              $(this).css('background-color', 'green');
                        } 
                  }); 

          

           function addTitle(){ //having a button onClick="addTitle()"
            var title = $('#add_date_title').val();
            var startdate = $('#add_date_startdate').val();
            var enddate = $('#add_date_enddate').val();
            var end_split = enddate.split('-');
            end_split[2]= parseInt(end_split[2])+parseInt("1");
            enddate = end_split[0] + "-" + end_split[1] + "-" + end_split[2];
            $('#add_date_title').val('');
            $('#add_date_startdate').val('');
            $('#add_date_enddate').val('');
            $('#add_date_modal').modal('hide');

            var myCalendar = $('#calendar');
            var myEvent = {
                title:title,
                allDay: true,
                start: startdate,
                end: enddate
            };
            myCalendar.fullCalendar( 'renderEvent', myEvent );
        }       

      });