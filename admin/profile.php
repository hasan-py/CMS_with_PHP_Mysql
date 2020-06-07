<?php include "./includes/header.php" ?>
<?php include "./includes/navigation.php" ?>
<?php ob_start(); ?>
<!-- this is for sideNav bar -->
<?php include "./includes/sidebarNav.php" ?>
<?php include "./function.php" ?>



<?php 
if(!isset($_SESSION['loginCMS'])){
    header('Location: ../index.php');
}

?>


<div id="layoutSidenav_content">
    <main>
            <div class="container-fluid">
                <h1 class='mt-4'>Profile</h1>
                <ol class='breadcrumb mb-4'>
                    <li class='breadcrumb-item'><a href='/cms/admin/index.php'>Dashboard</a></li>
                    <li class='breadcrumb-item active'>Profile</li></ol></div>




<?php 

if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
  $query = "SELECT * FROM `users` WHERE user_id={$user_id}";
  $res_user = mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($res_user)){
    $user_id = $row["user_id"];
    $username = $row["username"];
    $user_password = $row["user_password"];
    $user_password = md5($user_password);
    $user_email = $row["user_email"];
    $user_firstname = $row["user_firstname"];
    $user_lastname = $row["user_lastname"];
    $user_image = $row["user_image"];
    $user_role = $row["user_role"];
    $randsolt = $row["randsolt"];
    $user_joindate = $row["user_joindate"];
  }
}

if(isset($_POST['edit_user'])){
  $UpUsername =  $_POST['username'];
  $Upuser_password =  md5($_POST['user_password']);
  $Upuser_firstname =  $_POST['user_firstname'];
  $Upuser_lastname =  $_POST['user_lastname'];
  // $user_image =  $_POST['user_image'];
  $Upuser_email =  $_POST['user_email'];

  
  $editQuery = "UPDATE users SET username='{$UpUsername}', user_firstname='{$Upuser_firstname}',user_lastname='{$Upuser_lastname}',user_password='{$Upuser_password}',user_email='{$Upuser_email}' WHERE user_id=$user_id ";
  
  $editQueryRes = mysqli_query($connection,$editQuery);
  if($editQueryRes){
    header('Location: profile.php');
    exit;
  }
  else{
    die(mysqli_error($connection));
  }

}


?>


<div class="mx-4">

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

<button type="submit" name="edit_user" class="btn btn-dark btn-block col-md-8">Update Profile</button>

</form>
</div>


















    <!-- Footer Part -->
    <?php include "./includes/footer.php" ?>





