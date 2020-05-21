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
                <a href="singlePost.php?p_id=<?php echo $post_id; ?>">
                    <img src="image/<?php echo $post_image; ?>" class="img-thumbnail center-block" alt="Blog Post Thumbnail">
                </a>
            </div>
            <div class="col-md-9">
                <p>
                    Posted By 
                    <a href="singlePost.php?p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                    ,
                    <?php 
                    $categoryQuery = "SELECT cat_title FROM `categories` WHERE cat_id={$post_category_id}";
                    $categoryQueryResult = mysqli_query($connection,$categoryQuery);
                    while ($row = mysqli_fetch_assoc($categoryQueryResult)){
                        $get_Category = $row["cat_title"];
                        echo "<a href='index.php'>{$get_Category}</a>,";
                    }
                    ?>
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
    <?php } ?>
