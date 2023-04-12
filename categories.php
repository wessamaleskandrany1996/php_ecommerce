<?php 
    include("functions/userfunctions.php");
    include("includes/header.php");   
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php" style="text-decoration: none;"> Home </a>
            / Categories
        </h6>
    </div>
</div>
<div class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Categories</h2> 
                <hr>
                <div class="row">
                <?php 
                    $category = getAllActive("categories");
                    if (mysqli_num_rows($category) > 0 ) {
                        foreach($category as $item){
                            ?>
                                <div class="col-md-3 mb-3">
                                    <a href="products.php?category=<?= $item['slug'] ?>" style="text-decoration: none;">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image'] ?>" alt="category image" height="200px" class="w-100">
                                            <h4 class="text-center"><?= $item['name'] ?></h4> 
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        }
                    } else {
                        echo "No Records Found";
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php include("includes/footer.php"); ?>
