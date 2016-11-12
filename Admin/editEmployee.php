
<html>
    <head>

        <title>Edit Employee</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="../css/style.css">


    </head>

    <body> 
        <?php
        $connection = set_database();
        //$first_name = $last_name = $idNumber = $telHome = $telMobile = $position = $address = $userId = $email = $temporyPassword = $accessType = $adminPassword='';
        $array = getArray();
        //var_dump($array);
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


            <p style="text-align:left; color:white; font-size: 40px;  vertical-align: auto; padding-left: 10px; margin:0;"> Update employee Detail </p>

            <p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">form</p>

        </div>
        <div class="container " style="padding: 10px;">
            <div class="row">
                <div class="col m10 offset-m1 s12">
                    <br><br>
                    <div class="row">

                        <form action="EditEmployee.php" method="post">
                            <div class="row"> 
                                <div class="input-field nom col m6 s12">
                                    <input type="text" name="employee_id" value="">
                                    <label for="employee_id">Employee ID</label>
                                </div>


                            </div>

                            <div class="row">


                                <div class="col m5">
                                    <p class="right-align"><button id="search-employee-profile" class="btn btn-large waves-effect waves-light midddle" style="background-color:#ffab40" type="submit" value="submit" name="search">Search Employee Profile</button></p>

                                </div>
                            </div> 
                        </form>

                        <form action="editEmployee.php" method="post">
                            <div class="row">
                                <div class="input-field nom col m6 s12">

                                    <input  value="<?php
                                    echo $first_name;
                                    ?>"id="first_name" name="first_name" type="text" class="validate">
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field nom col m6 s12">
                                    <input  value="<?php
                                    echo $last_name;
                                    ?>" id="last_name" name="last_name" type="text" class="validate">
                                    <label for="last_name">Last Name</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field nom col m12 s12">
                                    <input value="<?php
                                    echo $idNumber;
                                    ?>" id="id-number" name="id_number" type="text" class="validate">
                                    <label for="id-number">ID Number</label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="input-field nom col m6 s12">
                                    <input  value="<?php
                                    echo $telHome;
                                    ?>" id="Tel-home" name="Tel_number" type="text" class="validate">
                                    <label for="Tel-home">Tel-home</label>
                                </div>

                                <div class="input-field nom col m6 s12">
                                    <input  value="<?php
                                    echo $telMobile;
                                    ?>" id="Tel-mobile" name="Tel_mobile" type="text" class="validate">
                                    <label for="Tel-mobile">Tel-mobile</label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="input-field nom col m6 s12">
                                    <input  value="<?php
                                    echo $address;
                                    ?>" id="address" name="address" type="text" class="validate">
                                    <label for="address">Address</label>
                                </div>
                                <div class="input-field nom col m6 s12">
                                    <input  value="<?php
                                    echo $email;
                                    ?>" id="email" name="email" type="email" class="validate">
                                    <label for="email">Email</label>

                                </div>
                            </div >


                            <div class="row">
                                <div class="input-field nom col m4 s12">
                                    <input  value="<?php
                                    echo $position;
                                    ?>" id="position" name="position" type="text" class="validate">
                                    <label for="position">position</label>

                                </div>

                                <div class="input-field nom col m4 s12">
                                    <input  value="<?php
                                    echo $userId;
                                    ?>" id="user-id" name="user_id" type="text" class="validate">
                                    <label for="user-id">User Id</label>

                                </div>

                                <div class="input-field nom col m4 s12">
                                    <input  value="<?php
                                    echo $temporyPassword;
                                    ?>" id="temporary-password" name="temporary_password" type="text" class="validate">
                                    <label for="temporary-password">Temporary password</label>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col m5">
                                    <p class="right-align"><button id="upate-employee-profile" class="btn btn-large waves-effect waves-light midddle" style="background-color:#ffab40" type="submit" value="submit" name="update">Update Employee Profile</button></p>
                                    <!--<p class="right-align"><button id="update-employee-profile" class="btn btn-large waves-effect waves-light midddle" style="background-color:#ffab40" type="submit" value="submit" name="update">Update Employee Profile</button></p>-->

                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>

            <!-- home button -->
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red" href="homeAdmin.php">
                    <i class="extar-large material-icons">home</i>
                </a>

            </div>
            <!-- home button -->
        </div>

        <!-- jQuery is required by Materialize to function -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/custom.js"></script>

        <script type="text/javascript">
            //custom JS code

        </script>
    </body>
