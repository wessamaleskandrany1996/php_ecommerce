<?php 
    include("functions/userfunctions.php");
    include("includes/header.php"); 
    include("includes/slider.php"); 

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="mb-2" style="width:150px; height:5px; background-color: red; border-radius: 20px;"></div>
                <div class="owl-carousel">
                    <?php
                        $trendingProducts = getAllTrending();
                        if (mysqli_num_rows($trendingProducts) > 0) {
                            foreach ($trendingProducts as $item) {
                                ?>
                                    <div class="item">
                                        <a href="productview.php?product=<?= $item['slug'] ?>" style="text-decoration: none;">
                                            <div class="card shadow">
                                                <div class="card-body shadow">
                                                    <img src="uploads/<?= $item['image'] ?>" height="250px" alt="product image" class="w-100">
                                                    <hr>
                                                    <h6 class="text-center"><?= $item['name'] ?></h6> 
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }else{
                            echo "No Trending Products";
                        }
                    ?>  
                </div>   
            </div>
        </div>
    </div>
</div>

<div class="py-5" style="background-color: #f2f2f2;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="mb-4" style="width:150px; height:5px; background-color: red; border-radius: 20px;"></div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis aliquam aliquid dolores, iste incidunt laboriosam! Incidunt at numquam architecto dolore rerum quam blanditiis deserunt commodi quaerat officia fugit, animi eos doloremque temporibus vero, ab labore modi illo quasi quo et libero inventore rem id. Aspernatur ullam quam quasi illo vel nulla modi ipsa ipsam provident quas? Quae dolores in sint dolore itaque commodi animi dicta quisquam ducimus. Voluptate nobis odit sequi officia itaque earum nisi tempora aliquam, nesciunt saepe minus sint cumque fugit repudiandae <br> sapiente corrupti dicta sit ipsum possimus consequuntur dolore explicabo, vel natus! Error, odio totam consequatur eveniet tempora excepturi. A, quia quisquam esse officia beatae est eius, et, sapiente consequatur accusantium nesciunt error nemo. Repellat alias cum unde necessitatibus aliquam a dolore optio dolorem ullam maxime iste praesentium in commodi impedit accusantium ducimus est atque, provident sed, qui eligendi facere neque? Voluptatum officiis quisquam ratione sit dolore reiciendis itaque facilis expedita consectetur tempore! Culpa doloremque, eaque eos modi facilis quisquam veritatis amet nesciunt aut dolorum, consectetur voluptas commodi in fugiat velit? Explicabo soluta autem esse incidunt. Officiis sint nostrum voluptatum possimus, obcaecati tenetur reiciendis odio eaque debitis provident aliquid. Reprehenderit quaerat molestias id. Quidem autem perferendis harum tenetur adipisci!</p>
            </div>
        </div>
    </div>
</div>

<div class="py-5" style="background-color: black;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="mb-5" src="assets/images/19.png" alt="logo" height="150px" width="250px"><br>
                <a class="mb-1" style="text-decoration: none ;color: #2ab8ec;" href="index.php"> <i class="fa fa-angle-right"></i> Home</a><br>
                <a class="mb-1" style="text-decoration: none ;color: #2ab8ec;" href="#"> <i class="fa fa-angle-right"></i> About Us</a><br>
                <a class="mb-1" style="text-decoration: none ;color: #2ab8ec;" href="cart.php"> <i class="fa fa-angle-right"></i> Cart</a><br>
                <a class="mb-1" style="text-decoration: none ;color: #2ab8ec;" href="categories.php"> <i class="fa fa-angle-right"></i> Categories</a>
            </div>
            <div class="col-md-3">
                <br>
                <h4 style="color: #2ab8ec;">Address</h4>
                <p style="color: #2ab8ec;">
                    #25, Ground Floor,
                    2nd Street, <br> Ganzour, 
                    Munofia, Egypt 
                </p>
                <br><br><br>
                <a class="mb-1" style="text-decoration: none ;color: #2ab8ec;" href="tel:+201120981600"><i class="fa fa-phone"></i> +20 1120 981 600</a><br>
                <a class="mb-1" target="_blank" style="text-decoration: none ;color: #2ab8ec;" href="http://www.facebook.com/cap.wesoo.3/"><i class="fa fa-facebook"> </i> Facebook Page</a><br>
                <a class="mb-1" target="_blank" style="text-decoration: none ;color: #2ab8ec;" href="mailto:wessamaleskandrany0330@gmail.com"><i class="fa fa-envelope"> </i> Send Email</a>
            </div>
            <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d698.1382475911787!2d31.038184707532206!3d30.67651160721422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7cfd21525ff79%3A0x52fb1a29157805d3!2zTTJHUStHNDPYjCDYrNmG2LLZiNix2Iwg2YXYsdmD2LIg2KjYsdmD2Kkg2KfZhNiz2KjYudiMINin2YTZhdmG2YjZgdmK2Kk!5e1!3m2!1sar!2seg!4v1681876201458!5m2!1sar!2seg" class="w-100" height="280" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. copyright @ wessam_aleskandrany - <?= date('m') ?> / 20<?= date('y') ?></p>
    </div>
</div>

<?php include("includes/footer.php"); ?>
<script>
    $(document).ready(function (){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        })
    })
</script>
