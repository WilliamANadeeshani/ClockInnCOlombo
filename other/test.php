
<?php require_once '../includes/databaseManager.php'; ?>

<!--// 1.create the database connection-->
<?php $connection = set_database(); ?>

<!--// 2. perform database query-->
<?php
$dbresult = database_read($connection, "customerbills");
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <!--insert to database-->
        <?php
//        database+._insert($connection, "customerbills","passportid,description,price","'2456f','dinner',658")
//        
        ?>


        <pre>

<!--3. use returned data(if any)-->
            <?php
            print_r(get_this("price", "passportid", "2456f", $dbresult));
            ?>



        </pre>

        <!-- 4. Release returned data-->
        <!--        <?php
        free($dbresult);
        ?> -->



    </body>
</html>

<!-- 5 close the database connection-->
<?php
close($connection);
?>



