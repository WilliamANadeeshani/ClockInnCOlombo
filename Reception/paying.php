<?php
error_reporting(0);
include '../includes/header.php';
require_once '../includes/databaseManager.php';

$connection = set_database();
$disabled = '';
?>
<div class="top-customerform z-depth-1" style="background-color: #bf360c" >


    <p style="text-align:left; color:white; font-size: 40px;  vertical-align: auto; padding-left: 10px; margin:0;">Paying </p>

    <p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">form</p>

</div>
<div class="container">
    <br><br>
    <form action="paying.php" method="post" name="fm7" onsubmit="return validateForm7()">
        <div class="row">
            <div class="input-field nom col m6 ">
                <input id="passport" name="passportidgetbill" type="text" class="validate">
                <label for="passport">Passport/ID Number</label>
            </div>
            <div class="row container col m4">
                <div class="col m12">
                    <p class="right-align"><button id="get-bill"  class="btn btn-large waves-effect waves-light cuz midddle" type="submit" name="getdata" style="background-color: #bf360c" >Get bill</button></p>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
$total = 0;
if (isset($_POST['passportidgetbill'])) {
    $billarray = getBill($_POST['passportidgetbill']);
    $id = $_POST['passportidgetbill'];
}

if (isset($_POST['passportidgetbill'])) {
//                                    echo "Bill of passport ID : " . $_POST['passportidgetbill'] . " ,";

    if (isset($billarray)) {



        foreach ($billarray as $key => $subarray) {

            $total+=(int) $subarray[1];
        }
        if (is_null(get_this_one('offerrequested', 'passportid', $_POST['passportidgetbill'], $dbresult))) {
            $total = $total;
        } else {

            $dbresultforreduction = database_read($connection, "specialoffers");

            $reduction = (get_this_one('reduction', 'passportid', $_POST['passportidgetbill'], $dbresultforreduction));

            $total_r = $total - $reduction;
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
                    if (isset($_POST['passportidgetbill']) && isset($total_r)) {
                        echo "<i class='material-icons '>library_books</i>Total bill of passport ID : " . $_POST['passportidgetbill'] . "";
                        echo '<table><tr style="color: #bf360c; font-size:22px;"><td style="text-align:center;">Total bill:</td>';
                        echo "<td class='right'>{$total_r}</td></tr></table>";
                    } else {
                        echo "<i class='material-icons '>library_books</i>Total bill of passport ID : " . "";
                        echo '<table><tr style="color: #bf360c; font-size:22px;"><td style="text-align:center;">Total bill:</td>';
                        echo "<td class='right'></td></tr></table>";
                    }
                    ?>

                </div>
                <div class="collapsible-body " >
                    <p></p>

                    <div class="container" style="margin-bottom: 50px">


                        <div class="row" style="color: #bf360c ;font-size:22px">
                            <div class="col m6" style="vertical-align: central">

                            </div>


                        </div>

                        <div class="row z-depth-1" style="padding: 20px" >

                            <?php
                            if (isset($_POST['passportidgetbill'])) {
                                $id = $_POST['passportidgetbill'];
//                                    echo "Bill of passport ID : " . $_POST['passportidgetbill'] . " ,";

                                if (isset($billarray)) {
                                    ?><br>
                                    <table  class='striped'>
                                        <thead>
                                            <tr>
                                                th data-field="description" class="col m6">Description</th>
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


                                    $dbresult = database_read($connection, "customerfinalizedbills");
                                    $checkOffer = get_this_one('finalizedbill', 'passportid', $id, $dbresult);
                                    echo "this".$checkOffer;
                                    if ($checkOffer == 1) {
                                        echo '<tr style="color: #00bfa5; font-size:22px;border-top:1px solid gray"><td>Total :</td>';
                                        echo "<td class='right'>{$total}</td></tr>";
                                        if (checkPaying($id, $total)) {
                                            echo "<td class='right' style='color:red ; font-size:25px'>BILL PAID</td>";
                                            $disabled = "disabled='disabled'";
                                        }
                                        echo "</table>";
                                    } else {
                                        $dbresultforreduction = database_read($connection, "specialoffers");

                                        $reduction = (get_this_one('reduction', 'passportid', $id, $dbresultforreduction));

                                        echo '<tr style="color: #00bfa5; font-size:22px;border-top:1px solid gray"><td>Total :</td>';
                                        echo "<td class='right'>{$total}</td></tr>";

                                        echo "<tr style='color: orange; font-size:22px;border-top:1px solid gray'>"
                                        . "<td>Special offer reduction</td>"
                                        . "<td class='right'>-" . $reduction . "</td>"
                                        . "</tr>";

                                        echo '<tr style="color: #00bfa5; font-size:22px;border-top:1px solid gray"><td>Total bill with reduction :</td>';
                                        echo "<td class='right'>" . ($total_r) . "</td></tr>";
                                        if (checkPaying($id, $total_r)) {
                                            echo "<td class='right' style='color:red ; font-size:25px'>BILL PAID</td>";
                                            $disabled = "disabled='disabled'";
                                        }
                                        echo "</table>";
                                    }
                                }
                            }
                            ?>


                        </div>



                    </div>
                </div>

            </li> 
            <?php
//            echo (get_this_one('offerrequested', 'passportid', '5x', $dbresult));
            ?>

            <!--bill payment-->
            <li>
                <div class="collapsible-header" style="height: 6em">

                    <i class='material-icons '>payment</i>Pay the Bill
                </div>
                <div class="collapsible-body container" >

                    <br><br>
                    <form action="paying.php" method="post">
                        <div class="row">
                            <div class="input-field nom col m4 ">
                                <input disabled="" id="customr-id" name="passportid" type="text" class="validate" value=<?php echo $_POST['passportidgetbill']; ?> readonly>
                                <label for="customr-id">Customer Id</label>
                            </div>
                            <div class="input-field nom col m4 ">
                                <input disabled="" id="total-bill" type="number" name='totalbill' class="validate" value=<?php echo $total_r; ?> readonly>
                                <label for="total-bill">Total Bill</label>
                            </div>
                            <div class="container col m4">
                                <div class="col m12">
                                    <p class="right-align"><button  class="btn btn-large waves-effect waves-light cuz midddle" type="submit" value="submit" name="payconfirm" style="background-color: #bf360c" <?php echo $disabled ?>>Pay</button></p>
                                </div>

                                <!--confirm modal-->
                                <!--                                <div id="payconfirm" class="modal model-fix-footer">
                                                                    <div class="modal-content">
                                                                        <p style="" >
                                                                        <spsn style=" text-align: center;vertical-align: middle; padding-bottom: 20px; padding-left: 20px;font-size: 18px;  " ><i class="large material-icons">monetization_on</i>&nbsp;&nbsp;Confirm bill payment...</span><br>
                                                                            <a  style="color: white;font-size: small; padding-bottom: 10px"class=" right btn btn-large waves-effect waves-light cuz modal-action modal-close waves-effect waves-green btn-flat" type="submit" value="submit" name="payconfirm">Confirm</a>
                                                                            </p>
                                                                    </div>
                                
                                                                </div>-->

                                <!--ends modal-->

                            </div>
                        </div>

                    </form>
                </div>
            </li>

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


function paybill() {
    global $connection;
    if (isset($_POST['passportid']) && isset($_POST['totalbill'])) {
        $id = $_POST['passportid'];
        $description = "bill settlement of customer id : " . $id;
        $value = $_POST['totalbill'];


        $date = date('Y/m/d');

        $month = date('m');
        $year = date('Y');

        $recorddata = "'$date','$description','$value','$month','$year','$id'";
        if (isset($_POST['payconfirm'])) {
            $dbresultforreduction = database_read($connection, "specialoffers");

            if (is_null(get_this_one('offerconsidered', 'passportid', $id, $dbresultforreduction))) {

                $data = "'$id','FALSE','$total' ";
                $success = database_insert($connection, "customerfinalizedbills", "passportid,finalizedbill,paid", $data);
                $incomereport = database_insert($connection, "incomerecord", "date,description,value,Month,year,customerId", $recorddata);
            } else {

                $updatepayment = mysqli_query($connection, "UPDATE customerfinalizedbills SET paid='1' WHERE passportid='$id' ");
                $incomereport = database_insert($connection, "incomerecord", "date,description,value,Month,year,customerId", $recorddata);
            }
        }
    }
}

paybill();

function checkPaying($idnum, $totalbill) {
    global $connection;
    $dbresult = database_read($connection, "incomerecord");
    $paymentvalueindatabase = get_this_one("value", "customerId", $idnum, $dbresult);
    if ($total == $paymentvalueindatabase) {
        return TRUE;
    } else {
        return FALSE;
    }
}
?>
<?php
include '../includes/footer.php';
?>

