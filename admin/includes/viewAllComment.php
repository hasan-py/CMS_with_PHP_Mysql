 <div class="card my-4 mx-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Permisson</th>
                        <th>Status</th>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>In Response to</th>
                        <th>Email</th>
                        <th>Date</th>
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
                                <a class="btn btn-sm btn-danger" href="comments.php?delete=<?php echo $comment_id; ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="comments.php?approved=<?php echo $comment_id; ?>"><i class="fas fa-check-square"></i></a>
                                <a class="btn btn-sm btn-danger" href="comments.php?unapproved=<?php echo $comment_id; ?>"><i class="fas fa-ban"></i></a>
                            </td>
                                <td><?php echo $comment_status ?></td>
                                <td><?php echo $comment_id ?></td>
                                <td><?php echo $comment_author ?></td>
                                <td><?php echo $comment_content ?></td>

                                <?php
                                $query = "SELECT * FROM `posts` WHERE post_id=$comment_post_id";
                                $res_posts = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($res_posts)){
                                    $post_id = $row["post_id"];
                                    $post_title = substr($row["post_title"],0,30);
                                    echo  "<td><a href='../singlePost.php?p_id={$post_id}'>$post_title</a></td>";
                                }
                                ?>
                                <td><?php echo $comment_email ?></td>
                                <td><?php echo $comment_date ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php 
    if(isset($_GET['delete'])){
        $comment_delete_id = $_GET['delete'];
        $commentDeleteQuery = "DELETE FROM `comments` WHERE comment_id=$comment_id";
        $commentDeleteQuery_res = mysqli_query($connection,$commentDeleteQuery);
        if($commentDeleteQuery_res){
            header("Location:comments.php");
            exit;
        }

    }
    
    if(isset($_GET['approved'])){
        $comment_approved_id = $_GET['approved'];
        $commentApprovedQuery = "UPDATE `comments` SET comment_status='approved' WHERE comment_id=$comment_approved_id";
        $commentApprovedQuery_res = mysqli_query($connection,$commentApprovedQuery);
        if($commentApprovedQuery_res){
            header("Location:comments.php");
            exit;
        }

    }
    
    if(isset($_GET['unapproved'])){
        $comment_unapproved_id = $_GET['unapproved'];
        $commentUnapprovedQuery = "UPDATE `comments` SET comment_status='unapproved' WHERE comment_id=$comment_unapproved_id";
        $commentUnapprovedQuery_res = mysqli_query($connection,$commentUnapprovedQuery);
        if($commentUnapprovedQuery_res){
            header("Location:comments.php");
            exit;
        }

    }


    ?>