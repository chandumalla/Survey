<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        echo '<script language="javascript">alert("Login first...");</script>';
        header("Location: http://localhost/Survey/");
    }
    session_destroy();
?>

<html>
	<head>
		<title>Thank you</title>
	</head>
	<body>
		<center><h3>Thank YOU</h3>
	</body>
</html>