</html>

<?php

function get_this($req_column1, $req_column2, $req_column3, $req_column4, $req_column5, $req_column6, $req_column7, $req_column8, $req_column9, $req_column10, $req_column11, $condition_col, $condition, $dbresult) {
    $array = NULL;

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
        $idNumber = $_POST['employee_id'];
        $array = get_this('first_name', 'last_name', 'idNumber', 'telHome', 'telMobile', 'position', 'address', 'userId', 'email', 'Password', 'accessType', 'userId', $idNumber, $dbresult);

        return $array;
    }
}

//==========Update employee detail

global $connection;
if (isset($_POST['update'])) {
//        
//        if (empty($_POST["first_name"])) {
//        echo "<script type='text/javascript'>alert('First name is required!')</script>";
//    } else {
//        $first_name = test_input($_POST["first_name"]);
//        // check if name only contains letters and whitespace
//        if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
//            echo "<script type='text/javascript'>alert('first name can contain only name and white space!')</script>";
//        }
//    }
//
//    if (empty($_POST["last_name"])) {
//        echo "<script type='text/javascript'>alert('Last name is required!')</script>";
//    } else {
//        $last_name = test_input($_POST["last_name"]);
//        // check if name only contains letters and whitespace
//        if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
//            echo "<script type='text/javascript'>alert('Last name can contain only name and white space!')</script>";
//        }
//    }
//
//
//    if (empty($_POST["id_number"])) {
//        echo "<script type='text/javascript'>alert('ID number is required!')</script>";
//    } else {
//        $idNumber = test_input($_POST["id_number"]);
//        // check if name only contains letters and whitespace
//        if (!preg_match("/^[0-9 ]*$/", $idNumber)) {
//            echo "<script type='text/javascript'>alert('ID contains only numbers!')</script>";
//        }
//    }
//
//
//    if (empty($_POST["tel_home"])) {
//        echo "<script type='text/javascript'>alert('Tel-Home is required!')</script>";
//    } else {
//        $telHome = test_input($_POST["tel_home"]);
//        // check if name only contains letters and whitespace
//        if (!preg_match("/^[0-9 ]*$/", $telHome)) {
//            echo "<script type='text/javascript'>alert('tel-home contains only numbers!')</script>";
//        }
//    }
//
//    if (empty($_POST["tel_mobile"])) {
//        echo "<script type='text/javascript'>alert('Tel-mobile is required!')</script>";
//    } else {
//        $telMobile = test_input($_POST["tel_mobile"]);
//        // check if name only contains letters and whitespace
//        if (!preg_match("/^[0-9 ]*$/", $telMobile)) {
//            echo "<script type='text/javascript'>alert('tel-mobile contains only numbers!')</script>";
//        }
//    }
//
//    if (empty($_POST["address"])) {
//        echo "<script type='text/javascript'>alert('Address is required!')</script>";
//    } else {
//        $address = test_input($_POST["address"]);
//    }
//
//    if (empty($_POST["position"])) {
//        echo "<script type='text/javascript'>alert('Position is required!')</script>";
//    } else {
//        $position = test_input($_POST["position"]);
//        // check if name only contains letters and whitespace
//        if (!preg_match("/^[a-zA-Z ]*$/", $position)) {
//            echo "<script type='text/javascript'>alert('Invalid position!')</script>";
//        }
//    }
//
//    if (empty($_POST["email"])) {
//        echo "<script type='text/javascript'>alert('E-mail is required!')</script>";
//    } else {
//        $email = test_input($_POST["email"]);
//        // check if e-mail address is well-formed
//        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            echo "<script type='text/javascript'>alert('Invalid email!')</script>";
//        }
//    }
//
//    if (empty($_POST["user_id"])) {
//        echo "<script type='text/javascript'>alert('user_id is required!')</script>";
//    } else {
//        $userId = test_input($_POST["user_id"]);
//        // check if name only contains letters and whitespace
//        if (!preg_match("/^[0-9 ]*$/", $userId)) {
//            echo "<script type='text/javascript'>alert('Invalid User Id!')</script>";
//        }
//    }
//
//    if (empty($_POST["tempory_password"])) {
//        echo "<script type='text/javascript'>alert('Tempory Password is required!')</script>";
//    } else {
//        $temporyPassword = test_input($_POST["tempory_password"]);
//    }
//
//    if (empty($_POST["admin_password"])) {
//        echo "<script type='text/javascript'>alert('Admin Password is required!')</script>";
//    } else {
//        $adminPassword = test_input($_POST["admin_password"]);
//    }
//
//    if (empty($accessType = $_POST['access_type'])) {
//        echo "<script type='text/javascript'>alert('Acess type is required!')</script>";
//    } else {
//        $accessType = $_POST['access_type'];
//        print $accessType . "11111";
//    }


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $idNumber = $_POST['id_number'];
    $telHome = $_POST['Tel_number'];
    $telMobile = $_POST['Tel_mobile'];
    $position = $_POST['position'];
    $address = $_POST['address'];
    $userId = $_POST['user_id'];
    $email = $_POST['email'];
    $temporyPassword = $_POST['temporary_password'];



    $updateEmployee = mysqli_query($connection, "UPDATE employeedetail SET first_name='$first_name',last_name='$last_name',telHome='$telHome',telMobile='$telMobile',address='$address',email='$email',position='$position',userId='$userId',Password='$temporyPassword' WHERE userId='140' ");
}


