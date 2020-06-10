<?php include "./includes/header.php" ?>
<?php include "./includes/navigation.php" ?>

<?php 

if(!isset($_SESSION['loginCMS'])){
	header('Location: ../index.php');
}

?>

<?php 

$session = session_id();
$time = time();
$time_out_in_secound = 60;
$time_out = $time - $time_out_in_secound;

$query = "SELECT * FROM usersonline WHERE session='{$session}' ";
$send_query = mysqli_query($connection,$query);
$count = mysqli_num_rows($send_query);

if($count == NULL){
    mysqli_query($connection,"INSERT INTO usersonline(session,time) VALUES('{$session}','{$time}')");
}
else{
    mysqli_query($connection,"UPDATE usersonline SET time='{$time}' WHERE session = '{$session}' ");
}

$usersOnline = mysqli_query($connection,"SELECT * FROM usersonline WHERE time > '{$time_out}' ");
$count_user = mysqli_num_rows($usersOnline);


?>

<!-- this is for sideNav bar -->
<?php include "./includes/sidebarNav.php" ?>
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<?php 
			if(isset($_SESSION['user_firstname']) && isset($_SESSION['user_lastname'])){
				?>
				<div class="mt-4">
					<div class="row">	
					<h1 class="col-md-6 col-sm-12 d-flex">Welcome,<?php echo $_SESSION['user_firstname']." ".$_SESSION['user_lastname']; ?></h1>
					<h5 class="col-md-6 col-sm-12 d-flex font-weight-light">Today,<?php echo date('l jS \of F Y h:i:s A'); ?></h5>
					</div>	
				</div>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			<?php }?>
			
<!-- Not Implement -->
<!-- 			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-header">Users online</div>
						<div class="card-body display-4"><?php echo $count_user ?></div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="post.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
			</div> -->

			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-header">Posts</div>
						<?php 
						$connection = mysqli_connect('localhost','root','','cms');
						$query = "SELECT * FROM posts";
						$queryResult = mysqli_query($connection,$query);
						$num_row_posts = mysqli_num_rows($queryResult);

						?>
						<div class="card-body display-4"><?php echo $num_row_posts ?></div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="post.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-warning text-white mb-4">
						<div class="card-header">Comments</div>
						<?php 
						$connection = mysqli_connect('localhost','root','','cms');
						$query = "SELECT * FROM comments";
						$queryResult = mysqli_query($connection,$query);
						$num_row_comments = mysqli_num_rows($queryResult);

						?>
						<div class="card-body display-4"><?php echo $num_row_comments; ?></div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="comments.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-success text-white mb-4">
						<div class="card-header">Users</div>
						<?php 
						$connection = mysqli_connect('localhost','root','','cms');
						$query = "SELECT * FROM users";
						$queryResult = mysqli_query($connection,$query);
						$num_row_users = mysqli_num_rows($queryResult);

						?>
						<div class="card-body display-4"><?php echo $num_row_users; ?></div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="users.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-danger text-white mb-4">
						<div class="card-header">Category</div>
						<?php 
						$connection = mysqli_connect('localhost','root','','cms');
						$query = "SELECT * FROM categories";
						$queryResult = mysqli_query($connection,$query);
						$num_row_categories = mysqli_num_rows($queryResult);

						?>
						<div class="card-body display-4"><?php echo $num_row_categories; ?></div>
						<div class="card-footer d-flex align-items-center justify-content-between">
							<a class="small text-white stretched-link" href="categories.php">View Details</a>
							<div class="small text-white"><i class="fas fa-angle-right"></i></div>
						</div>
					</div>
				</div>
			</div>



<!-- Chart Logic Start -->
<?php 

$connection = mysqli_connect('localhost','root','','cms');
$query = "SELECT * FROM posts WHERE post_status='draft' ";
$queryResult = mysqli_query($connection,$query);
$posts_draft = mysqli_num_rows($queryResult);


$connection = mysqli_connect('localhost','root','','cms');
$query = "SELECT * FROM comments WHERE comment_status='unapproved' ";
$queryResult = mysqli_query($connection,$query);
$comments_unapproved = mysqli_num_rows($queryResult);


$connection = mysqli_connect('localhost','root','','cms');
$query = "SELECT * FROM users WHERE user_role='subscriber' ";
$queryResult = mysqli_query($connection,$query);
$subscriber = mysqli_num_rows($queryResult);



?>
			

			<div id="columnchart_material" style="width: auto; height: 500px;"></div>

			<script type="text/javascript">
				google.charts.load('current', {'packages':['bar']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
					var data = google.visualization.arrayToDataTable([
						['Data', 'Count'],
						<?php 
							echo "['Published Posts',{$num_row_posts}],";
							echo "['Draft Posts',{$posts_draft}],";
							echo "['Comments',{$num_row_comments}],";
							echo "['Unapproved Comments',{$comments_unapproved}],";
							echo "['Users',{$num_row_users}],";
							echo "['Subscriber',{$subscriber}],";
							echo "['Total Category',{$num_row_categories}],";
						 ?>
					
					])	
					var options = {
						chart: {
							title: 'CMS Query',
							subtitle: 'All details about cms.',
						}
					};

					var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

					chart.draw(data, google.charts.Bar.convertOptions(options));
				}
			</script>






		</div>
	</main>

	<!-- Footer Part -->
	<?php include "./includes/footer.php" ?>