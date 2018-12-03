<?php
session_start();
$servername = "localhost:3306";
$username = "root";
$password = "";
$db = "SYSTEM";

// Create connection
$conn = new mysqli($servername, $username, $password, $db) OR die("Connection failed: " . $conn->connect_error);

$ans = json_decode(stripslashes($_POST['ans']));


$sql = "INSERT INTO MyGuests (q1, q2, q3, q4, q5, q6, q7, q8, q9, q10) VALUES ('".$ans[0]."', '".$ans[1]."', '".$ans[2]."', '".$ans[3]."', '".$ans[4]."', '".$ans[5]."', '".$ans[6]."', '".$ans[7]."', '".$ans[8]."', '".$ans[9]."');"  

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
