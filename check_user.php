<?php
session_start();
$servername = "localhost:3306";
$username = "root";
$password = "";
$db = "SYSTEM";

// Create connection
$conn = new mysqli($servername, $username, $password, $db) OR die("Connection failed: " . $conn->connect_error);

$user = $_GET['user'];
$pass = (int)$_GET['pass'];

$sql = 'SELECT pass from login_user where LOGID="'.$user.'";';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['pass'] == $pass) {
        $_SESSION['user'] = $user;
        echo "1";
        
    }
    else{
        echo false;
    }
}
else {
    echo false;
}
mysqli_close($conn);


?>