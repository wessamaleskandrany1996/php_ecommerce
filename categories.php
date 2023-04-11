<?php 
    include("functions/userfunctions.php");
    include("includes/header.php"); 
    
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Categories</h1> 
                <hr>
                <div class="row">
                <?php 
                    $category = getAllActive("categories");
                    if (mysqli_num_rows($category) > 0 ) {
                        foreach($category as $item){
                            ?>
                                <div class="col-md-3 mb-3">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image'] ?>" alt="category image" class="w-100">
                                           <h4 class="text-center"><?= $item['name'] ?></h4> 
                                        </div>
                                    </div>
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
