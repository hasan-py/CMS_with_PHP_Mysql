<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">PHP Blog</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                PHP Blog
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <?php

                $query_categories = "SELECT * FROM `categories`";
                $res_categories = mysqli_query($connection,$query_categories);
                while ($row = mysqli_fetch_assoc($res_categories)){
                    $cat_title = $row["cat_title"];
                    $cat_id = $row["cat_id"];
                    echo "<li><a href='category.php?category_id={$cat_id}'>$cat_title</span></a></li>" ;
                }
                ?>
                <li><a href='admin'>admin</span></a></li>
                <?php 
                    if(!isset($_SESSION['loginCMS'])){
                 ?>
                <li><a href='register.php'>Register</span></a></li>
            <?php } ?>
            </ul>
        </div><!-- end of /.navbar-collapse -->
    </div><!-- end of /.container -->
</nav>