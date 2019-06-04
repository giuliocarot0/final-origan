<?php 

include "db_config.php";

    if(!isset($_POST) || $_POST["SSN"]=="" || $_POST["CodC"]=="" || $_POST["Date"]=="" || $_POST["StartTime"]=="" || $_POS["EndTime"]){
        echo "Bad Request";
        http_response_code(400);
    }

    $conn = OpenCon();

    $ssn = $_POST["SSN"];
    $start = $_POST["StartTime"];
    $end = $_POST["EndTime"];
    $cod = $_POST["CodC"];
    $date = $_POST["Date"];

    $check_q = "SELECT COUNT(*) AS Cnt
                FROM APPEARANCE
                WHERE SSN $ssn AND $start < EndTime AND $end >StartTime";

    $res = mysqli_query($conn, $check_q);
    $r1 = mysqli_fetch_object($res);
    if($r1->Cnt > 0){   
        echo "cannot insert";
        die();    
    }

    $ins = "INSERT INTO APPEARANCE VALUES('$ssn','$cod','$date','$start','$end')";





?>