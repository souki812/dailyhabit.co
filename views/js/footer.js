 $(document).ready(function() {
      var val = 0;
      var dbdates = new Array();
   
      
                  $.ajax({
                         type: 'POST',
                         async: false,
                         url: 'loadcalendar.php',
                         data: { dbdates:dbdates },
                         success: function(response) {
                              dbdates = JSON.parse(response);
                           }
                        });

                     


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
          /**        $("#target").click(function() {
      
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
                  }); **/
                  
                  
                  
                  
                  // If the reset button is pressed
                  $("#reset").click(function() {
                        $('.progress-bar').css('width', '0%').attr('aria-valuenow', 0);
                        $("#progress1").html('0%');       
                  });

                var calendar = $('#calendar').fullCalendar({
                        header: {
                              left: 'prev,next today',
                              center: 'title',
                              right: 'month, basicDay, basicWeek'
                        },

                        
                        defaultView: 'basicWeek',
                        editable: true,
                        height: 200,


                        dayClick: function(date, jsEvent, view) {
                              var moment = date.format('YYYY-MM-DD');
                              
                              $(this).css('background-color', 'green');
                               $.ajax({
                              type: 'POST',
                              url: 'getprogress.php',
                              data: { val:val },
                              success: function(response) {
            
                                    val = response;
                        
                                    if (val == 100) {
                                          window.alert("Congratulations on completing your habit!");
                                    }
        
                                    // If the progress bar reaches 100% reset it back to 0
                                    if (val > 100) {
                                          val = 0;
                                    }
         
                                    $('.progress-bar').css('width', val+'%').attr('aria-valuenow', val);
                                    $("#progress1").html(response + '%');
                              }
                        });  








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
                              for (var i = 0; i < dbdates.length; i++) {
                                          
                                          if (date.isSame(dbdates[i])){
                                                
                                                cell.css("background-color", "green");
                                                }

                                          }
                                            
                        },

/*
                        //Allows a user to highlight multiple days or timeslots by clicking and dragging.
                        selectable: true,

                        //A value of true will draw a "placeholder" event while the user is dragging
                        selectHelper: true,
            /*
               when user select timeslot this option code will execute.
               It has three arguments. Start,end and allDay.
               Start means starting time of event.
               End means ending time of event.
               allDay means if events is for entire day or not.
            */
           /*             select: function(start, end, allDay){
               /*
                  after selection user will be promted for enter title for event.
               
               var title = prompt('Event Title:');
               /*
                  if title is enterd calendar will add title and event into fullCalendar.
               
               if (title){

                   var date = start;
                              
                                
                               $.ajax({
                                    type: 'POST',
                                    url: 'AddEvent.php',
                                    data: { date:date, title:title },
                                    success: function(response) {
                                          date = response;
                                               
                                    }
                              });
                  calendar.fullCalendar('renderEvent',
                     {

                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                     },
                     true // make the event "stick"
                  );
               }
               calendar.fullCalendar('unselect');
            },



            /*
               editable: true allow user to edit events.
            
            editable: true,
            /*
               events is the main option for calendar.
               for demo we have added predefined events in json object.
            
            events: [
               {
                  title: 'All Day Event',
                  start: new Date('2016-10-05')
               },
              ] */

                        
                  }); 
             
                                               
            });            
           






