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
                    <h4>Categories</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>IMAGE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $category = getAll("categories");
                                if (mysqli_num_rows($category) > 0 ) {
                                    foreach($category as $item){
                                        ?>
                                            <tr class="text-center">
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['name']; ?></td>
                                                <td>
                                                    <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                </td>
                                                <td><?= $item['status'] == '0'?"visible":"hidden"; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Edit</a>
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
