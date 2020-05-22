<!-- Connection -->

<?php
include "includes/db.php";
?>

<!-- Header -->
<?php
include "includes/header.php";
?>

<!-- Navigation -->
<?php
include "includes/navigation.php";
?>



<main>
    <div style="min-height: 550px;" class="container">
        <div class="row">

            <!-- blog-contents -->
            <section class="col-md-8">

                <?php
                
                if(isset($_POST['submit'])){
                    $search = $_POST['search'];
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $searchQuery = mysqli_query($connection,$query);

                    if(!$searchQuery){
                        die("Query Failed".mysqli_error($connection));
                    }
                    elseif ($count = mysqli_num_rows($searchQuery) > 0) {
                     while ($row = mysqli_fetch_assoc($searchQuery)){
                        $post_id = $row["post_id"];
                        $post_category_id = $row["post_category_id"];
                        $post_title = $row["post_title"];
                        $post_author = $row["post_author"];
                        $post_date = $row["post_date"];
                        $post_content = $row["post_content"];
                        $post_image = $row["post_image"];
                        $post_tags = $row["post_tags"];
                        
                        ?>
                        <article class="blog-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="singlePost.php?p_id=<?php echo $post_id; ?>">
                                        <img src="image/<?php echo $post_image; ?>" class="img-thumbnail center-block" alt="Blog Post Thumbnail">
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p>
                                        Posted By 
                                        <a href="singlePost.php?p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                                        ,
                                        <a href="#"><?php echo $post_tags; ?></a>
                                        <time><?php echo $post_date; ?><time>
                                        </p>
                                        <h1>
                                            <a href="singlePost.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                                        </h1>
                                        <p><?php echo substr($post_content,0,100)."..."; ?></p>
                                        <p><strong>Tags</strong> : <?php echo $post_tags ?></p>
                                    </div>
                                </div>
                            </article>
                        <?php } 
                    }
                    else {
                        echo '<h1>No Result</h1>';
                    }

                } 

                ?>       
                    <!-- pagination -->
                    <div class="page-turn">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <nav>
                                    <ul class="pagination pagination-sm">
                                        <li class="disabled">
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">Prev</span>
                                            </a>
                                        </li>
                                        <li class="active"><a href="index.html">1</a></li>
                                        <li><a href="page2.html">2</a></li>
                                        <li><a href="page3.html">3</a></li>
                                        <li><a href="page4.html">4</a></li>
                                        <li><a href="page5.html">5</a></li>
                                        <li>
                                            <a href="page6.html" aria-label="Next">
                                                <span aria-hidden="true">Next</span>
                                            </a>
                                        </li>
                                    </ul> 
                                </nav>
                            </div>
                        </div>
                    </div> <!-- /.page-turn -->
                </section>
                

                <!-- sidebar -->
                <?php
                include "includes/sidebar.php";
                ?>
            

            </div>
        </div> <!-- end of /.container -->
    </main>
