
<aside class="col-md-4 col-sm-8 col-xs-8">
    <div class="sidebar">

        <?php 
        if(isset($_SESSION['login'])==null){
           ?>
           <!-- Login Form -->
           <div style="margin-left:40px;" class="search-widget">
            <h3>Login</h3>
            <form id="my_form" action="./includes/login.php" method="POST">    
                <div class="form-group">
                    <input name="log_username" class="form-control" type="text" placeholder="Enter Your username">
                </div>
                <div class="form-group">
                    <input name="log_password" class="form-control" type="password" placeholder="Enter Your password">
                </div>
                <button name="loginSubmit" type="submit" style="background:black;color:white;" class="btn btn-dark btn-block">Login</button>
            </form>
        </div>
    <?php } ?>

    <!-- search option -->
    <div style="margin-left:40px;" class="search-widget">
        <h3>Blog Search</h3>
        <form id="my_form" action="search.php" method="POST">    
            <div class="input-group margin-bottom-sm">
                <input name="search" class="form-control" type="text" placeholder="Search here">
                <button name="submit" type="submit" style="background:black;color:orange;" class="btn"><i class="fa fa-search fa-fw"></i></button>
            </div>
        </form>
    </div>

    <!-- Category -->
    <div class="subscribe-widget">
        <h4 class="text-capitalize text-center">
            Category
        </h4>
        <div class="margin-bottom-sm list-group">
            <ul style="list-style-type:none;">
                <?php
                $query_categories = "SELECT * FROM `categories`";
                $res_categories = mysqli_query($connection,$query_categories);
                while ($row = mysqli_fetch_assoc($res_categories)){
                    $cat_title = $row["cat_title"];
                    $cat_id = $row["cat_id"];
                    ?>
                    <li class="list-group-item"><a href="category.php?category_id=<?php echo $cat_id ?>"><?php echo $cat_title; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <!-- sidebar share button -->
    <div class="share-widget hidden-xs hidden-sm">
        <ul class="social-share text-center">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul> <!-- /.sidebar-share-button -->
    </div> <!-- /.share-widget -->

    <div style="margin-left:40px;">
        <hr>
        &copy; <?php echo date("Y"); ?> PHP BLOG | Develop by Hasan-py
    </div>
</div>
</aside> 