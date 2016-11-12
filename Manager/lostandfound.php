<?php
error_reporting(0);
include '../includes/header.php';
require_once '../includes/databaseManager.php';

$connection = set_database();
?>
<!--<script type="text/javascript" src="../js/custom.js"></script>-->

<div class="top-customerform z-depth-1" style="background-color: #a1887f">


    <p style="text-align:left; color:white; font-size: 40px;   vertical-align: auto; padding-left: 10px; margin:0;">Lost Item </p>

    <p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">form</p>

</div>
<div class="container">
    <br><br>
    <div class="col m10">
        <ul class="collapsible popout container col m10 s4" data-collapsible="accordion" style="width: 60em;">
            <li>
                <div class="collapsible-header " style="height: 6em;"><i class="material-icons">mode_edit</i>Add to lost & found ledger </div>
                <div class="collapsible-body ">
                    <p></p>


                    <div class="container">
                        <div class="row">
                            <div class="col m10 offset-m1 s12">

                                <div class="row">
                                    <form action="lostandfound.php" name ="fm2" method="post" onsubmit="return validateForm3()">
                                        <div class="row">
                                            <div class="input-field nom col m3 s3">
                                                <input id="price" name="founddate" type="date" class=" datepicker validate">
                                                <label for="founddate">Found date</label>
                                            </div>

                                        </div>



                                        <div class="row">
                                            <div class="input-field nom col m5 s5">
                                                <input id="passport" name="itemname" class="validate">
                                                <label for="itemname">Item name</label>
                                                
                                            </div>
                                            <div class="input-field nom col m12 s12">
                                                <input id="description" name="description" class="validate">
                                                <label for="description">Description</label>
                                            </div>



                                        </div>

                                        <div class="row">

                                            <div class="col m12">
                                                <p class="right-align" ><button style="background-color: #a1887f" id="submitdata" class="btn btn-large waves-effect waves-light cuz midddle" type="submit" name="submit" value="submit" >Submit</button></p>
                                            </div>


                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </li> 


            <!--<sript type="text/javascript"> </sript>-->
            <!-- end of bill editing -->

            <li><!--billing details-->
                <div class="collapsible-header" style="height: 6em"><i class="material-icons ">receipt</i>Lost item information


                </div>
                <div class="collapsible-body " >
                    <p></p>
                    <form action="lostandfound.php"  method="post" onsubmit="return ">
                        <div class="container" style="margin-bottom: 50px">

                            <div class="row">
                                <div class="col m4 " style="padding: 0;margin: 0">
                                    <p class="right-align"><button id="getdata" style="background-color: #a1887f" class="btn btn-large waves-effect waves-light " type="submit" name="getdata"  >Found Items</button></p>
                                </div>
                            </div>
                            <div class="row" style="color: #a1887f ;font-size:22px">
                               


                            </div>

                            <div class="row z-depth-1" style="padding: 20px" >

                                <?php
                              
                                    $lostitemarray = getLostItem();
                                    if (isset($lostitemarray)) {
                                       
                                        $tableout = "<table class='highlight '><thead>
                                                <tr>
                                                    <th data-field='item'>Item code</th>
                                                    <th data-field='date' >Found date</th>
                                                    <th data-field='item' >Item </th>
                                                    <th data-field='item'>Description </th>

                                                </tr>
                                            </thead>";
                                        foreach ($lostitemarray as $key => $subarray) {
                                            $tableout.="<tr>";
                                            
                                            foreach ($subarray as $subkey => $element) {
                                                
                                                    $tableout.="<td >$element</td>";
                                                
                                            }
                                            $tableout.="</tr>";
                                        }


                                        echo $tableout;

                                       
                                        echo "</table>";
                                    }
                                
                                ?>


                            </div>



                        </div>
                    </form>
                </div>

            </li>
            
             <li>
                <div class="collapsible-header" style="height: 6em">

                    <i class='material-icons '>thumb_up</i>Return Item
                </div>
                <div class="collapsible-body container" >

                    <br><br>
                    <form action="lostandfound.php"  name ="fm3" method="post" onsubmit="return validateForm4()">
                        <div class="row">
                            
                            <div class="input-field nom col m4 ">
                                <input id="itemcode" name= "itemcode"  class="validate">
                                <label for="itemcode">Item code</label>
                            </div>
                            <div class="container col m4">
                                <div class="col m12">
                                    <p class="right-align"><button  class="btn btn-large waves-effect waves-light cuz midddle" type="submit" value="submit" name="return" style="background-color:#a1887f ">return</button></p>
                                </div>

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
        <a class="btn-floating btn-large red" href="">
            <i class="extar-large material-icons">home</i>
        </a>

    </div>
    <!-- home button -->
</div>


<?php
    if (isset($_POST['submit'])) {
//        if (isset($_POST['itemname'])){
//                if (empty($_POST["itemname"])) {
//                echo "<script type='text/javascript'>alert('Item Name is required!')</script>";
//                } else {
//                    $first_name = test_input($_POST["itemname"]);
//                    // check if name only contains letters and whitespace
//                    if (!preg_match("/^[a-zA-Z ]*$/",$itemName)) {
//                       echo "<script type='text/javascript'>alert('first name can contain only name and white space!')</script>";
//                    }
//                }
//        }
        global $connection;
        $date = $_POST['founddate'];
        $item = $_POST['itemname'];
        $description = $_POST['description'];
        
    
        $values = "'$date', '$item', '$description','0'";
        $success = database_insert($connection, "lfledger", "Founddate,Item,Description,returned", $values);
        if ($success == TRUE) {
//            echo $success;
        } else {
//            echo "" ;
        }
    }


function getLostItem() {
    global $connection;

        if (isset($_POST['getdata'])) {
            $dbresult = database_read($connection, "lfledger");
            $lostitemarray = get_this_four("ID","FoundDate", "Item", "Description","returned","0", $dbresult);
            return $lostitemarray;
        }
    
}


function returnItem() {
    global $connection;
    $id = $_POST['itemcode'];

    if (isset($_POST['return'])) {
        $dbresultforreturn = database_read($connection, "lfledger");

        if (is_null(get_this_one('returned', 'ID', $id, $dbresultforreturn))) {

//            $success = database_insert($connection, "lfledger", "return", "1");
        } else {

            $updatepayment = mysqli_query($connection, "UPDATE lfledger SET returned='1' WHERE ID='$id' ");
        }
    }
}

returnItem();
?>




<?php
include '../includes/footer.php';
?>

