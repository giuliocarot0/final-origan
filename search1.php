<?php

include "db_config.php";

if(!isset($_GET) || $_GET["Initials"]=="" || $_GET["Broadcaster"]==""){
        echo "Bad Request";
        http_response_code(400);
    }
$conn = OpenCon();

$sur = $_GET["Initials"];
$bro = $_GET["Broadcaster"];


$query = "SELECT A.CodC, V.Surname, V.Name, A.Date, A.StartTime
          FROM VIP AS V, APPEARANCE AS A, TV_CHANNEL AS T
          WHERE V.SSN = A.SSN AND Surname LIKE '$sur%' AND Broadcaster = '$bro' AND A.CodC = T.CodC";

$res = mysqli_query($conn, $query);         


if(mysqli_num_rows($res) > 0){
    echo "DA FAQ <br>";
    while($row = $res->fetch_row()){
        foreach($row as $e)
            echo $e ;
            echo "<br>";
    }
    
}


?>