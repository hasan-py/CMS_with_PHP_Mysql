<?php include "./includes/header.php" ?>
<?php include "./includes/navigation.php" ?>

<!-- this is for sideNav bar -->
<?php include "./includes/sidebarNav.php" ?>
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			
			<?php
				$success_msg = false;
				$catError = "";
				if(isset($_POST['catAdd'])){
					$cat_title_post = $_POST['catTitle'];
					$query_for_add = "INSERT INTO `categories`(`cat_title`) VALUES ('{$cat_title_post}')";
					if(mysqli_query($connection,$query_for_add)){	
						$success_msg = true;
					}

				}
			?>

			<div class="row">
				<div class="col-xs-6 mt-4 ml-3">
					<?php 
					if($success_msg){
						?>

						<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Category added.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>

					<?php } ?>
						<form name="catForm" action="categories.php" method="POST" class="form-group needs-validation" novalidate>
							<div>
								<label for="validationCustom">Add Category</label>
								<input name="catTitle" id="validationCustom" type="text" class="form-control" placeholder="Enter" required>
								<div class="invalid-feedback">
						          Must not be empty.
						        </div>
							</div>
							<button name="catAdd" type="submit" class="mt-2 btn btn-dark">Add + </button>
						</form>
						
				</div>
			</div>

			<div class="card my-4">
				<div class="card-header"><i class="fas fa-table mr-1"></i>Category List</div>
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
										<a id="editBtn" class="btn btn-success ml-4">Edit</a>
										<a <?php echo "href=categories.php?delete={$cat_id}"; ?> class="btn btn-danger">Delete</a>
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