//updateEmployee();
?>























<?php
//    $name = 'dushan';
//    $values = "'dushane','$last_name','$idNumber','$telHome','$telMobile','$position','$address','$userId','$email',$temporyPassword,'$accessType'";
////    $values = "'$name','$last_name','4545','545','54','454','5454','5454','545','656565','Admin'";
//    $dbhost = "localhost";  //server
//    $dbuser = "root"; //databae user name
//    $dbpass = "";   //databae user password
//    $dbname = "dbclockinn";     //databae name
//    // Create connection
////    $db_handle = mysql_connect($dbhost, $dbuser, $dbpass);
////    $db_found = mysql_select_db($dbname, $db_handle);
//    $connect = set_database();
//    $sql = "UPDATE 'employeedetail' SET 'first_name'='$first_name','last_name'='$last_name','telHome'='$telHome','telMobile'='$telMobile','address'='$address','email'='$email','position'='$position','userId'='$userId','Password'='$temporyPassword','accessType'='$accessType' WHERE 'idNumber'='$idNumber'";
//        $result = mysql_query($sql);
//    
//    if ($db_found) {
//        $sql = "UPDATE `employeedetail` SET `firstName`=[$first_name],`lastName`=[$last_name],`telHome`=[$telHome],`telMobile`=[$telMobile],`address`=[$address],`email`=[$email],`position`=[$position],`userId`=[$userId],`password`=[$temporyPassword],`accessType`=[$accessType] WHERE 'idNumber'=$idNumber";
//        $result = mysql_query($sql);
//        if ($result) {
//            mysql_close($db_handle);
//            print "Records added to the database";
//        } else {
//            print 'sql_query Error';
//        }
//    } else {
//        print "Database NOT Found ";
//        mysql_close($db_handle);
//    }
//    $result = database_insert($connect, 'employeedetail', "first_name,last_name,idNumber,telHome,telMobile,position,address,userId,email,Password,accessType", $values);
//    $sql = "INSERT INTO employeedetail (first_name,last_name,idNumber,telHome,telMobile,position,address,userId,email,Password,accessType) VALUES (" . $values . ")";
//    $result = mysql_query($sql);
?>
