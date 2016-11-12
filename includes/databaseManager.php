<?php

// 1 setting database connection
function set_database() {
    $dbhost = "localhost";  //server
    $dbuser = "clockinnuser"; //databae user name
    $dbpass = "1234";   //databae user password
    $dbname = "dbclockinn";     //databae name
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //testing errors
    if (mysqli_connect_errno()) {
        die("Database connection failed:" . mysqi_connect_error() . "(" . mysqli_connect_errno() . ")");
    } else {
        return $connection;
    }
}

///end of function 1///
// 2 database query for reading. can be use as needed
function database_read($connection, $table, $where = '', $order = '') {
    $query = "SELECT * FROM ";
    $query .=$table;
    $query .=$where;
    $query .=$order;
    $dbresult = mysqli_query($connection, $query);

    if (!$dbresult) {
        die("Database query failed");
    } else {

        return $dbresult;   //this is the result for required fields
    }
}

///end of function 2///
// 3 this function will give needed data as an array
function get_this_one($req_column1, $condition_col, $condition, $dbresult) {
    $value = 0;
    while ($row = mysqli_fetch_assoc($dbresult)) {

        if ($row[$condition_col] == $condition) {
            $value = $row[$req_column1];
        }
    }
    return $value;
}

function get_this($req_column1, $req_column2, $condition_col, $condition, $dbresult) {
    $array = [0];
    while ($row = mysqli_fetch_assoc($dbresult)) {

        if ($row[$condition_col] == $condition) {
            $array[] = [$row[$req_column1], $row[$req_column2]];
        }
    }
    return $array;
}

///end of function 3///

function get_this_four($req_column1, $req_column2, $req_column3, $req_column4, $condition_col, $condition, $dbresult) {
    $array = [0];
    while ($row = mysqli_fetch_assoc($dbresult)) {

        if ($row[$condition_col] == $condition) {
            $array[] = [$row[$req_column1], $row[$req_column2], $row[$req_column3], $row[$req_column4]];
        }
    }
    return $array;
}

function get_this_three($req_column1, $req_column2, $req_column3, $dbresult) {
    $array = [0];
    while ($row = mysqli_fetch_assoc($dbresult)) {

//        if ($row[$condition_col] == $condition) {
        $array[] = [$row[$req_column1], $row[$req_column2], $row[$req_column3]];
//        }
    }
    return $array;
}

// 4 free allocated memory
function free($dbresult) {
    mysqli_free_result($dbresult);
}

///end of function 4///
// 5 close database connection class
function close($connection) {
    mysqli_close($connection);
}

///end of function 5///
// 6 data inserting to database function
function database_insert($connection, $table, $to, $values) {
    $query = "INSERT INTO ";
    $query .=$table . "(";
    $query .=$to;
    $query .=") VALUES (" . $values . ")";
    $dbsend = mysqli_query($connection, $query);

    if ($dbsend) {
        //success
        //redirection page
        return 1;
    } else {
        die("Database query failed" . mysqli_error($connection));
    }
}

///end of function 6///
