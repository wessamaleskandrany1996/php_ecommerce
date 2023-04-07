<?php
session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');
if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $meta_title = $_POST['meta_title'];
    $description = $_POST['description'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
    $category_query = "INSERT INTO categories (name,slug,meta_title,description,meta_description,meta_keyword,status,popular,image) VALUES ('$name','$slug','$meta_title','$description','$meta_description','$meta_keywords','$status','$popular','$filename')";
    $cate_query_run = mysqli_query($con, $category_query);
    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("addcategory.php","Category Added Successfully");
    }else{
        redirect("addcategory.php","something went wrong");
    }
}