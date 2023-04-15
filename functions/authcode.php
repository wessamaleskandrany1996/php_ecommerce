<?php
session_start();
include("../config/dbcon.php");
include('../functions/myfunctions.php');
if(isset($_POST['register_btn'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
    $check_email_query = "SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email Already Registered";
        header('location: ../register.php');
    }
    else
    {
        if ($password === $cpassword) {
            $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$phone','$password')";
            $insert_query_run = mysqli_query($con,$insert_query);
            if($insert_query_run){
                redirect("../login.php","Regestered Successfully");
            }else{
                redirect("../register.php","Something Went Wrong");
            }
        }else{
            redirect("../register.php","password do not match");
        }
    }
}else if(isset($_POST['login_btn'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' and password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);
    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true ;
        $userdata = mysqli_fetch_array($login_query_run);
        $user_id = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $rule_as =  $userdata['rule_as'];
        $_SESSION['auth_user'] = [
            'user_id' =>$user_id,
            'name' => $username,
            'email' => $useremail
        ];
        $_SESSION['rule_as'] = $rule_as ;
        if ($rule_as == 1 ) {
            redirect("../admin/index.php","Welcome To Dashboard");
        }else {
            redirect("../index.php","Logged In Successfully");
        }
    }
    else
    {
        redirect("../login.php","Invalid Cradentionals");
    }
}
?>