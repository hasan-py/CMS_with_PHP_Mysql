
<?php 

if(isset($_POST['create_user'])){
  $username =  $_POST['username'];
  $user_password =  $_POST['user_password'];
  $user_firstname =  $_POST['user_firstname'];
  $user_lastname =  $_POST['user_lastname'];
  // $user_image =  $_POST['user_image'];
  $user_email =  $_POST['user_email'];
  $user_role =  $_POST['user_role'];

  // $post_image =  $_FILES['image']['name'];
  // $post_image_temp =  $_FILES['image']['tmp_name'];

  // move_uploaded_file($post_image_temp, "../image/$post_image");

  $createUserQuery = "INSERT INTO `users` ( `username`, `user_password`, `user_email`, `user_firstname`, `user_lastname`,`user_role`,`user_joindate`) VALUES ('{$username}', '{$user_password}', '{$user_email}', '{$user_firstname}', '{$user_lastname}', '{$user_role}',now())";
  
  $createUserQueryResult = mysqli_query($connection,$createUserQuery);
  
  if(!$createUserQueryResult){
    echo '<h1>Please Insert valid Letter in form</h1>';
  }
  header('Location: users.php');
  exit;

}

?>


<div class="mx-4">
  <a href="users.php">Back Users</a>
  <h3>Create User</h3>
  <hr>
  <form method="POST" action="" enctype="multipart/form-data" class="form-group">
    <div class="form-group">
      <label for="username">Username</label>
      <input name="username" type="text" class="form-control col-md-8" id="username" placeholder="Enter username" required>
    </div>


    <div class="form-group">
      <label for="user_firstname">First Name</label>
      <input name="user_firstname" type="text" class="form-control col-md-8" id="user_firstname" placeholder="Enter First Name" required>
    </div>
<!-- 
    <div class="form-group">
      <label for="post_image">Post Image</label>
      <input name="image" type="file" class="form-control-file col-md-8" id="post_image" required>
    </div>
  -->

  <div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input name="user_lastname" type="text" class="form-control col-md-8" id="user_lastname" placeholder="Enter Last Name" required>
  </div>


  <div class="form-group">
    <label for="user_email">Email</label>
    <input name="user_email" type="email" class="form-control col-md-8" id="user_email" placeholder="Enter Your Email" required>
  </div>

  <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" name="user_password" class="form-control col-md-8" id="user_password" rows="3" placeholder="Enter Your Password" required></input>
  </div>

  <div class="form-group">
    <label for="user_role">Role</label>
    <select id="user_role" name="user_role" class="form-control col-md-8">
      <option value="subscriber">select option</option>
      <option value="admin">admin</option>
      <option value="subscriber">subscriber</option>
    </select>
  </div>

<button type="submit" name="create_user" class="btn btn-dark btn-block col-md-8">Create User</button>

</form>
</div>

