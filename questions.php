<?php
    $id = $_GET['id'];
    $question = array();
    
    $question[0] = "question2";
    $question[1] = "question3";
    $question[2] = "question4";
    $question[3] = "question5";
    
    
    echo $question[$id];
?>