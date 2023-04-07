<?php 
 session_start();
include('includes/header.php'); 
include('../middLeware/adminMiddleware.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Enter Category Name" id="name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="slug">slug</label>
                                <input type="text" name="slug" placeholder="Enter Slug" id="slug" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Enter meta_title" id="meta_title" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter Category Description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="meta_description">Meta Description</label>
                                <textarea rows="3" name="meta_description" placeholder="Enter Category Meta Description" id="meta_description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="meta_keyword">Meta Keywords</label>
                                <textarea rows="3" name="meta_keyword" placeholder="Enter Category Meta Keywords" id="meta_keyword" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" id="status">
                            </div>
                            <div class="col-md-6">
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular" id="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>