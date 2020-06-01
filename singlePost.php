<!-- Connection -->

<?php
include "./includes/db.php";
session_start();
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

                <article class="single-blog-item">

                    <?php 
                    if(isset($_GET['p_id'])){
                        $p_id =  $_GET['p_id'];

                        $singlePostQuery = "SELECT * FROM `posts` WHERE post_id={$p_id}";
                        $singlePostQueryResult = mysqli_query($connection,$singlePostQuery);
                        if($singlePostQueryResult){
                            while($row = mysqli_fetch_assoc($singlePostQueryResult)){
                                $post_id =  $row['post_id'];
                                $post_category_id = $row['post_category_id'];
                                $post_title = $row['post_title'];
                                $post_date = $row['post_date'];
                                $post_author = $row['post_author'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
                                $post_status = $row['post_status'];

                                ?>


                                <div class="alert alert-info">
                                    <a href="index.php">home</a>,
                                    <?php 
                                    $categoryQuery = "SELECT cat_title FROM `categories` WHERE cat_id={$post_category_id}";
                                    $categoryQueryResult = mysqli_query($connection,$categoryQuery);
                                    while ($row = mysqli_fetch_assoc($categoryQueryResult)){
                                        $get_Category = $row["cat_title"];
                                        echo "<a href='category.php?category_id={$post_category_id}'>{$get_Category}</a>,";
                                    }
                                    ?>
                                    <?php echo $post_status ?>
                                    <time><?php echo $post_date ?></time>
                                    by
                                    <time><?php echo $post_author ?></time>
                                </div>

                                <h1><?php echo $post_title ?></h1>

                                
                                <?php 
                                
                                if(isset($_SESSION['loginCMS'])){
                                ?>
                                 
                                 <div style="margin-bottom:10px;">     
                                <a style="background:black;color:white;" class="btn btn-dark" href="admin/post.php?source=edit_post&p_id=<?php echo $post_id ?>">Edit Post</a>
                                 </div>

                            <?php } ?>

                                <img style="width:500px;" id="img" class="img-responsive" src="./image/<?php echo $post_image ?>" alt="">
                                <hr>
                                <p>
                                    <?php echo $post_content ?>
                                </p>
                                <p><strong>Tags</strong> : <?php echo $post_tags ?></p>
                            </article>
                        <?php }
                    }
                    else{
                        die("query Failed".mysqli_error($connection));
                    }
                }
                ?>

                <h4>Related Articles</h4>
                <div class="related-articles">
                    <div class="alert alert-info">
                        <a href="http://themewagon.com">Free HTML5 Website Templates </a>
                    </div>
                </div>

                <div class="author">
                    <p>Written by <strong class="text-capitalize"><?php echo $post_author ?></strong></p>
                    <p> 
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                

                <?php 
                if(isset($_POST['create_comment'])){
                    $p_id =  $_GET['p_id'];
                    $authorName = $_POST['authorName'];
                    $email = $_POST['email'];
                    $comment = $_POST['comment'];
                    
                    $commentQuery = "INSERT INTO `comments`(`comment_post_id`, `comment_author`, `comment_email`, `comment_status`, `comment_date`, `comment_content`) VALUES ({$p_id},'{$authorName}','{$email}','unapproved',now(),'{$comment}')";
                    $commentQueryResult = mysqli_query($connection,$commentQuery);
                    if (!$commentQueryResult){
                        die("doen't insert".mysqli_error($connection));
                    }
                    
                    $commentCountQuery = "UPDATE `posts` SET `post_comment_count` = post_comment_count+1 WHERE post_id =$p_id";
                    $commentCountQueryResult = mysqli_query($connection,$commentCountQuery);
                    if (!$commentCountQueryResult){
                        die(mysqli_error($connection));
                    }

                    ?>
                    <?php }?>



                <div class="comment-post">
                    <h1>post a comment</h1>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  name="authorName" type="text" class="form-control" id="name" required="required" placeholder="Author Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" id="email" required="required" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea name="comment" type="text" class="form-control" id="comment" rows="5" required="required" placeholder="Type here comment"></textarea>
                            </div>
                        </div>
                        <button type="submit" id="submit" name="create_comment" class="btn btn-cmnt">post comment</button>
                        </div>

                    </form>
                </div>

                <div class="feedback">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>feedback</h1>
                            
                            <?php 
                                
                            ?>
                            <?php
                            $p_id =  $_GET['p_id'];
                            $getApprovedCommentQuery = "SELECT * FROM `comments` WHERE comment_post_id=$p_id and comment_status='approved' ORDER BY comment_id DESC";

                            $getApprovedCommentQueryRes = mysqli_query($connection,$getApprovedCommentQuery);
                            while ($row = mysqli_fetch_assoc($getApprovedCommentQueryRes)){
                                $comment_id = $row['comment_id'];
                                $comment_author = $row['comment_author'];
                                $comment_content = $row['comment_content'];
                                $comment_date = $row['comment_date'];
                            ?>

                            <div class="cmnt-clipboard"><span class="btn-clipboard">Reply</span></div>
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="assets/img/commenter2.jpg" class="img-responsive center-block">
                                    </div>
                                    <div class="col-md-10">
                                        <p class="comment-info">
                                            <strong><?php echo $comment_author; ?></strong> <span><?php echo $comment_date; ?></span>
                                        </p>
                                        <p>
                                            <?php echo $comment_content; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </section>



        </div>
    </div> <!-- end of /.container -->
</main>


<!--  Necessary scripts  -->

<script type="text/javascript" src="assets/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jQuery.scrollSpeed.js"></script>

<!-- smooth-scroll -->

<script>
    $(function() {  
        jQuery.scrollSpeed(100, 1000);
    });
</script>

</body>
</html>




