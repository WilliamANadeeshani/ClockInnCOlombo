<?php
// Connecting to Database using Mysql
$dbc = mysql_connect('localhost','clockinnuser','1234');

if(!$dbc){
    echo ".....not connected to amindaaaa....";
    die();
}
else{
   // echo "....connected to amindaaa...";
}

 $db_select = mysql_select_db("dbclockinn", $dbc);
if(!$db_select){
    echo ".....not connected to clockinn....";
    die();
}
else{
    //echo "....connected to clockinnnnn...";
}

//$query = "UPDATE password SET firstName = 'Amindaaa' WHERE workID = '2'";
//$result = mysql_query($query);

//http://localhost/ClockInndemo%20-%20Copy/public_html/loginConfirm.php