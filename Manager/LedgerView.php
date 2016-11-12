
<html >
  <head>
    <meta charset="UTF-8">
    <title>ClockInn Colombo</title>
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
<h1>Lost And Found Ledger</h1>  
<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>Item</th>
      <th>Found Date </th>
      <th>Description</th>
      
    </tr>
  </thead>
</table>
</div>
<div  class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
  <tbody>
      <?php
      require_once ('Connector.php');
      $sql = "SELECT * FROM `lfledger` WHERE 1";
       $result = mysql_query($sql);
       if(mysql_num_rows($result)!=0) {
           $nonReturn=0;
    while($row = mysql_fetch_assoc($result)) {
        //echo $row["returned"] ;
      if($row["returned"]==0){
          //echo 'ok';
          $nonReturn++;
          //echo $nonReturn;
          ?>
      
      <tr>
      <td><?php echo $row["Item"]; ?></td>
      <td><?php echo $row["Found Date"] ?></td>
      <td><?php echo $row["Description"] ?></td>
      
        </tr></html>
    <?php 
    
    }
   
       // echo "id: " . $row["ID"]. " - Name: " . $row["Item"]."<br>";
    }
     if($nonReturn==0){?>
        <tr>
      <td><?php echo 'No'; ?></td>
      <td><?php echo 'Non  Returned' ?></td>
      <td><?php echo 'Items' ?></td>
      
        </tr></html>
        
   <?php }
} else {
    ?>
 
        <tr>
      <td><?php echo 'No'; ?></td>
      <td><?php echo 'Items' ?></td>
      <td><?php echo 'Were Found' ?></td>
      
        </tr></html>
    <?php
}?>
    
  </tbody>
</table>
</div>
</section>
 <div class="form-group tm-green-gradient text-center tbl-header ">
     <button type="submit" name="submit" class="tm-yellow-btn tbl-header" onclick="window.location = 'http://localhost/ClockInnColombo.php'">Exit</button>
						            </div> 

<!-- follow me template -->
<div class="made-with-love">
  Created 
  <i></i> by 
  <a >Codemo</a>
</div>
    
    
    
    
  </body>
</html>
