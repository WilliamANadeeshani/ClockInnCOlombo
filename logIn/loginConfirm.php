<?php
// Start the session
session_start();
include './connection.php';

$username=$_POST['username'];
echo $username;
$password=$_POST['password'];
//$password_hash=  md5($password);

if(!eregi("([^A-Za-z0-9])",$username) && !empty($username) && !empty($password)){
//	echo "wrong";
    
	$query="SELECT firstName,lastName FROM employeedetail WHERE userId='$username' AND password='$password'";
	if($query_run = mysql_query($query)){
            $query_num_rows = mysql_num_rows($query_run);
            echo 'fhfhf';
            if($query_num_rows==0){
                header("Location:loginError.html");
                echo 'Invalid password workid combination';
            }
            else { // Have Logged successfully
            // Set session variables
            
            $query1="SELECT firstName,lastName,accessType FROM employeedetail WHERE userId='$username' AND password='$password'";
            $query_run1 = mysql_query($query1);
           // header("Location:home.php");
            //echo $_SESSION["username"];
            $row1 = mysql_fetch_array($query_run1);
            echo "Welcome ".$row1['firstName']." ".$row1['lastName']." ".$row1['accessType'];
            if($row1['accessType']=="receptionist"){
                $_SESSION["LoggedIn"] = "YES";
                $_SESSION["username_i"] = "$username";
                header("Location:../Reception/homeReception.php");
            }
            elseif ($row1['accessType']=="manager"){
                $_SESSION["LoggedInM"] = "YES";
                $_SESSION["username_i"] = "$username";
                header("Location:../Manager/homeManager.php");
            }else{
                $_SESSION["LoggedInA"] = "YES";
                $_SESSION["username_i"] = "$username";
                header("Location:../Admin/homeAdmin.php");
            }
        }
        }

}else{
    if (empty($username)&& empty($password)){
        header("Location:loginEmpty.html");
    }
    elseif (empty($username)){
        header("Location:loginUsernameEmpty.html");
    }  elseif (empty ($password)) {
        header("Location:loginPasswordEmpty.html");
    } else
    header("Location:loginInvalid.html");
    echo 'Invalid Inputs';
}
?>
<!--
if (isset($_POST['workid'])&&isset($_POST['pass'])){
    $workid = $_POST['workid'];
    $password = $_POST['password'];
    
    $password_hash = md5($password);
    
    if (!empty($workid)&&!empty($password)){
        $query = "SELECT 'firstName' FROM 'password' WHERE 'workID'='$workid' AND 'password' = '$password'";
        if($query_run = mysql_query($query)){
            $query_num_rows = mysql_num_rows($query_run);
            if($query_num_rows==0){
                echo 'Invalid password workid combination';
            }
        }
    }else{
        echo 'You shoud enter workid and passwod';
    }
}
<form name="f1" method ="post" action="mainmenu.php">
                <p>Work  ID  : <input type="int" name="workid" size="5" maxlength="10" value=""/> </p> 
                <p>Password : <input type="password" name="password" size="5" maxlength="10" value=""/></p>
                <p><input type="submit" name="submit"  value="Login"/> </p> 
</form>*/
-->
