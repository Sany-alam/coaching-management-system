$(function(){
    // alert("hello world");
    $("#name_alert").hide();
    $("#email_alert").hide();
    $("#password_alert").hide();
    $("#rpassword_alert").hide();
    $("#phone_alert").hide();
  
    // varriables for return true or false from success function
    var valid_email = false;
  
  //Name
    $("#name").focusout(function(){
      name();
    });
  
    function name()
    {
      if($("#name").val().length == 0)
      {
        $("#name_alert").html("Name is required!");
        $("#name_alert").show();
        return true;
      }
      else
      {
        $("#name_alert").hide();
        return false;
      }
    }
  
  
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
          var email = $("#email").val();
          var formdata = new FormData();
          formdata.append("email",email);
          formdata.append("email_check",'email_check');
          $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            type:"post",
            url:"data.php",
            success:function(data)
            {
              var msg = $.trim(data);
              if (msg == "found email")
              {
                valid_email = true;
                $("#email_alert").html("Email already exiest, <a href='login.php'>login</a> or try with new email!");
                $("#email_alert").show();
              }
              else
              {
                $("#email_alert").hide();
                valid_email = false;
              }
            }
          });
          return valid_email;
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
       if( $("#password").val().length<8)
       {
         $("#password_alert").html("Minimum 8 character and password should contain One Uppercase, One lowercase,one number, one special character");
         $("#password_alert").show();
         return true;
       }
       else
       {
         var password_reg_ex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])");
         if(!password_reg_ex.test($("#password").val()))
         {
           $("#password_alert").html("Minimum 8 character and password should contain One Uppercase, One lowercase,one number, one special character");
           $("#password_alert").show();
           return true;
         }
         else
         {
           $("#password_alert").hide();
           return false;
         }
       }
     }
   }
  
  
  
  // Retype password
  $("#rpassword").focusout(function(){
    rpass();
  });
  function rpass()
  {
    if ($("#rpassword").val().length !== 0)
    {
      if ($("#rpassword").val() == $("#password").val())
      {
        $("#rpassword_alert").hide();
        return false;
      }
      else
      {
        $("#rpassword_alert").html("Password not matched");
        $("#rpassword_alert").show();
        return true;
      }
    }
    else
    {
      $("#rpassword_alert").html("Confirm password requierd");
      $("#rpassword_alert").show();
      return true;
    }
  }
  
  
  //click the button
    $("#reg").click(function(){
      if(name() == false && email() == false && pass() == false  && rpass() == false)
      {
        // alert($("#name").val()+$("#email").val()+$("#password").val()+$("#rpassword").val());
        var formdata = new FormData();
        formdata.append('name',$('#name').val());
        formdata.append('email',$('#email').val());
        formdata.append('password',$('#password').val());
        formdata.append('registration',"registration");
        $.ajax({
          processData:false,
          contentType:false,
          data:formdata,
          type:"post",
          url:"data.php",
          success:function(data)
          {
              var reg = $.trim(data);
              if (reg == 'done') {
                window.location.href="login.php";
              }
              else{
                alert(data);
              }
          }
  
        });
      }
      else
      {
  
        if (name() == true)
        {
          $("#name_alert").show();
        }
  
        if (email() == true)
        {
          $("#email_alert").show();
        }
  
        if (pass() == true)
        {
          $("#password_alert").show();
        }
  
  
        if (rpass() == true)
        {
          $("#rpassword_alert").show();
        }
  
      }
  
    });
  });
  