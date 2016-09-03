  $(document).ready(function() {
        
        
         $(".PageContainer").css("min-height", $(window).height()); //set picture to windows height
         
         
        // Don't submit the form if there are input errors
        $('#signup1 button').on('click', function(event) {
            if (!validate()) {
                console.log("Not working");
                event.preventDefault();
            }
        });
        
        // Return whether signup form inputs look right
        function validate() {
          
          // Get the input values
          var first = $('#first input').val();
          console.log(first);
          var last = $('#last input').val();
          var gender = $('#gender input').val();
          var age = $('#age input').val();
          var email = $('#email input').val();
          var password = $('#password input').val();
          
          
          // Clear any previous error reports
          $('.form-group').removeClass('has-error');
          $('.help-block').remove();
           // Report an empty password
          if (!first) {
            $('#first').append('<span class="help-block">First name required</span>');
            $('#first').addClass('has-error');
            $('#first input').focus();
            return false;
          }
          
          // Report an empty last name
          if (!last) {
            $('#last').append('<span class="help-block">Last name required</span>');
            $('#last').addClass('has-error');
            $('#last input').focus();
            return false;
          }
          // Report an email that can't be a SLU student email
          if (!email) {
            $('#email').append('<span class="help-block">Email required</span>');
            $('#email').addClass('has-error');
            $('#email input').focus();
            return false;
          }
          
          // Report an empty password
          if (!password) {
            $('#password').append('<span class="help-block">Password required</span>');
            $('#password').addClass('has-error');
            $('#password input').focus();
            return false;
          }
          
         
          
          // Report empty gender
          if (!gender) {
            $('#gender').append('<span class="help-block">Gender required</span>');
            $('#gender').addClass('has-error');
            $('#gender input').focus();
            return false;
          }
          
          // Report an empty age
          if (!age) {
            $('#age').append('<span class="help-block">Age required</span>');
            $('#age').addClass('has-error');
            $('#age input').focus();
            return false;
          }
          
          // No errors
          return true;
        }
      });