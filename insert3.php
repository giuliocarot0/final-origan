<?php 

include "db_config.php";
    if(!isset($_GET) || $_GET['SSN']=="" || $_GET['CodC']=="" || $_GET['Date']=="" || $_GET['StartTime']=="" || $_GET['EndTime'] ==""){
        echo "Bad Request";
        http_response_code(400);
    }

    $conn = OpenCon();

    $ssn = $_GET["SSN"];
    $start = $_GET["StartTime"];
    $end = $_GET["EndTime"];
    $cod = $_GET["CodC"];
    $date = $_GET["Date"];

	
    $check_q = "SELECT COUNT(*)
                FROM appearance
                WHERE SSN = '$ssn' AND '$start' < EndTime AND '$end' > StartTime";

    $res = mysqli_query($conn, $check_q);
	
	if(!$res)
		die("Error: ".mysqli_error($conn));
	
	if(intval(mysqli_fetch_row($res)) > 0)
		die("Timing overlapping");

    $ins = "INSERT INTO APPEARANCE VALUES('$ssn','$date','$start','$end','$cod')";
	 if(!mysqli_query($conn, $ins)) 
        echo (mysqli_error($conn));

    else echo "successfully added";

?>
