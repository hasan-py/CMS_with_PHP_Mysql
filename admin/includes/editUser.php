
<?php 

if(isset($_GET['u_id'])){
  $user_id = $_GET['u_id'];
  $query = "SELECT * FROM `users` WHERE user_id={$user_id}";
  $res_user = mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($res_user)){
    $user_id = $row["user_id"];
    $username = $row["username"];
    $user_password = $row["user_password"];
    $user_email = $row["user_email"];
    $user_firstname = $row["user_firstname"];
    $user_lastname = $row["user_lastname"];
    $user_image = $row["user_image"];
    $user_role = $row["user_role"];
    $randsolt = $row["randsolt"];
    $user_joindate = $row["user_joindate"];
  

    $user_password = md5($user_password);

  }
}

if(isset($_POST['edit_user'])){
  $UpUsername =  $_POST['username'];
  $Upuser_password =  md5($_POST['user_password']);
  $Upuser_firstname =  $_POST['user_firstname'];
  $Upuser_lastname =  $_POST['user_lastname'];
  // $user_image =  $_POST['user_image'];
  $Upuser_email =  $_POST['user_email'];
  $Upuser_role =  $_POST['user_role'];
  
  $salt = "hasan21890255sfasjfajf";
  $Upuser_password = crypt($Upuser_password,$salt);


  $editQuery = "UPDATE users SET username='{$UpUsername}', user_firstname='{$Upuser_firstname}',user_lastname='{$Upuser_lastname}',user_role='{$Upuser_role}',user_password='{$Upuser_password}',user_email='{$Upuser_email}' WHERE user_id=$user_id ";
  
  $editQueryRes = mysqli_query($connection,$editQuery);
  if($editQueryRes){
    header('Location: users.php');
    exit;
  }
  else{
    die(mysqli_error($connection));
  }

}


?>


<div class="mx-4">
  <a href="users.php">Back Users</a>
  <h3>Edit User</h3>
  <hr>
  <form method="POST" action="" enctype="multipart/form-data" class="form-group">
    <div class="form-group">
      <label for="username">Username</label>
      <input value="<?php echo $username ?>" name="username" type="text" class="form-control col-md-8" id="username" placeholder="Enter username" required>
    </div>


    <div class="form-group">
      <label for="user_firstname">First Name</label>
      <input value="<?php echo $user_firstname ?>" name="user_firstname" type="text" class="form-control col-md-8" id="user_firstname" placeholder="Enter First Name" required>
    </div>
<!-- 
    <div class="form-group">
      <label for="post_image">Post Image</label>
      <input name="image" type="file" class="form-control-file col-md-8" id="post_image" required>
    </div>
  -->

  <div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input value="<?php echo $user_lastname ?>" name="user_lastname" type="text" class="form-control col-md-8" id="user_lastname" placeholder="Enter Last Name" required>
  </div>


  <div class="form-group">
    <label for="user_email">Email</label>
    <input value="<?php echo $user_email ?>" name="user_email" type="email" class="form-control col-md-8" id="user_email" placeholder="Enter Your Email" required>
  </div>

  <div class="form-group">
    <label for="user_password">Password</label>
    <input value="<?php echo $user_password ?>" type="password" name="user_password" class="form-control col-md-8" id="user_password" rows="3" placeholder="Enter Your Password" required></input>
  </div>

  <div class="form-group">
    <label for="user_role">Role</label>
    <select id="user_role" name="user_role" class="form-control col-md-8">
        <option value="<?php echo $user_role; ?>" selected><?php echo $user_role; ?></option>
        <?php 
          if($user_role=="admin"){
            echo "<option value='subscriber'>subscriber</option>";
          }
          else if($user_role=="subscriber"){
            echo "<option value='admin'>admin</option>";
          }
         ?>
      </select>
  </div>

<button type="submit" name="edit_user" class="btn btn-dark btn-block col-md-8">Update User</button>

</form>
</div>

