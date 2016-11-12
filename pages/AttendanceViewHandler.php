<?php
$FirstName=$_POST['firstname'];
$LastName=$_POST['lastname'];
$id=$_POST['id'];



if(!empty($FirstName)&&!empty($LastName)&&!empty($id)){
    
    
    require_once ('Connector.php');
    $sql = "SELECT * FROM `eattendance` WHERE UserId=\"".$id."\"";
       $result = mysql_query($sql);
       $row = mysql_fetch_assoc($result);
       
       
        
       if(strcmp(strtolower($FirstName), strtolower($row["FirstName"]))==0&&strcmp(strtolower($LastName), strtolower($row["LastName"]))==0){?>
           
<html >
  <head>
    <meta charset="UTF-8">
    <title>Attendance Detail</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
  <link href="css/flexslider.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/reset.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <section> <!--for demo wrap-->
<h1>Attendance Details</h1>  
<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>User Id</th>
      <th>First Name </th>
      <th>Last Name</th>
       <th>Year</th>
       <th>Month</th>
       <th>Monthly Present Days</th>
       <th>Monthly Absent Days</th>
       <th>Yearly Present Days</th>
       <th>Yearly Absent Days</th>
       <tr>
      <td><?php echo $row["UserId"]; ?></td>
       <td><?php echo $row["FirstName"]; ?></td>
        <td><?php echo $row["LastName"]; ?></td>
         <td><?php echo $row["Year"]; ?></td>
          <td><?php echo $row["Month"]; ?></td>
           <td><?php echo $row["MPresent"]; ?></td>
           <td><?php echo $row["MAbsent"]; ?></td>
           <td><?php echo $row["YPresent"]; ?></td>
           <td><?php echo $row["YAbsent"]; ?></td>
      
        </tr></html>



      
    </tr>
  </thead>
</table>
</div>
<div  class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
  <tbody>
      
      
      
    
    
  </tbody>
</table>
</div>
</section>
 <div class="form-group tm-green-gradient text-center tbl-header ">
     <button type="submit" name="submit" class="tm-yellow-btn tbl-header" onclick="window.location = 'http://localhost/AttendanceViewer.php'">Exit</button>
						            </div> 

<!-- follow me template -->
<div class="made-with-love">
  Created 
  <i></i> by 
  <a >Codemo</a>
</div>
    
    
    
    
  </body>
</html>

             
             
             
            
           
           
          
      <?php }else{
           echo '<script type="text/javascript">
           window.location = "http://localhost/AttendanceViewer.php?msg=FAIL!!! Incorrect Names & ID";
      </script>';
       }
       
    
    
}else{
    echo '<script type="text/javascript">
           window.location = "http://localhost/AttendanceViewer.php?msg=FAIL!!! Fill Relevant Fields";
      </script>';

}
//function handle(){}


