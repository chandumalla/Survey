<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: http://localhost/Survey/MainPage.php");
}
?>

<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="style.css"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <meta charset="ISO-8859-1">
     <title>Insert title here</title>
</head>
<body>
    <h1 class="text-center">Chris</h1>
   <br />
   <div class="container" id="boundary">
       <div class="col-md-3">
       </div>
       <div class="col-md-6 mx-auto">
            <div class="card card-signin my-5">
          <div class="card-body">

            <form class="form-signin">
              <br />
              <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" placeholder="User Name" required autofocus>
              </div>

              <br />

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              </div>

              <br /><br />
              <button class="btn btn-lg btn-block" id="btn-red" type="submit">Log In</button>
            </form>
          </div>
       </div>
    </div>
       </div>
 
</body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();
                var formData = {
                    'user' : $('#inputUsername').val(),
                    'pass' : $('#inputPassword').val(),
                };
                
                $.ajax({
                    type: "GET",
                    url: "check_user.php",
                    data: formData,
                    success: function(data) {
                        if(data == "1") {
                            window.location = 'http://localhost/Survey/MainPage.php';

                        }
                        else{
                            alert("Incorrect credentials!!!");
                            $('#inputUsername').val('');
                            $('#inputPassword').val('');
                        }
                    },
                    error: function(data) {
                        alert("Error : "+data);
                        $('#inputUsername').val('');
                        $('#inputPassword').val('');
                        
                    },
                });
            });
        });
    </script>
</html>