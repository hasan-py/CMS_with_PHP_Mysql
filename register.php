<!-- Connection -->
<?php session_start(); ?>
<?php
include "./includes/db.php";
?>

<!-- Header -->
<?php
include "./includes/header.php";
?>

<!-- Navigation -->
<?php
include "./includes/navigation.php";
?>

<?php 
    if(isset($_SESSION['loginCMS'])){
        header('Location: index.php');
    }
 ?>


<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Register</h1>
                <hr>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" id="username" class="form-control" type="text" required>
                    </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" id="email" class="form-control" type="email" required>
                    </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" id="password" class="form-control" type="password" required>
                    </div>
                     <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input name="confirmPassword" id="confirmPassword" class="form-control" type="password" required>
                    </div>
                    <button style="background:black;color:white" name="submit" type="submit" class="btn btn-block btn-dark">Register</button>
                </form>
            </div>
    </div>
</div>
</main>

<!-- <footer>
    <p>copyright <?php echo date("Y") ?> Developed by Hasan-py</p>
</footer> -->




<?php 

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $username = mysqli_real_escape_string($connection,$username);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);
    $confirmPassword = mysqli_real_escape_string($connection,$confirmPassword);
    $salt = "hasan21890255sfasjfajf";

    if($password!==$confirmPassword){
        echo '<script>alert("Your password doesnot match")</script>';
    }
    
    if(empty($username) && empty($email) && empty($password) && empty($confirmPassword)){
       echo '<script>alert("field must not be empty")</script>'; 
    }else{
        $validPassword = md5($password);
        $insertQuery = "INSERT INTO users VALUES('','{$username}','{$validPassword}','{$email}','','','','','{$salt}',now())";
        $result = mysqli_query($connection,$insertQuery);
        if($result){
            echo '<script>alert("Account Register Successfully.")</script>';
        }
    }

}

?>
