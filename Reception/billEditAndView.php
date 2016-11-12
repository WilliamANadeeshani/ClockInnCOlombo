<?php
error_reporting(0);
include '../includes/header.php';
require_once '../includes/databaseManager.php';

$connection = set_database();
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">

</script>
</head>
<div class="top-customerform z-depth-1" style="background-color: #448aff">


    <p style="text-align:left; color:white; font-size: 40px;   vertical-align: auto; padding-left: 10px; margin:0;">Billing </p>

    <p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">form</p>

</div>
<div class="container">
    <br><br>
    <div class="col m10">
        <ul class="collapsible popout container col m10 s4" data-collapsible="accordion" style="width: 60em;">
            <li>
                <div class="collapsible-header " style="height: 6em;"><i class="material-icons">mode_edit</i>Add to bill</div>
                <div class="collapsible-body ">
                    <p></p>


                    <div class="container">
                        <div class="row">
                            <div class="col m10 offset-m1 s12">

                                <div class="row">
                                    <form action="billEditAndView.php" name ="fm" method="post" onsubmit="return validateForm()">
                                        <div class="row">
                                            <div class="input-field nom col m5 s5">
                                                <input id="passport" name="passport" type="text" class=validate>
                                                <label for="passport">Passport/ID Number</label>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="input-field nom col m9 s9">
                                                <input id="description" name="description"type="text" class="validate">
                                                <label for="description">Description</label>
                                            </div>

                                            <div class="input-field nom col m3 s3">
                                                <input id="price" name="price"  class="validate">
                                                <label for="price">Price</label>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col m12">
                                                <p class="right-align" ><button style="background-color: #448aff" id="submitdata" class="btn btn-large waves-effect waves-light cuz midddle" type="submit" name="submit" value="submit" >Submit</button></p>
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
                <div class="collapsible-header" style="height: 6em"><i class="material-icons ">library_books</i>Billing information


                </div>
                <div class="collapsible-body " >
                    <p></p>
                    <form action="billEditAndView.php" method="post" name="secondinbilledit" onsubmit="return validateForm2()">
                        <div class="container" style="margin-bottom: 50px">

                            <div class="row">
                                <div class="input-field nom col m7 s3">
                                    <input id="passport" name="passportidgetbill" type="text" class="validate" >
                                    <label for="passport">Passport/ID Number</label>
                                </div>
                                <div class="col m4 " style="padding: 0;margin: 0">
                                    <p class="right-align"><button id="getdata" style="background-color: #448aff" class="btn btn-large waves-effect waves-light cuz midddle" type="submit" name="getdata"  >Get bill</button></p>
                                </div>
                            </div>
                            <div class="row" style="color: #448aff ;font-size:22px">
                                <div class="col m6" style="vertical-align: central">
                                    <?php echo "Bill of passport ID : " . $_POST['passportidgetbill'] ; ?>
                                </div>


                            </div>

                            <div class="row z-depth-1" style="padding: 20px" >

                                <?php
                                $total = 0;
                                if (isset($_POST['passportidgetbill'])) {
//                                    echo "Bill of passport ID : " . $_POST['passportidgetbill'] . " ,";
                                    
                                    
                                    
                                    $billarray = getBill($_POST['passportidgetbill']);
                                    if (isset($billarray)) {
                                        ?><br>
                                        <table  class='striped'>
                                            <thead>
                                                <tr>
                                                    <th data-field="description" class="col m6">Description</th>
                                                    <th data-field="price" class="right col m4" style="text-align: right" >Price ( $ )</th>

                                                </tr>
                                            </thead>
                                        </table>
                                        <?php
                                        $tableout = "<table class='highlight '>";
                                        foreach ($billarray as $key => $subarray) {
                                            $tableout.="<tr>";
                                            $total+=(int) $subarray[1];
                                            foreach ($subarray as $subkey => $element) {
                                                if (is_numeric($element)) {
                                                    $tableout.="<td class='right'>$element</td>";
                                                } else {
                                                    $tableout.="<td >$element</td>";
                                                }
                                            }
                                            $tableout.="</tr>";
                                        }


                                        echo $tableout;

                                        echo '<tr style="color: #448aff; font-size:22px;border-top:1px solid gray"><td>Total bill for now :</td>';
                                        echo "<td class='right'>{$total}</td></tr>";
                                        echo "</table>";
                                    }
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
        <a class="btn-floating btn-large red" href="">
            <i class="extar-large material-icons">home</i>
        </a>

    </div>
    <!-- home button -->
</div>


<?php

function submitBill() {

    if  (isset($_POST['submit'])) {
                global $connection;

        //if(isset($_POST['passport'])){
        
        
        $passport = $_POST['passport'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $values = "'$passport', '$description', '$price'";
        $success = database_insert($connection, "customerbills", "passportid,description,price", $values);
        if ($success == TRUE) {
//            echo $success;
        } else {
//            echo "" ;
        }
        }
    }
//}

submitBill();

function getBill($id) {
    global $connection;
    if (isset($_POST['passportidgetbill'])) {
        if (isset($_POST['getdata'])) {
            $dbresult = database_read($connection, "customerbills");
            $billarray = get_this("description", "price", "passportid", $id, $dbresult);
            return $billarray;
        }
    }
    
    function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
}

//print_r($billarray);
?>


<?php
include '../includes/footer.php';
?>

<?php
        

?>
</body>

</html>
