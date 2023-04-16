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
            <a class="text-white" href="checkout.php" style="text-decoration: none;"> Checkout </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Checkout</h2>
            </div>
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5 class="text-center">Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="fw-bold">Name</label>
                                    <input type="text" name="name" required id="name" class="form-control" placeholder="Enter Your Full Name ">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="fw-bold">Email</label>
                                    <input type="email" name="email" required id="email" class="form-control" placeholder="Enter Your Email ">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="fw-bold">Phone</label>
                                    <input type="phone" name="phone" required id="phone" class="form-control" placeholder="Enter Your Phone Number ">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pincode" class="fw-bold">Pin Code</label>
                                    <input type="text" name="pincode" required id="pincode" class="form-control" placeholder="Enter Pin Code ">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="address" class="fw-bold">Address</label>
                                    <textarea name="address" id="address" required class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-md-7 text-center">
                                    <h6 class="fw-bold">Product</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="fw-bold">price</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6 class="fw-bold">Quantity</h6>
                                </div>
                            </div>
                                <?php $items = getCartItems();
                                    $total_price = 0 ;
                                    foreach($items as $citem)
                                    {
                                        ?>
                                            <div class="mb-1 border">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2">
                                                        <img src="uploads/<?= $citem['image'] ?>" height="90px" alt="product image" width="80px">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label><?= $citem['name'] ?></label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label><?= $citem['selling_price'] ?></label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>x<?= $citem['prod_qty'] ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        $total_price +=  $citem['selling_price'] * $citem['prod_qty'] ;
                                    }
                                ?>
                                <hr>
                                <h5>Total Price : <span class="float-end fw-bold text-danger"><?= $total_price ?> $</span></h5>
                                <div class="">
                                    <input type="hidden" name="payment_mode" value="COD">
                                    <input type="hidden" name="payment_id" value="">
                                    <button type="submit" name="placeOrderBtn" class="btn btn-outline-primary float-end w-100">Confirm And Place Order | COD </button>
                                </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>