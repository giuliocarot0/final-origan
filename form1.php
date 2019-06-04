<?php

include "db_config.php";
$con = OpenCon();

$BrodQuery = "SELECT DISTINCT Broadcaster
                FROM TV_CHANNEL";                
$result1=mysqli_query($con, $BrodQuery);

?>

<html>
    <head>
        <title> Search for a VIP</title>
    </head>

    <body>
        <form name = "Search VIP" action = "search1.php" method=GET>
        Insert Initials: <input type="text" name="Initials" size="30" value= "" /><br><br>

        Broadcaster: 
        <select name = "Broadcaster">
            <?php
                while($row = mysqli_fetch_row($result1))
                    echo "<option value = '$row[0]'> $row[0]</option>";
            ?>
        </select> 
        <br><br>
        <input type ="submit" value = "Search"> 
        </form>
        
    </body>

</html>