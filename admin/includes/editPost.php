
<?php 

if(isset($_GET['p_id'])){
	$post_id = $_GET['p_id'];
	$query = "SELECT * FROM `posts` WHERE post_id={$post_id}";
	$res_posts = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($res_posts)){
		$post_category_id = $row["post_category_id"];
		$post_title = $row["post_title"];
		$post_author = $row["post_author"];
		$post_date = $row["post_date"];
		$post_image = $row["post_image"];
		$post_content = $row["post_content"];
		$post_tags = $row["post_tags"];
		$post_comment_count = $row["post_comment_count"];
		$post_status = $row["post_status"];
	}
}


	?>


<div class="mx-4">
	<a href="post.php">Back Post</a>
	
  <h3>Edit Post</h3>
  <hr>
  <form method="POST" action="" enctype="multipart/form-data" class="form-group needs-validation" novalidate>
    <div class="form-group">
      <label for="post_title">Post Title</label>
      <input value="<?php echo $post_title; ?>" name="title" type="text" class="form-control col-md-8" id="post_title" placeholder="Enter Title" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_category_Id">Post Category Id</label>
      <input value="<?php echo $post_category_id; ?>" name="category_id" type="number" class="form-control col-md-8" id="post_category_Id" placeholder="Enter Category Id" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_author">Post Author</label>
      <input value="<?php echo $post_author; ?>" name="author" type="text" class="form-control col-md-8" id="post_author" placeholder="Enter Author Name" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_image">Post Image</label>
      <input value="<?php echo $post_image; ?>" name="image" type="file" class="form-control-file col-md-8" id="post_image" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>


    <div class="form-group">
      <label for="post_tags">Post Tag</label>
      <input value="<?php echo $post_tags; ?>" name="tags" type="text" class="form-control col-md-8" id="post_tags" placeholder="Enter some tags" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_status">Post Status</label>
      <input value="<?php echo $post_status; ?>" name="status" type="text" class="form-control col-md-8" id="post_status" placeholder="Type Your status" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea name="content" class="form-control col-md-8" id="post_content" rows="3" placeholder="Enter Your Content" required>
      	<?php echo $post_content; ?>
      </textarea>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>
  
    <button type="submit" name="create_post" class="btn btn-dark btn-block col-md-8">Submit Post</button>

  </form>
</div>
