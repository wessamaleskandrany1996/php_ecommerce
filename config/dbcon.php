<?php

// creating database connection ...
    $con = mysqli_connect("localhost","root","","phpecom");

// checking the connection ...
    if (!$con) {
        die("connection failed".mysqli_connect_error());
    }
?>