 <div class="card my-4 mx-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>PubDate</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Tags</th>
                        <th>Comment Count</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * FROM `posts`";
                    $res_posts = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($res_posts)){
                        $post_id = $row["post_id"];
                        $post_category_id = $row["post_category_id"];
                        $post_title = substr($row["post_title"],0,30);
                        $post_author = $row["post_author"];
                        $post_date = $row["post_date"];
                        $post_image = $row["post_image"];
                        $post_content = substr($row["post_content"],0,30);
                        $post_tags = $row["post_tags"];
                        $post_comment_count = $row["post_comment_count"];
                        $post_status = $row["post_status"];
                        ?>
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-info" href="post.php?source=edit_post&p_id=<?php echo $post_id; ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="post.php?delete=<?php echo $post_id; ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td><?php echo $post_id ?></td>
                            <td><a href='../singlePost.php?p_id=<?php echo $post_id ?>'><?php echo $post_title ?></td>
                            
                            <?php 
                                $categoryQuery = "SELECT cat_title FROM `categories` WHERE cat_id={$post_category_id}";
                                $categoryQueryResult = mysqli_query($connection,$categoryQuery);
                                while ($row = mysqli_fetch_assoc($categoryQueryResult)){
                                    $get_Category = $row["cat_title"];
                                    echo "<td>{$get_Category}</td>";
                                }
                            ?>

                            
                            <td><?php echo $post_author ?></td>
                            <td><?php echo $post_date ?></td>
                            <td><?php echo "<img style='height:50px;' class='img-responsive' src='../image/$post_image' alt=''>"; ?></td>
                            <td><?php echo $post_content ?>...</td>
                            <td><?php echo $post_tags ?></td>
                            <td><?php echo $post_comment_count ?></td>
                            <td><?php echo $post_status ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php 
if(isset($_GET['delete'])){
    $post_delete_id = $_GET['delete'];
    $postDeleteQuery = "DELETE FROM `posts` WHERE post_id={$post_delete_id}";
    $postDeleteQuery_res = mysqli_query($connection,$postDeleteQuery);
    header("Location: post.php");
}
?>