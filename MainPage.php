<?php
    session_start();
    if(!isset($_SESSION['user'])){
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
     <p class="text-center" id="questions"></p>
     <br /><br /><br />
<!--
     <div class="col-md-3"></div>  
     <div class="col-md-6"> -->
        <table class="table" width="500px">
          <tbody>  
              <tr>
                  
                  <td><input type="button" class="btn btn-success" id="Achutha" value="Achutha" /></td>
                  <td><input type="button" class="btn btn-success" id="Sudhakara" value="Sudhakara" /></td>
                  <td><input type="button" class="btn btn-success" id="Shivam" value="Shivam" /></td>
                  <td><input type="button" class="btn btn-success" id="Partha" value="Partha" /></td>
                  <td><input type="button" class="btn btn-success" id="Sailaja A" value="Sailaja A" /></td>
                  <td><input type="button" class="btn btn-success" id="Sailaja B" value="Sailaja B" /></td>
                  <td><input type="button" class="btn btn-success" id="Shweta" value="Shweta" /></td>
              </tr>
              <tr>
                  <td><input type="button" class="btn btn-success" id="Satish" value="Satish" /></td>
                  <td><input type="button" class="btn btn-success" id="Uma" value="Uma" /></td>
                  <td><input type="button" class="btn btn-success" id="Ravi" value="Ravi" /></td>
                  <td><input type="button" class="btn btn-success" id="Thulasi" value="Thulasi" /></td>
                  <td><input type="button" class="btn btn-success" id="Prathyusha" value="Prathyusha" /></td>
                  <td><input type="button" class="btn btn-success" id="Srikanth" value="Srikanth" /></td>
                  <td><input type="button" class="btn btn-success" id="Beeran" value="Beeran" /></td>
              </tr>
              <tr>
                  <td><input type="button" class="btn btn-success" id="Iliyas" value="Iliyas" /></td>
                  <td><input type="button" class="btn btn-success" id="Anusha" value="Anusha" /></td>
                  <td><input type="button" class="btn btn-success" id="Manmeeth" value="Manmeeth" /></td>
                  <td><input type="button" class="btn btn-success" id="Manideep" value="Manideep" /></td>
                  <td><input type="button" class="btn btn-success" id="Soumya" value="Soumya" /></td>
                  <td><input type="button" class="btn btn-success" id="Karthick" value="Karthick" /></td>
                  <td><input type="button" class="btn btn-success" id="Chandu" value="Chandu" /></td>
              </tr>
          </tbody>
       </table>
       <button type="button" class="btn btn-primary" style="position:absolute; top:85%; right:13%; padding:10px 30px 10px;" id="back">back</button>
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
            $('#back').hide();
            $('#next').prop('disabled', true);
            $('#questions').text('Question1?');
            var vote = "";
            var votes=[];
            var i=-1;
            $('input[type="button"]').click(function(event) {
                vote = event.target.id;
                $('#next').prop('disabled', false);
            });

            $('#back').click(function(event) {
                i--;
                if(i==-1){
                    $('#back').hide();
                    $('#questions').text('Question1?');        
                }
                else{
                    $.ajax({
                        type: "GET",
                        url: "questions.php",
                        data: {'id': i},
                        success: function(data) {
                            $('#questions').text(data);
                        }
                    });
                }
            });

            $('#next').click(function(event) {
                event.preventDefault();
                if(votes[i+1] == null) {
                    votes.push(vote);
                }
                else {
                    votes[i+1] = vote;
                }
                i++;
                
                    $('#back').show();
                
                
                if(i==9) {
                    alert(votes);
                    $.ajax({
                        type: "POST",
                        url: "load.php",
                        data: {'ans': votes},
                        success: function(data) {
                            alert("Saved successfully.");
                        }
                    });
                    window.location = 'http://localhost/Survey/thank.php';
                }
                $.ajax({
                    type: "GET",
                    url: "questions.php",
                    data: {'id': i},
                    success: function(data) {
                        $('#questions').text(data);
                    }
                });
                
                $('#next').prop('disabled', true);
                if(i==9) {
                    $('#next').text('Submit'); 
                       
                }
            });
        });

    </script>
</html>
