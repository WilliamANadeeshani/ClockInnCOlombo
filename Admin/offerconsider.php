<?php
error_reporting(0);
include '../includes/header.php';
require_once '../includes/databaseManager.php';

$connection = set_database();
?>
<div>
<div class="top-customerform z-depth-1" style="background-color: #b388ff">


    <p style="text-align:left; color:white; font-size: 40px;  vertical-align: auto; padding-left: 10px; margin:0;">Special offer responding </p>

    <p style="text-align:left; color:white; font-size: 28px;  vertical-align: auto; padding-left: 10px; margin:0;">form</p>

</div>
<div class="container">
    <br><br>
    <form action="offerconsider.php" method="post">
        <div class="row">
            <div class="row container col m4">
                <div class="col m12">
                    <p class="right-align"><button id="get-bill"  class="btn btn-large waves-effect waves-light cuz midddle" type="submit" name="getrequests" style="background-color: #b388ff" >Check offer Requests</button></p>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
$offerrequestsarray = getofferrequests();
?>

<div class="container">
    <h4></h4>
    <div class="col m10">
        <ul class="collapsible popout container col m10 s4" data-collapsible="expandable" style="width: 60em;">


            <li><!--billing details-->
                <div class="collapsible-header" style="height: 6em">

                    <?php
                    echo "<i class='material-icons '>library_books</i>Offers";
                    echo '<table><tr style="color: #b388ff; font-size:22px;"><td style="text-align:center;">There are ';
                    if (isset($_POST['getrequests'])) {
                        $offers = 0;

                        if (isset($offerrequestsarray)) {

                            foreach ($offerrequestsarray as $key => $subarray) {

                                $offers+=1;
                            }
                        }
                    }
                    if ($offers == 0) {
                        echo $offers;
                    } else {
                        echo $offers - 1;
                    }



                    echo' offers:</td>';
                    echo "</tr></table>";
                    ?>


                </div>
                <div class="collapsible-body " >
                    <p></p>

                    <div class="container" >


                        <div class="row" style="color:  #b388ff ;font-size:22px">
                            <div class="col m6" style="vertical-align: central">

                            </div>


                        </div>

                        <div class="row z-depth-1" style="padding: 20px;padding-bottom: 20px" >

                            <?php
//                                    echo "Bill of passport ID : " . $_POST['passportidgetbill'] . " ,";
                            if (isset($_POST['getrequests'])) {
                                if (isset($offerrequestsarray)) {
                                    ?>
                                    <br>

                                    <?php
                                    $tableout = "<form action='offerconsider.php' method='post'><table class='highlight '><thead>
                                            <tr>
                                                <th data-field='passportid'>ID</th>
                                                <th data-field='totalbill' > Total bill( $ )</th>
                                               

                                            </tr>
                                        </thead>";
                                    foreach ($offerrequestsarray as $key => $subarray) {
                                        $tableout.="<tr>";

                                        foreach ($subarray as $subkey => $element) {
                                            if (is_numeric($element)) {
                                                $tableout.="<td >$element</td>";
//                                                $tableout.="<td>"
//                                                        . "<a name= 'submit.$subarray[0]' class='btn btn-large waves-effect waves-light ' type='submit' >reduce bill</a>"
//                                                        . "<a name= 'cancel.$subarray[0]' class='btn btn-large waves-effect waves-light ' type='submit' >cancel request</a>"
//                                                        . "</td>";
                                            } else {

                                                $tableout.="<td >$element</td>";
                                            }
                                        }
                                        $tableout.="</tr>";
                                    }


                                    $tableout.="</table></form>";


                                    echo $tableout;
                                }
                            }
                            ?>


                        </div>




                    </div>
                </div>

            </li> 


            <!--special offers cosideration bar-->
            <li>
                <div class="collapsible-header"  style="height: 6em">
                    <i class="material-icons">done_all</i>Consider offers
                </div>
                <div class="collapsible-body container">
                    <form action="offerconsider.php" method="post" name="fm4" method="post" onsubmit="return validateForm5()">
                        <div class="row ">
                            <div class="row">
                                <br>
                                <div class="row">
                                    <div class="input-field nom col m5 s5">
                                        <input id="passport" name="passport" type="text" class="validate">
                                        <label for="passport">Passport/ID Number</label>
                                    </div>
                                    <div class="row">

                                        <div class="input-field nom col m3 s3">
                                            <input id="price" name="reduction" class="validate">
                                            <label for="reduction">Reduction</label>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col m12">
                                        <p class="right-align"><button id="get-bill"  class="btn btn-large waves-effect waves-light cuz midddle" type="submit" name="consider" style="background-color: #b388ff"  >Add to offer</button></p>
                                    </div>
                                </div>
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
    <a class="btn-floating btn-large red" href="homeManager.php">
        <i class="extar-large material-icons">home</i>
    </a>

</div>
<!-- home button -->
</div>


<?php

//
function respondtoffer() {


    global $connection;


    if (isset($_POST['consider'])) {
        $passport = $_POST['passport'];

        $reduction = $_POST['reduction'];
        $finalbill=  gettotal($passport)-$reduction;
        $updatingoffer = mysqli_query($connection, "UPDATE specialoffers SET reduction='$reduction',finalbill='$finalbill',offerconsidered='1' WHERE passportid='$passport' ");
        $sendtofinalbill=  database_insert($connection, 'customerfinalizedbills', 'passportid,finalizedbill,paid', "'$passport','$finalbill',0");
    }
}

respondtoffer();

function gettotal($passportid) {
    global $connection;
    $dbresult = database_read($connection, "specialoffers");
    $total = get_this_one('totalbill', 'passportid', $passportid, $dbresult);
    return $total;
}


//if (isset($_POST['send'])) {
//    submitforaskingoffer();
//}
//
function getofferrequests() {
    global $connection;

    if (isset($_POST['getrequests'])) {
        $dbresult = database_read($connection, "specialoffers");
        $offerrequestsarray = get_this('passportid', 'totalbill', "offerconsidered", '0', $dbresult);
        return $offerrequestsarray;
    }
}

//print_r($billarray);
?>


<?php
include '../includes/footer.php';
?>

