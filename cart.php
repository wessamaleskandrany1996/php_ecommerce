<?php 
    include("functions/userfunctions.php");
    include("includes/header.php");
    include("auth.php");
?>
    <div class="py-3 bg-primary">
        <div class="container">
            <h6 class="text-white">
                <a class="text-white" href="index.php" style="text-decoration: none;"> Home </a>
                    / 
                <a class="text-white" href="cart.php" style="text-decoration: none;"> Cart </a>
            </h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
                        <h2>Shopping Cart</h2>
                    </div> 
                    <hr>
                    <div class="row align-items-center py-4">
                        <div class="col-md-5">
                            <h6>Product</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Selling Price</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Quantity</h6>    
                        </div>
                        <div class="col-md-2">
                            <h6>Action</h6>
                        </div>
                    </div>
                        <div id="mycart">
                            <?php $items = getCartItems();
                                foreach($items as $citem){
                                    ?>
                                        <div class="card product-data shadow-sm mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="uploads/<?= $citem['image'] ?>" height="100px" alt="product image" class="w-50">
                                                </div>
                                                <div class="col-md-3">
                                                    <h5><?= $citem['name'] ?></h5>
                                                </div>
                                                <div class="col-md-2">
                                                    <h5><?= $citem['selling_price'] ?> $</h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                                    <div class="input-group mb-3" style="width:130px">
                                                        <button class="input-group-text decrement-btn updateQty">-</button>
                                                        <input type="text" class="form-control input-qty text-center bg-white" value="<?= $citem['prod_qty'] ?>" disabled>
                                                        <button class="input-group-text increment-btn updateQty">+</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid']; ?>"><i class="fa fa-trash me-2"></i>Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?> 
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>