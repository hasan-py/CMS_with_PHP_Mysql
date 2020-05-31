<?php include "./includes/header.php" ?>
<?php include "./includes/navigation.php" ?>
<?php ob_start(); ?>

<!-- this is for sideNav bar -->
<?php include "./includes/sidebarNav.php" ?>


<?php 
if(!isset($_SESSION['loginCMS'])){
    header('Location: ../index.php');
}

?>


<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Category List</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/cms/admin/index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>

			<div class="row">
				<!-- Create Form -->
				<?php include "./includes/createCategoryForm.php"; ?>

				<!-- Edit Form -->
				<?php 
				if(isset($_GET['edit'])){
					$cat_id = $_GET['edit'];
					include "./includes/editCategoryForm.php";
				}
				?>
			</div>

			<div class="card my-4">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Category Id</th>
									<th>Category Title</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>


								<?php
								$query_categories = "SELECT * FROM `categories`";
								$res_categories = mysqli_query($connection,$query_categories);
								while ($row = mysqli_fetch_assoc($res_categories)){
									$cat_title = $row["cat_title"];
									$cat_id = $row["cat_id"];
									?>
									<tr>
										<td><?php echo $cat_id ?></td>
										<td><?php echo $cat_title ?></td>
										<td>
				                            <a class="btn btn-sm btn-info" <?php echo "href=categories.php?edit={$cat_id}"; ?>><i class="fas fa-edit"></i></a>
				                            <a class="btn btn-sm btn-danger" <?php echo "href=categories.php?delete={$cat_id}"; ?>><i class="fas fa-trash-alt"></i></a>
										</td>
									</tr>
								<?php } ?>

								<?php 
								if(isset($_GET['delete'])){
									$cat_delete_id = $_GET['delete'];
									$deleteQuery = "DELETE FROM `categories` WHERE cat_id={$cat_delete_id}";
									$deleteQuery_res = mysqli_query($connection,$deleteQuery);
									header("Location: categories.php");
								}
								?>




							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
	'use strict';
	window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    	form.addEventListener('submit', function(event) {
    		if (form.checkValidity() === false) {
    			event.preventDefault();
    			event.stopPropagation();
    		}
    		form.classList.add('was-validated');
    	}, false);
    });
}, false);
})();

let editBtn = document.getElementById('editBtn')
editBtn.addEventListener('click',()=>{
	console.log("hey")
})


</script>


<!-- Footer Part -->
<?php include "./includes/footer.php" ?>



