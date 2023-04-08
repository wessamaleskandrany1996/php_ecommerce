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
};

if (isset($_POST['update_category_btn'])) {
    $cat_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $meta_title = $_POST['meta_title'];
    $description = $_POST['description'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $path = "../uploads";
    
    if ($new_image !="") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }else{
        $update_filename = $old_image ;
    }

    $update_query = "UPDATE categories SET name='$name',slug='$slug',meta_title='$meta_title',description='$description',meta_description='$meta_description',meta_keyword='$meta_keywords',status='$status',popular='$popular',image='$update_filename' WHERE id='$cat_id' ";
    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if (file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("editcategory.php?id=$cat_id","Category updated Successfully");
    }else{
        redirect("editcategory.php?id=$cat_id","Something Went Wrong");
    }

};

if (isset($_POST['delete_category_btn'])) {
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $category_query = "SELECT * FROM categories WHERE id='$category_id' ";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];
    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        if (file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);
        }
        redirect("category.php","Category Deleted Successfully");
    }else{
        redirect("category.php","Something Went Wrong");
    }
}