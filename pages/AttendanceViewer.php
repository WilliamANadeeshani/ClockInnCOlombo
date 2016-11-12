<html>
<head>

  <title>ClockInn Colombo Attendance Viewer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <link type="text/css" rel="stylesheet" href="css/materialize.min1.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/style1.css">
 <?php
  if (!empty($_GET)) {
  $msg = $_GET["msg"];
  echo "<div class= 'alert alert-success'>
  $msg
</div>";
  }
  ?>
</head>

<body class="">


 <div class="widget-item z-depth-1 ">

  <div class="top-border z-depth-1">
  
    <img src="" style="" >
    <p style="text-align:left; color:white; font-size: 40px; font-style:italic ; vertical-align: auto;padding-left: 10px; margin:0;">ClockInn Colombo</p>

    <p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">Attendance Viewer</p>

  </div>
  <div>
    <div class="row">
        <form class="col s12" action="http://localhost/AttendanceViewHandler.php" method="post">
        <div class="row container">
          <br>
          <br>
          <div class="input-field col s7">
            <i class="mdi-action-account-circle prefix"></i>
            <input id="username" type="text" class="validate" name="firstname">
            <label for="username">First Name</label>
          </div>
          <div class="input-field col s7">
            <i class="mdi-action-account-circle prefix"></i>
            <input id="username" type="text" class="validate" name="lastname">
            <label for="username">Last Name</label>
          </div>
          <div class="input-field col s7">
            <i class="mdi-action-account-circle prefix"></i>
            <input id="username" type="text" class="validate" name="id">
            <label for="username">ID</label>
          </div>
          <!--<div class="row ">
          <div class="input-field col m6 s6">
            <label>Attendance</label>
            <br/>
          </div>
          <div class="input-field col m2 s4 center-align">
            <input name="Attendance" type="radio" id="Present" value="Present" />
            <label for="Present">Present</label>
          </div>
         <div class="input-field col m2 s4 center-align">
            <input name="Attendance" type="radio" id="Absent" value="Absent"/>
            <label for="Absent">Absent</label>
          

         </div> 
        </div>-->
          <!--<div class="row">
          <div class="input-field col m6 s6">
            <label>New Year Or New Month(optional)</label>
            <br/>
          </div>
          <div class="input-field col m2 s4 center-align">
            <input name="Slot" type="radio" id="New Year" value="New Year"/>
            <label for="New Year">Year</label>
          </div>
          <div class="input-field col m2 s4 center-align">
            <input name="Slot" type="radio" id="New Month" value="New Month"/>
            <label for="New Month">Month</label>
          </div>
           <div class="input-field col m2 s4 center-align">
            <input name="Slot" type="radio" id="Both" value="Both"/>
            <label for="Both">Both</label>
          </div>
        </div> -->  

          
          <button class="btn waves-effect waves-light right" type="submit">Submit<i class="mdi-action-lock-open"></i></button>
        </div>
      </form>

    </div>
  </div>
</div>

<footer>
  <div class="footer-copyright">
    <div class="container">


      <a class="grey-text text-lighten-4 right" href=""></a>
    </div>
  </div>
</footer>

<!-- jQuery is required by Materialize to function -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript">
      //custom JS code
      
    </script>

  </body>
  </html>