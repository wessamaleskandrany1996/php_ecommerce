<?php 
    include("functions/userfunctions.php");
    include("includes/header.php");

    if (isset($_GET['category'])) {
        $category_slug = $_GET['category'] ;
        $category_data = getSlugActive('categories', $category_slug);
        $category = mysqli_fetch_array($category_data);
        if ($category) {
            $cat_id = $category['id'];
        ?>
        <div class="py-3 bg-primary">
            <div class="container">
                <h6 class="text-white">
                    <a class="text-white" href="index.php" style="text-decoration: none;"> Home </a>
                        / 
                    <a class="text-white" href="categories.php" style="text-decoration: none;"> Categories </a>
                        / <?= $category['name'] ?></h6>
            </div>
        </div>
        <div class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2> <?= $category['name'] ?>  Category</h2> 
                        <hr>
                        <div class="row">
                        <?php 
                            $products = getProdByCategory($cat_id);
                            if (mysqli_num_rows($products) > 0 ) {
                                foreach($products as $item){
                                    ?>
                                        <div class="col-md-3 mb-3">
                                            <a href="productview.php?product=<?= $item['slug'] ?>" style="text-decoration: none;">
                                                <div class="card shadow">
                                                    <div class="card-body">
                                                        <img src="uploads/<?= $item['image'] ?>" height="250px" alt="product image" class="w-100">
                                                        <hr>
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
<?php
    }else{
        echo "Something Went Wrong ";
    }
}else{
    echo "Something Went Wrong ";
}
include("includes/footer.php"); 
?>
