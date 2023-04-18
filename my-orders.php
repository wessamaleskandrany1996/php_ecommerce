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
                <a class="text-white" href="my-orders.php" style="text-decoration: none;"> My Orders</a>
            </h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tracking NO</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>      
                                <?php
                                    $orders =  getOrders();
                                    if (mysqli_num_rows( $orders)) {
                                        foreach ($orders as $item){
                                        ?>
                                            <tr>
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['tracking_no']; ?></td>
                                                <td><?= $item['total_price']; ?></td>
                                                <td><?= $item['created_at']; ?></td>
                                                <td>
                                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-sm btn-primary">View Details</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    }else{
                                        ?>
                                            <tr>
                                                <td colspan="5">No Orders Yet </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>