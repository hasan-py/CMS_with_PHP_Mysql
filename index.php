<!-- Connection -->
<?php session_start(); ?>
<?php
include "./includes/db.php";
?>

<!-- Header -->
<?php
include "./includes/header.php";
?>

<!-- Navigation -->
<?php
include "./includes/navigation.php";
?>



<main>
    <div class="container">
        <div class="row">

            <!-- blog-contents -->
            <section class="col-md-8">
                


                <?php 
                $perPage = 2;
                $post_query_count = "SELECT * FROM posts";
                $find_count = mysqli_query($connection,$post_query_count);
                $count = mysqli_num_rows($find_count);
                $count = ceil($count/ $perPage);
                
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = "";
                }

                if($page == "" || $page == 1 || $page == 0){
                    $page_1 = 0;
                }else{
                    $page_1 = ($page * $perPage) - $perPage;
                }

                ?>



                <?php
                include "includes/post.php";
                ?>  
                <!-- pagination -->
                
                <div class="page-turn">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <nav>
                                <ul class="pagination pagination-sm">

                                    <?php 
                                        if(isset($_GET['page'])){
                                            if($_GET['page']==0){
                                            ?>
                                                <li class="disabled">
                                        <a href="" aria-label="Previous">
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li>
                                    <?php
                                     }
                                     else{ ?>
                                    <li class="">
                                        <a href="index.php?page=<?php echo $_GET['page']-1 ?>" aria-label="Previous">
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li>
                                <?php } } ?>
                                    <?php 
                                        
                                        for ($i=1; $i<=$count;$i++){
                                            if($i == $page){
                                                echo "<li><a style='background:black;color:orange;' href='index.php?page={$i}'>{$i}</a></li>";
                                            }
                                            else{
                                            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                            }
                                        }

                                    ?>
<!--                                     <li class="active"><a href="index.html">1</a></li>
                                    <li><a href="page2.html">2</a></li>
                                    <li><a href="page3.html">3</a></li>
                                    <li><a href="page4.html">4</a></li>
                                    <li><a href="page5.html">5</a></li> -->
<!--                                     <li>
                                        <a href="page6.html" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                        </a>
                                    </li> -->
                                </ul> 
                            </nav>
                        </div>
                    </div>
                </div> <!-- /.page-turn -->
            </section>

            <section>
                <!-- sidebar -->

                
                <aside class="col-md-4 col-sm-8 col-xs-8">
                    <div class="sidebar">

                        <?php 
                        if(!isset($_SESSION['loginCMS'])){
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

                    <!-- Search and Category -->
                    <?php include "includes/sidebar.php"; ?>

                </div>
            </aside>

        </section>

    </div>
</div> <!-- end of /.container -->
</main>

