$(function(){
    $("#email_alert").hide();
    $("#password_alert").hide();
    $("#login_alert").hide();

    });

      //Email
      $("#email").focusout(function(){
        email();
      });
    
      function email()
      {
        if ($("#email").val().length == 0) {
          $("#email_alert").html("Email is requierd");
          $("#email_alert").show();
          return true;
        }
        else
        {
          var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
          if(!pattern.test($("#email").val()))
          {
            $("#email_alert").html("invalid email type");
            $("#email_alert").show();
            return true;
          }
          else
          {
            $("#email_alert").hide();
            return false;
          }
        }
      }


//password
$("#password").focusout(function(){
    pass();
  });
  function pass()
  {
    if($("#password").val().length == 0)
      {
        $("#password_alert").html("password is required");
        $("#password_alert").show();
        return true;
      }
     else
     {
        $("#password_alert").hide();
        return false;
     }
   }



    //click the button
    $("#signin").click(function(){
        if(email() == false && pass() == false)
        {
          var formdata = new FormData();
          formdata.append('email',$('#email').val());
          formdata.append('password',$('#password').val());
          formdata.append('Signin',"Signin");
          $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            type:"post",
            url:"data.php",
            success:function(data)
            {
               var msg = $.trim(data);
               if (msg == "Credential matched") {
                $("#login_alert").slideUp();
                window.location.href="index.php"
               }
               else{
                $("#login_alert").html("Credentials doesn't matched!");
                $("#login_alert").slideDown();
               }
            }
          });
        }
        else
        {
          if (email() == true)
          {
            $("#email_alert").show();
          }
    
          if (pass() == true)
          {
            $("#password_alert").show();
          }
    
        }
    
      });