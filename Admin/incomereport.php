<?php
error_reporting(0);
$connection = set_database();
?>


<doctype html>
    
<html>
<head>

<title></title>
<meta name = "viewport" content = "width=device-width, initial-scale=1"/>
<link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
<link type = "text/css" rel = "stylesheet" href = "../css/materialize.min.css" media = "screen,projection"/>
<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
<link type = "text/css" rel = "stylesheet" href = "../css/style.css">


</head>

<body>

<div class="top-customerform z-depth-1" style="background-color: #448aff">


    <p style="text-align:left; color:white; font-size: 40px;   vertical-align: auto; padding-left: 10px; margin:0;">Income Report </p>

    <p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">form</p>

</div>
<div class="container">
    <br><br>
    <div class="col m10">
        <ul class=" container col m10 s4" data-collapsible="accordion" style="width: 60em;">
  
                <div class="" >
                    <p></p>
                    <form action="incomereport.php" method="post" name="incomeReport" >
                        <div class="container" style="margin-bottom: 50px">

                            <div class="row">
                                
                                <div class="col m4 " style="padding: 0;margin: 0">
                                    <p class="right-align"><button id="getdata" style="background-color: #448aff" class="btn btn-large waves-effect waves-light cuz midddle" type="submit" name="getReport"  >Get Report</button></p>
                                </div>
                            </div>
                            <div class="row" style="color: #448aff ;font-size:22px">
                                <div class="col m6" style="vertical-align: central">
                                    <?php ?>
                                </div>


                            </div>

                            <div class="row z-depth-1" style="padding: 20px" >

                                <?php
                                $total = 0;              
                                    $report = getReport();
                                    if (isset($report)) {                                      
                                        $tableout = "<table class='highlight '><thead>
                                                <tr>
                                                    <th data-field='item'>Date</th>
                                                    <th data-field='date' >Desciption</th>
                                                    <th data-field='item' >Price</th>                                                   
                                                </tr>
                                            </thead>";
                                        foreach ($report as $key => $subarray) {
                                            $tableout.="<tr>";
                                            $total+=(int) $subarray[2];
                                            foreach ($subarray as $subkey => $element) {
                                               
                                                    $tableout.="<td >$element</td>";                                                
                                            }
                                            $tableout.="</tr>";
                                        }
                                        echo $tableout;                                      
                                        echo '<tr style="color: #448aff; font-size:22px;border-top:1px solid gray"><td></td><td>Total income</td>';
                                        echo "<td class=''>{$total}</td></tr>";
                                        echo "</table>";
                                    }
                                
                                ?>


                            </div>



                        </div>
                    </form>
                </div>

            </li> 

        </ul>
    </div>

    <div class="row container col m2">

    </div>
    <!-- home button -->
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red" href="homeManager.php">
            <i class="extar-large material-icons">home</i>
        </a>

    </div>
    <!-- home button -->
</div>


<?php
function set_database() {
    $dbhost = "localhost";  //server
    $dbuser = "clockinnuser"; //databae user name
    $dbpass = "1234";   //databae user password
    $dbname = "dbclockinn";     //databae name
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //testing errors
    if (mysqli_connect_errno()) {
        die("Database connection failed:" . mysqi_connect_error() . "(" . mysqli_connect_errno() . ")");
    } else {
        return $connection;
    }
}

function database_read($connection, $table, $where = '', $order = '') {
    $query = "SELECT * FROM ";
    $query .=$table;
    $query .=$where;
    $query .=$order;
    $dbresult = mysqli_query($connection, $query);

    if (!$dbresult) {
        die("Database query failed");
    } else {

        return $dbresult;   //this is the result for required fields
    }
}


function getReport() {
    global $connection;
  
        if (isset($_POST['getReport'])) {
            $dbresult = database_read($connection, "incomerecord");
            $billarray = get_these_three("date", "description", "value", $dbresult);
            
            return $billarray;
        }
    
    

}

function get_these_three($req_column1,$req_column2,$req_column3,$reqcolm1,$reqcolmn2,$cond1,$cond2,$dbresult) {
    $array=[0];
    while ($row = mysqli_fetch_assoc($dbresult)) {
     

            $array[]= [$row[$req_column1],$row[$req_column2],$row[$req_column3]];

    }
    return $array;
}


?>



<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>

<script type="text/javascript">
  //custom JS code

</script>

</body>
</html>



