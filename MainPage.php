<?php
    if(isset($_SESSION['user'])){
        echo '<script language="javascript">alert("Login first...");</script>';
        header("Location: http://localhost/Survey/");
    }
?>

<html>
 <head>
     <link rel="stylesheet" href="style.css"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  
  <title>Web hello</title>
 </head>
 <body>
   <h1 class="text-center">ADP Enterprise</h1>
   <br /><br />
   <div>
     <p class="text-center" id="questions">Question1?</p>
     <br /><br /><br />
<!--
     <div class="col-md-3"></div>  
     <div class="col-md-6"> -->
        <table class="table" width="500px">
          <tbody>  
              <tr>
                  
                  <td><input type="button" class="btn btn-success" id="1" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="2" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="3" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="4" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="5" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="6" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="7" value="Success" /></td>
              </tr>
              <tr>
                  <td><input type="button" class="btn btn-success" id="8" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="9" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="10" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="11" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="12" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="13" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="14" value="Success" /></td>
              </tr>
              <tr>
                  <td><input type="button" class="btn btn-success" id="15" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="16" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="17" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="18" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="19" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="20" value="Success" /></td>
                  <td><input type="button" class="btn btn-success" id="21" value="Success" /></td>
              </tr>
          </tbody>
       </table>
       <button type="button" class="btn btn-primary" style="position:absolute; top:85%; right:3%; padding:10px 30px 10px;" id="next">next</button>
<!--     </div>
    <div class="col-md-3"></div>    -->
   </div>  
 </body>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#next').hide();
            var vote = "";
            var votes=[];
            var i=0;
            $('input[type="button"]').click(function(event) {
                vote = event.target.id;
                $('#next').show();
            });

            $('#next').click(function(event) {
                event.preventDefault();
                votes.push(vote);
                if(i==4) {
                    window.location = 'http://localhost/Survey/thanks.html';
                }
                $.ajax({
                    type: "GET",
                    url: "questions.php",
                    data: {'id': i},
                    success: function(data) {
                        $('#questions').text(data);
                    }
                });
                i++;
                $('#next').hide();
                if(i==4) {
                    $('#next').text('Submit'); 
                       
                }
            });
        });

    </script>
</html>
