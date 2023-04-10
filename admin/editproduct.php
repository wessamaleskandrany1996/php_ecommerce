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
                $product = getById("products", $id);
            if (mysqli_num_rows($product) > 0) {
                $data = mysqli_fetch_array($product);
            ?>

            <div class="card">
                <div class="card-header">
                    <h4>Edit Product</h4>
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
                                            <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?> > <?= $item['name']; ?> </option>
                                        <?php  
                                            }
                                        }else{
                                            echo "no categories avilable";
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                                <input type="text" name="name" value="<?= $data['name'] ?>" id="name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="slug">slug</label>
                                <input type="text" name="slug" value="<?= $data['slug'] ?>" id="slug" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="original_price">Original Price</label>
                                <input type="number" min="1" name="original_price" value="<?= $data['original_price'] ?>" id="original_price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="selling_price">Selling Price</label>
                                <input type="number" min="1" name="selling_price" value="<?= $data['selling_price'] ?>" id="selling_price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" id="meta_title" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="small_description">Small Description</label>
                                <input type="text" name="small_description" value="<?= $data['small_description'] ?>" id="small_description" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <label>Current Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                <img src="../uploads/<?= $data['image']; ?>" width="50px" height="50px" alt="<?= $data['name']; ?>" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0" for="qty">Quantity</label>
                                    <input type="number" min="1" name="qty" value="<?= $data['qty'] ?>" id="qty" class="form-control mb-2">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <label class="mb-0" for="status">Status</label><br>
                                    <input type="checkbox" name="status" <?= $data['status']?"checked":"" ?> id="status">
                                </div>
                                <div class="col-md-3 mt-4">
                                    <label class="mb-0" for="trending">Trending</label><br>
                                    <input type="checkbox" name="trending" <?= $data['trending']?"checked":"" ?> id="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="description">Description</label>
                                <textarea rows="3" name="description" id="description" class="form-control mb-2"><?= $data['description'] ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="meta_description">Meta Description</label>
                                <textarea rows="3" name="meta_description" id="meta_description" class="form-control mb-2"> <?= $data['meta_description'] ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="meta_keyword">Meta Keywords</label>
                                <textarea rows="3" name="meta_keyword" id="meta_keyword" class="form-control mb-2"><?= $data['meta_keywords'] ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }else{
        echo "Product Not Found";
        }
    }else{
        echo "Id messing from url";
    }   
?>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>