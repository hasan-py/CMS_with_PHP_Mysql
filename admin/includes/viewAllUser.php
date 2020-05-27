 <div class="card my-4 mx-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Change Role</th>
                        <th>Role</th>
                        <th>Id</th>
                        <th>UserName</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Join Date</th>
                        <th>randsolt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `users`";
                    $res_users = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($res_users)){
                        $user_id = $row["user_id"];
                        $username = $row["username"];
                        $user_firstname = $row["user_firstname"];
                        $user_laststname = $row["user_lastname"];
                        $user_email = $row["user_email"];
                        $user_image = $row["user_image"];
                        $user_role = $row["user_role"];
                        $user_joindate = $row["user_joindate"];
                        $randsolt = $row["randsolt"];
                        ?>
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-info" href="users.php?source=edit_user&u_id=<?php echo $user_id; ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="users.php?delete=<?php echo $user_id; ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="users.php?admin=<?php echo $user_id; ?>">Admin</a>
                                <a class="btn btn-sm btn-danger" href="users.php?subscriber=<?php echo $user_id; ?>">Subscriber</a>
                            </td>
                                <td><?php echo $user_role ?></td>
                                <td><?php echo $user_id ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $user_firstname ?></td>
                                <td><?php echo $user_laststname ?></td>
                                <td><?php echo $user_email ?></td>
                                <td><?php echo $user_image ?></td>
                                <td><?php echo $user_joindate ?></td>
                                <td><?php echo $randsolt ?></td>

                              <!--   <?php
                                $query = "SELECT * FROM `posts` WHERE post_id=$comment_post_id";
                                $res_posts = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($res_posts)){
                                    $post_id = $row["post_id"];
                                    $post_title = substr($row["post_title"],0,30);
                                    echo  "<td><a href='../singlePost.php?p_id={$post_id}'>$post_title</a></td>";
                                }
                                ?>
                                <td><?php echo $comment_email ?></td>
                                <td><?php echo $comment_date ?></td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php 
    if(isset($_GET['delete'])){
        $user_delete_id = $_GET['delete'];
        $userDeleteQuery = "DELETE FROM `users` WHERE user_id=$user_delete_id";
        $userDeleteQuery_res = mysqli_query($connection,$userDeleteQuery);
        if($userDeleteQuery_res){
            header("Location:users.php");
            exit;
        }

    }
    
    if(isset($_GET['admin'])){
        $user_admin_id = $_GET['admin'];
        $userAdminQuery = "UPDATE `users` SET user_role='admin' WHERE user_id=$user_admin_id";
        $userAdminQuery_res = mysqli_query($connection,$userAdminQuery);
        if($userAdminQuery_res){
            header("Location:users.php");
            exit;
        }

    }
    
    if(isset($_GET['subscriber'])){
        $user_admin_id = $_GET['subscriber'];
        $userAdminQuery = "UPDATE `users` SET user_role='subscriber' WHERE user_id=$user_admin_id";
        $userAdminQuery_res = mysqli_query($connection,$userAdminQuery);
        if($userAdminQuery_res){
            header("Location:users.php");
            exit;
        }

    }


    ?>