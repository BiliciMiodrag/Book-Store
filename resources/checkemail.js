$("#email").blur(function() {

      var email     =     $('#email').val();

      // if email field is null then return
      if(email == "") {
        return;
      }


      // send ajax request if email is not empty
      $.ajax({
          url: 'registration-funtctions.php',
          type: 'post',
          data: {
            'email':email,
            'email_check':1,
        },

        success:function(response) {  

          // clear span before error message
          $("#email_error").remove();

          // adding span after email textbox with error message
          $("#email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
        },

        error:function(e) {
          $("#result").html("Something went wrong");
        }

      });
    });

$("#email").keyup(function() {
    $("#error").remove();
    $("span").remove();
  });