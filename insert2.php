<?php

    include "db_config.php";

    if(!isset($_GET) || $_GET["SSN"]=="" || $_GET["Name"]=="" || $_GET["Surname"]==""){
        echo "Bad Request";
        http_response_code(400);
    }

    $conn = OpenCon();

    $ssn = $_GET["SSN"];
    $name = $_GET["Name"];
    $surn = $_GET["Surname"];
    $emp = $_GET["Employment"];

    if($emp == "")
        $query = "INSERT INTO VIP (SSN, Name, Surname )VALUES ('$ssn','$name','$surn')";
    else 
        $query = "INSERT INTO VIP VALUES ('$ssn','$name','$surn', '$emp')";


    if(!mysqli_query($conn, $query)) 
        echo (mysqli_error($conn));

    else echo "successfully added";
?>
