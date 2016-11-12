<?php
$FirstName=$_POST['firstname'];
$LastName=$_POST['lastname'];
$id=$_POST['id'];
$month=date("m");
$year=date("Y");
$date=date("d");
$days=array("Day0","Day1","Day2","Day3","Day4","Day5","Day6","Day7","Day8","Day9","Day10","Day11","Day12","Day13","Day14","Day15","Day16","Day17","Day18","Day19","Day20","Day21","Day22","Day23","Day24","Day25","Day26","Day27","Day28","Day29","Day30","Day31");
$YPresent;
$YAbsent;
$MPresent;
$MAbsent;
//echo $month;
//echo $year;
//echo $date;


if(!empty($FirstName)&&!empty($LastName)&&!empty($id)&&!empty($_POST['Attendance'])){
    $attendence=$_POST['Attendance'];
    
    require_once ('Connector.php');
    $sql = "SELECT * FROM `eattendance` WHERE UserId=\"".$id."\"";
       $result = mysql_query($sql);
       $row = mysql_fetch_assoc($result);
       
       
        
       if(strcmp(strtolower($FirstName), strtolower($row["FirstName"]))==0&&strcmp(strtolower($LastName), strtolower($row["LastName"]))==0){
            
           if($row[$days[$date]]==Null){
               if($row["Year"]==$year){
                   //echo 'Current Year';
                  
                   $YPresent=(int)$row["YPresent"];
                   $YAbsent=(int)$row["YAbsent"];
                   if($row["Month"]==$month){
                         //echo 'Current Month';
                          $MPresent=(int)$row["MPresent"];
                          $MAbsent=(int)$row["MAbsent"];
                        if(strcmp($attendence, "Present")==0){
                                //$MPresent=(int)$row["MPresent"];
                                $MPresent++;
                                //$YPresent=(int)$row["YPresent"];
                                $YPresent++;
                                $sqli = "UPDATE eattendance SET $days[$date]='Present',MPresent='$MPresent',YPresent='$YPresent' WHERE UserId='$id'";
                                $result = mysql_query($sqli);
           
                            }else{
                                //$MAbsent=(int)$row["MAbsent"];
                                $MAbsent++;
                                //$YAbsent=(int)$row["YAbsent"];
                                $YAbsent++;

                                $sqli = "UPDATE eattendance SET $days[$date]='Absent',MAbsent='$MAbsent',YAbsent='$YAbsent' WHERE UserId='$id'";
                                $result1 = mysql_query($sqli);

                            }
                            echo '<script type="text/javascript">
                             window.location = "http://localhost/AttendanceTaker.php?msg=Sucessfull!!! Attendance has been marked";
                                </script>';
                            }else{
                                //echo 'Last  month';
                                $i=0;
                                while($i<=31){
                                $change="UPDATE eattendance SET $days[$i]=NULL WHERE UserId='$id'";
                                $result3 = mysql_query($change);
                                $i++;
                                }
                                $MPresent=0;
                                $MAbsent=0;
                                if(strcmp($attendence, "Present")==0){
                                //$MPresent=(int)$row["MPresent"];
                                $MPresent++;
                                //$YPresent=(int)$row["YPresent"];
                                $YPresent++;
                                //$sqli = "UPDATE eattendance SET $days[$date]='Present',MPresent='$MPresent',YPresent='$YPresent' WHERE UserId='$id'";
                                //$result = mysql_query($sqli);
           
                                }else{
                                //$MAbsent=(int)$row["MAbsent"];
                                $MAbsent++;
                                //$YAbsent=(int)$row["YAbsent"];
                                $YAbsent++;

                                //$sqli = "UPDATE eattendance SET $days[$date]='Absent',MAbsent='$MAbsent',YAbsent='$YAbsent' WHERE UserId='$id'";
                                //$result1 = mysql_query($sqli);

                                 }
                                $sqli = "UPDATE eattendance SET $days[$date]='Present',MPresent='$MPresent',YPresent='$YPresent',Month='$month' WHERE UserId='$id'";
                                $result = mysql_query($sqli);
                                $sqli2 = "UPDATE eattendance SET $days[$date]='Absent',MAbsent='$MAbsent',YAbsent='$YAbsent' WHERE UserId='$id'";
                                $result1 = mysql_query($sqli2);
                                echo '<script type="text/javascript">
                             window.location = "http://localhost/AttendanceTaker.php?msg=Sucessfull!!! Attendance has been marked";
                                </script>';
                            }
               
                    }else{
                       $MPresent=0;
                       $MAbsent=0;
                       $YAbsent=0;
                       $YPresent=0;
                       if(strcmp($attendence, "Present")==0){
                                //$MPresent=(int)$row["MPresent"];
                                $MPresent++;
                                //$YPresent=(int)$row["YPresent"];
                                $YPresent++;
                                //$sqli = "UPDATE eattendance SET $days[$date]='Present',MPresent='$MPresent',YPresent='$YPresent' WHERE UserId='$id'";
                                //$result = mysql_query($sqli);
           
                            }else{
                                //$MAbsent=(int)$row["MAbsent"];
                                $MAbsent++;
                                //$YAbsent=(int)$row["YAbsent"];
                                $YAbsent++;

                                //$sqli = "UPDATE eattendance SET $days[$date]='Absent',MAbsent='$MAbsent',YAbsent='$YAbsent' WHERE UserId='$id'";
                                //$result1 = mysql_query($sqli);

                                 }
                                 $sqli = "UPDATE eattendance SET $days[$date]='Present',MPresent='$MPresent',YPresent='$YPresent',Year='$year' WHERE UserId='$id'";
                                $result = mysql_query($sqli);
                                $sqli2 = "UPDATE eattendance SET $days[$date]='Absent',MAbsent='$MAbsent',YAbsent='$YAbsent' WHERE UserId='$id'";
                                $result1 = mysql_query($sqli2);
                                echo '<script type="text/javascript">
                             window.location = "http://localhost/AttendanceTaker.php?msg=Sucessfull!!! Attendance has been marked";
                                </script>';
                    }
                         
           
           }else{
               echo '<script type="text/javascript">
           window.location = "http://localhost/AttendanceTaker.php?msg=You Have Marked Attendance For This Employee Today!!! ";
            </script>';
           }
           
           
           
           
           
          
       }else{
           echo '<script type="text/javascript">
           window.location = "http://localhost/AttendanceTaker.php?msg=FAIL!!! Incorrect Names & ID";
      </script>';
       }
       
    
    
}else{
    echo '<script type="text/javascript">
           window.location = "http://localhost/AttendanceTaker.php?msg=FAIL!!! Fill Relevant Fields";
      </script>';

}
//function handle(){}


