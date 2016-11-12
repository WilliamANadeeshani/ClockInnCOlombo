<?php
error_reporting(0);
include '../includes/header.php';
require_once '../includes/databaseManager.php';

$connection = set_database();
?>
<div class="top-customerform z-depth-1" style="background-color: #9c27b0" >


    <p style="text-align:left; color:white; font-size: 40px;  vertical-align: auto; padding-left: 10px; margin:0;">Offer requesting </p>

    <p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">form</p>

</div>
<div class="container">
    <br><br>
    <form action="offerrequesting.php" method="post" name="fm6" onsubmit="return validateForm6()">
        <div class="row">
            <div class="input-field nom col m6 ">
                <input id="passport" name="passportidgetbill" type="text" class="validate">
                <label for="passport">Passport/ID Number</label>
            </div>
            <div class="row container col m4">
                <div class="col m12">
                    <p class="right-align"><button id="get-bill" style="background-color: #9c27b0" class="btn btn-large waves-effect waves-light cuz midddle" type="submit" name="getdata"  >Get bill</button></p>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
$total = 0;
$billarray = getBill($_POST['passportidgetbill']);

if (isset($_POST['passportidgetbill'])) {
//                                    echo "Bill of passport ID : " . $_POST['passportidgetbill'] . " ,";

    if (isset($billarray)) {



        foreach ($billarray as $key => $subarray) {

            $total+=(int) $subarray[1];
        }
    }
}
?>

<div class="container">
    <h4></h4>
    <div class="col m10">
        <ul class="collapsible popout container col m10 s4" data-collapsible="accordion" style="width: 60em;">


            <li><!--billing details-->
                <div class="collapsible-header" style="height: 6em">

                    <?php
                    echo "<i class='material-icons '>library_books</i>Total bill of passport ID : " . $_POST['passportidgetbill'] . "";
                    echo '<table><tr style="color: #9c27b0; font-size:22px;"><td style="text-align:center;">Total bill:</td>';
                    echo "<td class='right'>{$total}</td></tr></table>";
                    ?>

                </div>
                <div class="collapsible-body " >
                    <p></p>

                    <div class="container" style="margin-bottom: 50px">


                        <div class="row" style="color: #9c27b0 ;font-size:22px">
                            <div class="col m6" style="vertical-align: central">

                            </div>


                        </div>

                        <div class="row z-depth-1" style="padding: 20px" >

                            <?php
                            if (isset($_POST['passportidgetbill'])) {
//                                    echo "Bill of passport ID : " . $_POST['passportidgetbill'] . " ,";

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

                                    echo '<tr style="color: #9c27b0; font-size:22px;border-top:1px solid gray"><td>Total :</td>';
                                    echo "<td class='right'>{$total}</td></tr>";
                                    echo "</table>";
                                }
                            }
                            ?>


                        </div>



                    </div>
                </div>

            </li> 

            <!--special offers bar-->
            <li>
                <div class="collapsible-header" style="height: 6em">

                    <i class='material-icons '>stars</i>Special Offer
                </div>
                <div class="collapsible-body container" >

                    <br><br>
                    <div class="row">
                        <form action="offerrequesting.php" method="post">
                            <div class="input-field nom col m4 ">
                                <input disabled="" id="customerid" type="text" class="validate" name="customerid" value=<?php echo $_POST['passportidgetbill']; ?>>
                                <label for="customerid">Customer Id</label>
                            </div>
                            <div class="input-field nom col m4 ">
                                <input disabled="" id="totalbill" type="number" class="validate" name="totalbill" required="" aria-required="true" value=<?php echo $total; ?>>
                                <label for="totalbill">Total Bill</label>
                            </div>
                            <div class="container col m4">
                                <div class="col m12">
                                    <p class="right-align"><button id="offer-Request" class="btn btn-large waves-effect waves-light cuz midddle" type="submit" name="send" value="submit" style="background-color: #9c27b0"  >Send for offer</button></p>
                                </div>
                            </div>
                        </form>

                    </div>


                </div>
            </li>

            <!--bill payment-->
<!--            <li>
                <div class="collapsible-header" style="height: 6em">

                    <i class='material-icons '>payment</i>Pay the Bill
                </div>
                <div class="collapsible-body container" >

                    <br><br>
                    <div class="row">
                        <div class="input-field nom col m4 ">
                            <input id="customr-id" type="text" class="validate" value=readonly>
                            <label for="customr-id">Customer Id</label>
                        </div>
                        <div class="input-field nom col m4 ">
                            <input id="total-bill" type="number" class="validate" valuereadonly>
                            <label for="total-bill">Total Bill</label>
                        </div>
                        <div class="container col m4">
                            <div class="col m12">
                                <p class="right-align"><button id="offer-Request" class="modal-trigger btn btn-large waves-effect waves-light cuz midddle" type="button" name="paybill" data-target="payconfirm">Pay</button></p>
                            </div>

                            confirm modal
                            <div id="payconfirm" class="modal model-fix-footer">
                                <div class="modal-content">
                                    <p style="" >
                                    <spsn style=" text-align: center;vertical-align: middle; padding-bottom: 20px; padding-left: 20px;font-size: 18px;  " ><i class="large material-icons">monetization_on</i>&nbsp;&nbsp;Confirm bill payment...</span><br>
                                        <a href="#!" style="color: white;font-size: small; padding-bottom: 10px"class=" right btn btn-large waves-effect waves-light cuz modal-action modal-close waves-effect waves-green btn-flat">Confirm</a>
                                        </p>
                                </div>

                            </div>

                            end modal

                        </div>
                    </div>


                </div>
            </li>-->

        </ul>
    </div>




</div>
<!-- home button -->
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red" href="homeReception.php">
        <i class="extar-large material-icons">home</i>
    </a>

</div>
<!-- home button -->
</div>


<?php

function submitforaskingoffer() {


    global $connection;
    $passport = $_POST['customerid'];
    $totalbill = $_POST['totalbill'];
    $values = "'$passport','FALSE','$totalbill' ";
    $success = database_insert($connection, "specialoffers", "passportid,offerconsidered,totalbill", $values);
    $markasrequested = mysqli_query($connection, "UPDATE customerbills SET offerrequested=1 WHERE passportid='$passport' ");
    
    
    if ($success == TRUE) {
//            echo $success;
    } else {
//            echo "" ;
    }
}

if (isset($_POST['send'])) {
    submitforaskingoffer();
}

function getBill($id) {
    global $connection;
    if (isset($_POST['passportidgetbill'])) {
        if (isset($_POST['getdata'])) {
            $dbresult = database_read($connection, "customerbills");
            $billarray = get_this("description", "price", "passportid", $id, $dbresult);
            return $billarray;
        }
    }
}

//print_r($billarray);
?>


<?php
include '../includes/footer.php';
?>

