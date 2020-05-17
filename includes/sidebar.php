<aside class="col-md-4 col-sm-8 col-xs-8">
    <div class="sidebar">

        <!-- search option -->
        
        <?php
            
        ?>

        <div class="search-widget">
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
            <div class="margin-bottom-sm">
                <ul style="list-style-type:none;">
                    <?php
                        $query_categories = "SELECT * FROM `categories`";
                        $res_categories = mysqli_query($connection,$query_categories);
                        while ($row = mysqli_fetch_assoc($res_categories)){
                            $cat_title = $row["cat_title"];
                    ?>
                    <li><a href="#"><?php echo $cat_title; ?></a></li>
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

    </div>
</aside> 