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
                    <h4>Products</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>IMAGE</th>
                                <th>STATUS</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $products = getAll("products");
                                if (mysqli_num_rows($products) > 0 ) {
                                    foreach($products as $item){
                                        ?>
                                            <tr class="text-center">
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['name']; ?></td>
                                                <td>
                                                    <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                </td>
                                                <td><?= $item['status'] == '1'?"visible":"hidden"; ?></td>
                                                <td>
                                                    <a href="editproduct.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="product_id" value="<?= $item['id'] ?>" >
                                                        <button type="submit" class=" btn btn-sm btn-danger" name="delete_product_btn">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                } else {
                                    echo "No Records Found";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>