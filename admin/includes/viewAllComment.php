 <div class="card my-4 mx-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Aproved</th>
                        <th>Unaproved</th>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>In Response to</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `comments`";
                    $res_comments = mysqli_query($connection,$query);
                    echo 'Comment Found';
                    while ($row = mysqli_fetch_assoc($res_comments)){
                        $comment_id = $row["comment_id"];
                        $comment_post_id = $row["comment_post_id"];
                        $comment_author = substr($row["comment_author"],0,30);
                        $comment_email = $row["comment_email"];
                        $comment_date = $row["comment_date"];
                        $comment_status = $row["comment_status"];
                        $comment_content = substr($row["comment_content"],0,30);
                        ?>
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-info" href="post.php?source=edit_post&p_id=<?php echo $post_id; ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="post.php?delete=<?php echo $post_id; ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td>a</td>
                            <td>u</td>
                            <td><?php echo $comment_id ?></td>
                            <td><?php echo $comment_author ?></td>
                            <td><?php echo $comment_content ?></td>
                            <td>some text</td>
                            <td><?php echo $comment_email ?></td>
                            <td><?php echo $comment_date ?></td>
                            <td><?php echo $comment_status ?></td>
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