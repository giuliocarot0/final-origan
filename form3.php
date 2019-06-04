<?php

    include "db_config.php";

    $con = OpenCon();

    $NameQuery = "SELECT Name, Surname, Ssn
                    FROM VIP";
    $ChanQuery = "SELECT Name, CodC
                    FROM TV_CHANNEL";                

    $result1=mysqli_query($con, $NameQuery);
    $result2=mysqli_query($con, $ChanQuery);

?>

<html>
    <head>
    </head>

    <body>
        <form name = "New Appearance" action = "insert3.php" method=GET>
                <select name = "SSN">
                    <?php
                    while($row = mysqli_fetch_row($result1))
                        echo "<option value='$row[2]'>$row[0]"." "."$row[1]</option>";                    
                    ?>    
                </select> 

                <select name = "CodC">
                    <?php
                    while($row1 = mysqli_fetch_row($result2))
                        echo "<option value='$row1[1]'>$row1[0]</option>";
                     ?>
                </select> 


                <input type="date" name="Date" size="30" value= "" >
                <input type="time" name="StartTime" size="30" value= "" >
                <input type="time" name="EndTime" size="30" value= "" >

                <input type="submit" value ="add">;
        </form>
    </body>                   
</html>