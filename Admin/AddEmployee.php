<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>

	<title>Add Employee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
	<link type="text/css" rel="stylesheet" href="../css/style.css">


</head>

<body> 
    <?php
           $connect= set_database();
    ?>
    <form method="post" action="AddEmployee.php">  
	<div class="top-employeeform " style="background-color:#ffab40  ; light-orange">

		<img src="" style="float" >
		<p style="text-align:left; color:white; font-size: 40px;  vertical-align: auto; padding-left: 10px; margin:0;"> Add employee </p>

		<p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">form</p>

	</div>
	<div class="container " style="padding: 10px;">
		<div class="row">
			<div class="col m10 offset-m1 s12">
				<br><br>
				<div class="row">
					<form class="col s12">
						<div class="row"> 
							 <div class="input-field nom col m6 s12">
								<input type="text" name="first_name" value="<?php if (isset( $_POST['first_name'])){echo $_POST['first_name'];}?>">
								<label for="first_name">First Name</label>
							</div>
							<div class="input-field nom col m6 s12">
								<input type="text" name="last_name" value="<?php if (isset( $_POST['last_name'])){echo $_POST['last_name'];}?>">
								<label for="last_name">Last Name</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field nom col m12 s12">
								<input type="text" name="id_number" value="<?php if (isset( $_POST['id_number'])){echo $_POST['id_number'];}?>">
                                                                
								<label for="id_number">ID Number</label>
							</div>

						</div>

						<div class="row">
							<div class="input-field nom col m6 s12">
								<input type="text" name="tel_home" value="<?php if (isset( $_POST['tel_home'])){echo $_POST['tel_home'];}?>">
								<label for="tel_home">tel-home</label>
							</div>

							<div class="input-field nom col m6 s12">
								<input type="text" name="tel_mobile" value="<?php if (isset( $_POST['tel_mobile'])){echo $_POST['tel_mobile'];}?>">
								<label for="tel-mobile">Tel-mobile</label>
							</div>

						</div>

						<div class="row">
							<div class="input-field nom col m6 s12">
								<input type="text" name="address" value="<?php if (isset( $_POST['address'])){echo $_POST['address'];}?>">
								<label for="address">Address</label>
							</div>
							<div class="input-field nom col m6 s12">
								<input type="text" name="email" value="<?php if (isset( $_POST['email'])){echo $_POST['email'];}?>">
								<label for="email">Email</label>
								
							</div>
						</div >
						

						<div class="row">
							<div class="input-field nom col m4 s12">
                                                            <input type="text" name="position" value="<?php if (isset( $_POST['position'])){echo $_POST['position'];}?>">
								<label for="position">position</label>

							</div>

							<div class="input-field nom col m4 s12">
								<input type="text" name="user_id" value="<?php if (isset( $_POST['user_id'])){echo $_POST['user_id'];}?>">
								<label for="user_id">User Id</label>
								
							</div>

							<div class="input-field nom col m4 s12">
								<input type="text" name="tempory_password" value="<?php if (isset( $_POST['tempory_password'])){echo $_POST['tempory_password'];}?>">
								<label for="temporary_password">Temporary password</label>
								
							</div>
						</div>
                                                
						<div class="row">
							<div class="input-field col m6">
								<select name="access_type">
									<option value=""disabled selected>Choose access type</option>
									<option value="Reception">Reception</option>
									<option value="Manager">Manager</option>
									<option value="Admin">Admin</option>
                                                                        
                                                                        
								</select>
                                                            
							</div>
						</div>

						<div class="row">
                                                            <div class="input-field nom col m4 s12">
								
							</div>

							<div class="col m5">
                                                            <p class="right-align"><button id="add-employee-profile" class="btn btn-large waves-effect waves-light midddle" style="background-color:#ffab40" type="submit" name="action">Add Employee Profile</button></p>
                                                               
							</div>
						</div>
					</form>
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
    // define variables and set to empty values
       
        $first_name = $last_name = $idNumber= $telHome = $telMobile=$position =$address =$userId=$email=$temporyPassword=$accessType=$adminPassword= "";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["first_name"])) {
                echo "<script type='text/javascript'>alert('First name is required!')</script>";
            } else {
                $first_name = test_input($_POST["first_name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
                   echo "<script type='text/javascript'>alert('first name can contain only name and white space!')</script>";
                }
            }
        
            if (empty($_POST["last_name"])) {
                echo "<script type='text/javascript'>alert('Last name is required!')</script>";
            } else {
                $last_name = test_input($_POST["last_name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
                   echo "<script type='text/javascript'>alert('Last name can contain only name and white space!')</script>";
                }
            }
        

            if (empty($_POST["id_number"])) {
                echo "<script type='text/javascript'>alert('ID number is required!')</script>";
            } else {
                $idNumber = test_input($_POST["id_number"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9 ]*$/",$idNumber)) {
                   echo "<script type='text/javascript'>alert('ID contains only numbers!')</script>";
                }
            }
        

            if (empty($_POST["tel_home"])) {
                echo "<script type='text/javascript'>alert('Tel-Home is required!')</script>";
            } else {
                $telHome = test_input($_POST["tel_home"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9 ]*$/",$telHome)) {
                   echo "<script type='text/javascript'>alert('tel-home contains only numbers!')</script>";
                }
            }
        
            if (empty($_POST["tel_mobile"])) {
                echo "<script type='text/javascript'>alert('Tel-mobile is required!')</script>";
            } else {
                $telMobile = test_input($_POST["tel_mobile"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9 ]*$/",$telMobile)) {
                   echo "<script type='text/javascript'>alert('tel-mobile contains only numbers!')</script>";
                }
            }

            if (empty($_POST["address"])) {
                echo "<script type='text/javascript'>alert('Address is required!')</script>";
            } else {
                $address = test_input($_POST["address"]);
            }

            if (empty($_POST["position"])) {
                echo "<script type='text/javascript'>alert('Position is required!')</script>";
            } else {
                $position = test_input($_POST["position"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$position)) {
                   echo "<script type='text/javascript'>alert('Invalid position!')</script>";
                }
            }
        
            if (empty($_POST["email"])){
                echo "<script type='text/javascript'>alert('E-mail is required!')</script>";
            }else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script type='text/javascript'>alert('Invalid email!')</script>";
                }
            }
        
            if (empty($_POST["user_id"])) {
                    echo "<script type='text/javascript'>alert('user_id is required!')</script>";
            } else {
                $userId = test_input($_POST["user_id"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9 ]*$/",$userId)) {
                   echo "<script type='text/javascript'>alert('Invalid User Id!')</script>";
                }
            }

            if (empty($_POST["tempory_password"])) {
                echo "<script type='text/javascript'>alert('Tempory Password is required!')</script>";
            } else {
                $temporyPassword= test_input($_POST["tempory_password"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[0-9 ]*$/",$temporyPassword)) {
                   echo "<script type='text/javascript'>alert('ID contains only numbers!')</script>";
                }

            }

           
            
            if (empty($accessType=$_POST['access_type'])){
                echo "<script type='text/javascript'>alert('Acess type is required!')</script>";
            }else{
                $accessType=  $_POST['access_type'];
                //print $accessType."11111";
            }
            
            
            $values="'$first_name','$last_name','$idNumber','$telHome','$telMobile','$position','$address','$userId','$email',$temporyPassword,'$accessType'";

            $dbhost = "localhost";  //server
            $dbuser = "root"; //databae user name
            $dbpass = "";   //databae user password
            $dbname = "dbclockinn";     //databae name

            // Create connection
            $db_handle=mysql_connect($dbhost, $dbuser, $dbpass);
            $db_found=  mysql_select_db($dbname,$db_handle);
            $connect= set_database();
            if ($db_found) {
                
                $result=database_insert($connect, 'employeedetail',"first_name,last_name,idNumber,telHome,telMobile,position,address,userId,email,Password,accessType", $values);
//                $sql = "INSERT INTO employeedetail (firstName,lastName,idNumber,telHome,telMobile,position,address,userId,email,password,accessType) VALUES (".$values.")";
//                $result = mysql_query($sql);
       
                if ($result){
                    mysql_close($db_handle);
                    echo "<script type='text/javascript'>alert('Your data added susessfully!!')</script>";

                }else{
                    print 'sql_query Error';
                }
            }  else {
                print "Database NOT Found ";
                mysql_close($db_handle);
            }
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        


    // 5 close database connection class
    function close($connection) {
        mysqli_close($connection);
    }
    ///end of function 5///

?> 
   

        
    </form>
    
        <!-- home button -->
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red" href="homeAdmin.php">
            <i class="extar-large material-icons">home</i>
        </a>

    </div>
    <!-- home button -->
    </body>
</html>
<?php

function database_insert($connection, $table,$to,$values) {
    $query = "INSERT INTO ";
    $query .=$table."(";
    $query .=$to;
    $query .=") VALUES (".$values.")";
    $dbsend = mysqli_query($connection, $query);

    if ($dbsend) {
        //success
        //redirection page
        return 1;
    } else {
        die("Database query failed".  mysqli_error($connection));
       
    }
}

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

?>