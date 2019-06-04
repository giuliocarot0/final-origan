<?php

    include "db_config.php";

    if(!isset($_POST) || $_POST["SSN"]=="" || $_POST["Name"]=="" || $_POST["Surname"]==""){
        echo "Bad Request";
        http_response_code(400);
    }

    $conn = OpenCon();

    $ssn = $_POST["SSN"];
    $name = $_POST["Name"];
    $surn = $_POST["Surname"];
    $emp = $_POST["Employment"];

    if($emp == "")
        $query = "INSERT INTO VIP (SSN, Name, Surname )VALUES ('$ssn','$name','$surn')";
    else 
        $query = "INSERT INTO VIP VALUES ('$ssn','$name','$surn', '$emp')";


    if(!mysqli_query($conn, $query)) 
        echo (mysqli_error($conn));

    else echo "successfully added";
?>