<?php 

session_start();
include('config/dbcon.php');

function getAllActive($table){
    global $con;
    $query = "SELECT * FROM $table where status='1' ";
    return $query_run = mysqli_query($con, $query);
};
function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('location: '.$url);
    exit();
};

?>