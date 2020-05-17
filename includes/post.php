<?php
$query_posts = "SELECT * FROM `posts`";
$res_posts = mysqli_query($connection,$query_posts);
while ($row = mysqli_fetch_assoc($res_posts)){
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
            <a href="single_blog_page.html">
                <img src="image/<?php echo $post_image; ?>" class="img-thumbnail center-block" alt="Blog Post Thumbnail">
            </a>
        </div>
        <div class="col-md-9">
            <p>
                Posted By 
                <a href="html5-templates.html"><?php echo $post_author; ?></a>
                ,
                <a href="#"><?php echo $post_tags; ?></a>
                <time><?php echo $post_date; ?><time>
                </p>
                <h1>
                    <a href="single_blog_page.html"><?php echo $post_title; ?></a>
                </h1>
                <p><?php echo $post_content; ?></p>
            </div>
        </div>
    </article>
<?php } ?>
