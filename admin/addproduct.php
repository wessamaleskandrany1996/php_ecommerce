<?php 
include('../middLeware/adminMiddleware.php');
include('includes/header.php'); 
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0" for="name">Select Category</label>
                                <select name="category_id" class="form-select mb-2">
                                    <option>Select Category</option>
                                        <?php  
                                            $categories = getAll("categories");
                                            if (mysqli_num_rows($categories) > 0) {
                                            foreach($categories as $item){
                                        ?>
                                    <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                        <?php  
                                            }
                                        }else{
                                            echo "no categories avilable";
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="name">Name</label>
                                <input type="text" name="name" required placeholder="Enter Product Name" id="name" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="slug">slug</label>
                                <input type="text" name="slug" required placeholder="Enter Slug" id="slug" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="original_price">Original Price</label>
                                <input type="number" min="1" required name="original_price" placeholder="Enter Original Price" id="original_price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="selling_price">Selling Price</label>
                                <input type="number" min="1" required name="selling_price" placeholder="Enter Selling Price" id="selling_price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="meta_title">Meta Title</label>
                                <input type="text" required name="meta_title" placeholder="Enter meta_title" id="meta_title" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="small_description">Small Description</label>
                                <input type="text" required name="small_description" placeholder="Enter small_description" id="small_description" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="image">Upload Image</label>
                                <input type="file" required name="image" id="image" class="form-control mb-2">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0" for="qty">Quantity</label>
                                    <input type="number" required min="1" name="qty" placeholder="Enter Quantity" id="qty" class="form-control mb-2">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <label class="mb-0" for="status">Status</label><br>
                                    <input type="checkbox" name="status" id="status">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <label class="mb-0" for="trending">Trending</label><br>
                                    <input type="checkbox" name="trending" id="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="description">Description</label>
                                <textarea rows="3" required name="description" placeholder="Enter Product Description" id="description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="meta_description">Meta Description</label>
                                <textarea rows="3" required name="meta_description" placeholder="Enter Product Meta Description" id="meta_description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="meta_keyword">Meta Keywords</label>
                                <textarea rows="3" required name="meta_keyword" placeholder="Enter Product Meta Keywords" id="meta_keyword" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>