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
                  url: 'getprogress.php',
                  data: { val:val },
                  success: function(response) {
                        val = response;
                        $('.progress-bar').css('width', val+'%').attr('aria-valuenow', val);

                         if (val == 100) {
                                 window.alert("Congratulations on completing your habit!");
                                 val = 0;
                                    }
                  }
            });

            

                //FullCalendar
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
                             

                              var currentDate = new Date();
                              

                              if (moment <= currentDate){
                                alert("moment: " + moment  + " today: " + currentDate);

                              $(this).css('background-color', 'green');

                              
                               
                               $.ajax({
                                    type: 'POST',
                                    async: false,
                                    url: 'calendar.php',
                                    data: { moment:moment },
                                    success: function(response) {
                                          moment = response;
                                               
                                    }
                              });


                               $.ajax({
                                 type: 'POST',
                                 async: false,
                                 url: 'getprogress.php',
                                 data: { val:val },
                                 success: function(response) {
                                 val = response;
                                    $('.progress-bar').css('width', val+'%').attr('aria-valuenow', val);

                              if (val == 100) {
                                 window.alert("Congratulations on completing your habit!");
                                    }
        
                        // If the progress bar reaches 100% reset it back to 0
                        if (val > 100) {
                              val = 0;
                           }
                  }
            });


                                 $.ajax({
                         type: 'POST',
                         async: false,
                         url: 'loadcalendar.php',
                         data: { dbdates:dbdates },
                         success: function(response) {
                              dbdates = JSON.parse(response);
                           }
                        });

}
                        },

                        dayRender: function (date, cell) {
                              for (var i = 0; i < dbdates.length; i++) {
                                          
                                          if (date.isSame(dbdates[i])){
                                                
                                                cell.css("background-color", "green");
                                                }

                                          }
                                            
                        },


                        
                  }); 
             
                                               
            });            
           






