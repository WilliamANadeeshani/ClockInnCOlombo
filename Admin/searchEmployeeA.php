
<html>
    <head>

        <title>Search Employee</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="../css/style.css">


    </head>

    <body> 
        <?php
        $connection = set_database();
//        $first_name = $last_name = $idNumber = $telHome = $telMobile = $position = $address = $userId = $email = $temporyPassword = $accessType = $adminPassword='';
        $array = getArray();

        $first_name = $array[0];
        $last_name = $array[1];
        $idNumber = $array[2];
        $telHome = $array[3];
        $telMobile = $array[4];
        $position = $array[5];
        $address = $array[6];
        $userId = $array[7];
        $email = $array[8];
        $temporyPassword = $array[9];
        $accessType = $array[10];

        ?>


        <div class="top-employeeform " style="background-color:#ffab40  ; light-orange">


            <p style="text-align:left; color:white; font-size: 40px;  vertical-align: auto; padding-left: 10px; margin:0;"> Search employee </p>

            <p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">form</p>

        </div>
        <div class="container " style="padding: 10px;">
            <div class="row">
                <div class="col m10 offset-m1 s12">
                    <br><br>
                    <div class="row">

                        <form action="searchEmployeeA.php" method="post">
                            <div class="row"> 
                                <div class="input-field nom col m6 s12">
                                    <input type="text" name="employee_id" value="">
                                    <label for="employee_id">Employee ID</label>
                                </div>


                            </div>


                                <div class="col m5">
                                    <p class="right-align"><button id="search-employee-profile" class="btn btn-large waves-effect waves-light midddle" style="background-color:#ffab40" type="submit" value="submit" name="search">Search Employee Profile</button></p>

                                </div>
                            </div> 
                        </form>


                        <div class="row">
                            <div class="input-field nom col m6 s12">
                               
                                <input disabled value="<?php
                                        echo $first_name;
                                        ?>"id="first_name" type="text" class="validate">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field nom col m6 s12">
                                <input disabled value="<?php
                                        echo $last_name;
                                        ?>" id="last_name" type="text" class="validate">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field nom col m12 s12">
                                <input disabled value="<?php
                                        echo $idNumber;
                                        ?>" id="id-number" type="text" class="validate">
                                <label for="id-number">ID Number</label>
                            </div>

                        </div>

                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <input disabled value="<?php
                                        echo $telHome;
                                        ?>" id="Tel-home" type="text" class="validate">
                                <label for="Tel-home">Tel-home</label>
                            </div>

                            <div class="input-field nom col m6 s12">
                                <input disabled value="<?php
                                        echo $telMobile;
                                        ?>" id="Tel-mobile" type="text" class="validate">
                                <label for="Tel-mobile">Tel-mobile</label>
                            </div>

                        </div>

                        <div class="row">
                            <div class="input-field nom col m6 s12">
                                <input disabled value="<?php
                                        echo $address;
                                        ?>" id="address" type="text" class="validate">
                                <label for="address">Address</label>
                            </div>
                            <div class="input-field nom col m6 s12">
                                <input disabled value="<?php
                                        echo $email;
                                        ?>" id="email" type="email" class="validate">
                                <label for="email">Email</label>

                            </div>
                        </div >


                        <div class="row">
                            <div class="input-field nom col m4 s12">
                                <input disabled value="<?php
                                        echo $position;
                                        ?>" id="position" type="text" class="validate">
                                <label for="position">position</label>

                            </div>

                            <div class="input-field nom col m4 s12">
                                <input disabled value="<?php
                                        echo $userId;
                                        ?>" id="user-id" type="text" class="validate">
                                <label for="user-id">User Id</label>

                            </div>

                            <div class="input-field nom col m4 s12">
                                <input disabled value="<?php
                                        echo $temporyPassword;
                                        ?>" id="temporary-password" type="text" class="validate">
                                <label for="temporary-password">Temporary password</label>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery is required by Materialize to function -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/custom.js"></script>

        <script type="text/javascript">
            //custom JS code

        </script>
        <?php

//$dbhost = "localhost";  //server
//$dbuser = "root"; //databae user name
//$dbpass = "";   //databae user password
//$dbname = "dbclockinn";     //databae name

        ?> 
    </body>
        <!-- home button -->
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red" href="homeAdmin.php">
            <i class="extar-large material-icons">home</i>
        </a>

    </div>
    <!-- home button -->
</html>

<?php

function get_this($req_column1, $req_column2, $req_column3, $req_column4, $req_column5, $req_column6, $req_column7, $req_column8, $req_column9, $req_column10, $req_column11, $condition_col, $condition, $dbresult) {
    $array=null;
    while ($row = mysqli_fetch_assoc($dbresult)) {

        if ($row[$condition_col] == $condition) {
            $array = [$row[$req_column1], $row[$req_column2], $row[$req_column3], $row[$req_column4], $row[$req_column5], $row[$req_column6], $row[$req_column7], $row[$req_column8], $row[$req_column9], $row[$req_column10], $row[$req_column11]];
        }
    }
    return $array;
}

function set_database() {
    $dbhost = "localhost";  //server
    $dbuser = "clockinnuser"; //databae user name
    $dbpass = "1234";   //databae user password
    $dbname = "dbclockinn";     //databae name
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    return $connection;
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

function getArray() {
    global $connection;
    if (isset($_POST['search'])) {
        $dbresult = database_read($connection, 'employeedetail');
        $id = $_POST['employee_id'];
        $array = get_this('first_name', 'last_name', 'idNumber', 'telHome', 'telMobile', 'position', 'address', 'userId', 'email', 'Password', 'accessType', 'userId', $id, $dbresult);
        return $array;
    }
}


?>
