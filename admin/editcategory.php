<?php 
 session_start();
include('includes/header.php'); 
include('../middLeware/adminMiddleware.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $category = getById("categories", $id);
                    if (mysqli_num_rows($category) > 0) {
                        $data = mysqli_fetch_array($category);
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Category</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name">Name</label>
                                                <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                                <input type="text" name="name" value="<?= $data['name'] ?>" id="name" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="slug">slug</label>
                                                <input type="text" name="slug" value="<?= $data['slug'] ?>" id="slug" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="meta_title">Meta Title</label>
                                                <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" id="meta_title" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="image">Upload Image</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                                <label>Current Image</label>
                                                <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                                <img src="../uploads/<?= $data['image']; ?>" width="50px" height="50px" alt="<?= $data['name']; ?>" />
                                            </div>
                                            <div class="col-md-12">
                                                <label for="description">Description</label>
                                                <textarea rows="3" name="description" id="description" class="form-control"><?= $data['description'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="meta_description">Meta Description</label>
                                                <textarea rows="3" name="meta_description" id="meta_description" class="form-control"><?= $data['meta_description'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="meta_keyword">Meta Keywords</label>
                                                <textarea rows="3" name="meta_keyword" id="meta_keyword" class="form-control"><?= $data['meta_keyword'] ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="status">Status</label>
                                                <input type="checkbox" name="status" <?= $data['status']?"checked":"" ?> id="status">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="popular">Popular</label>
                                                <input type="checkbox" name="popular" <?= $data['popular']?"checked":"" ?> id="popular">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        <?php
                    }else{
                        echo "Category Not Found";
                    }
                }else{
                    echo "Id messing from url";
                }   
            ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>