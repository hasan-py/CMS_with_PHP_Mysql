
<!-- Create Form -->
<div id="form" class="col-xs-6 mt-4 ml-3">
	<?php
	$success_msg_edit = false;
	if($success_msg_edit){
		?>

		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Category added.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

	<?php } ?>

<form action="" method="POST" class="form-group needs-validation" novalidate>
	<div>
		<label for="validationCustom">Edit Category</label>
		<?php
		if(isset($_GET['edit'])){
			$cat_id = $_GET['edit'];
			$query_for_edit = "SELECT `cat_id`, `cat_title` FROM `categories` WHERE cat_id={$cat_id}";
			$res =  mysqli_query($connection,$query_for_edit);
			while($row = mysqli_fetch_assoc($res)){
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
				?>
				<input id="catEditTitle" value="<?php echo $cat_title; ?>" name="catEditTitle" id="validationCustom" type="text" class="form-control" placeholder="Enter" required>

		<?php }} ?>

			<?php  

			if(isset($_POST['catEdit'])){
				$cat_title = $_POST['catEditTitle'];
				$query_for_edit = "UPDATE `categories` SET cat_title='{$cat_title}' WHERE cat_id={$cat_id}";
				if(mysqli_query($connection,$query_for_edit)){	
					$success_msg_edit = true;
					header('Location: categories.php');
					exit();
				}

			}

			?>

			<div class="invalid-feedback">
					Must not be empty.
			</div>
			</div>
			<button id="submitEdit" type="submit" name="catEdit"  class="mt-2 btn btn-dark">Update</button>
			</form>	

</div>
<!-- 
<script>
	let form = document.getElementById("form")
	submitEdit.addEventListener('submit',(e)=>{
	e.reset()
	})
</script> -->