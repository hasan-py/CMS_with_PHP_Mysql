
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

if(isset($_POST['edit_post'])){
  $post_title =  $_POST['title'];
  $post_author =  $_POST['author'];
  $post_category =  $_POST['post_category'];
  $post_status =  $_POST['status'];
  $post_tags =  $_POST['tags'];
  $post_content =  $_POST['content'];
  $post_comment_count = 4;

  $post_date =  date('d-m-y');

  $post_image =  $_FILES['image']['name'];
  $post_image_temp =  $_FILES['image']['tmp_name'];

  move_uploaded_file($post_image_temp, "../image/$post_image");

  if (empty($post_image)){
    $query = "SELECT * FROM posts WHERE post_id={$post_id}";
    $select_image = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($select_image)) {
      $post_image = $row['post_image'];
    }
  }

  $editQuery = "UPDATE `posts` SET `post_category_id`={$post_category},`post_title`='{$post_title}',`post_author`='{$post_author}',`post_date`=now(),`post_image`='{$post_image}',`post_content`='{$post_content}',`post_tags`='{$post_tags}',`post_comment_count`={$post_comment_count},`post_status`='{$post_status}' WHERE post_id={$post_id}";
  
  $editQueryRes = mysqli_query($connection,$editQuery);
  if($editQueryRes){
    header('Location: post.php');
    exit;
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
     <label for="post_category">Post Category</label>

     <select id="post_category" name="post_category" class="form-control col-md-8">
      <?php
      $query_categories = "SELECT * FROM `categories`";
      $res_categories = mysqli_query($connection,$query_categories);
      while ($row = mysqli_fetch_assoc($res_categories)){
        $cat_title = $row["cat_title"];
        $cat_id = $row["cat_id"];
        if($cat_id==$post_category_id){
          ?>
          <option value="<?php echo $cat_id; ?>" selected><?php echo $cat_title; ?></option>
          <?php
        }else{
          ?>

          <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
        <?php }} ?>
        
      </select>
    </div>


    <div class="form-group">
      <label for="post_image">Post Image</label>
      <img src="../image/<?php echo $post_image; ?>" height="100px" alt="">
      <input value="<?php echo $post_image; ?>" name="image" type="file" class="form-control-file col-md-8" id="post_image">
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group mt-3">
      <label for="post_author">Post Author</label>
      <input value="<?php echo $post_author; ?>" name="author" type="text" class="form-control col-md-8" id="post_author" placeholder="Enter Author Name" required>
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
      <select name="status" class="form-control col-md-8" id="post_status" placeholder="Type Your status" required>

        <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
        <?php
        if($post_status == 'published'){
          echo "<option value='draft'>draft</option>";
        }
        else{
          echo "<option value='published'>published</option>";
        }
        ?>
        
    </select>
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

    <button type="submit" name="edit_post" class="btn btn-dark btn-block col-md-8">Edit Post</button>

  </form>
</div>
