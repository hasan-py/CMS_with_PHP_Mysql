<?php
$success_msg_add = false;

if(isset($_POST['catAdd'])){
	$cat_title_post = $_POST['catTitle'];
	$query_for_add = "INSERT INTO `categories`(`cat_title`) VALUES ('{$cat_title_post}')";
	if(mysqli_query($connection,$query_for_add)){	
		$success_msg_add = true;
	}

}
?>
<div class="col-xs-6 mt-4 ml-3">
	<?php 
	if($success_msg_add){
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