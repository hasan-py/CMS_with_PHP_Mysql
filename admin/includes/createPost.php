
<?php 

if(isset($_POST['create_post'])){
  $post_title =  $_POST['title'];
  $post_author =  $_POST['author'];
  $post_category_id =  $_POST['category_id'];
  $post_status =  $_POST['status'];
  $post_tags =  $_POST['tags'];
  $post_content =  $_POST['content'];
  $post_comment_count = 4;

  $post_date =  date('d-m-y');

  $post_image =  $_FILES['image']['name'];
  $post_image_temp =  $_FILES['image']['tmp_name'];

  move_uploaded_file($post_image_temp, "../image/$post_image");

  $createPostQuery = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`)";
  
  $createPostQuery .= "VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}',{$post_comment_count},'{$post_status}')";
  
  $createPostQueryDone = mysqli_query($connection,$createPostQuery);
  
  confirmQuery($createPostQueryDone);

}
  
?>


<div class="mx-4">
  <a href="post.php">Back Post</a>
  <h3>Create Post</h3>
  <hr>
  <form method="POST" action="" enctype="multipart/form-data" class="form-group needs-validation" novalidate>
    <div class="form-group">
      <label for="post_title">Post Title</label>
      <input name="title" type="text" class="form-control col-md-8" id="post_title" placeholder="Enter Title" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_category_Id">Post Category Id</label>
      <input name="category_id" type="number" class="form-control col-md-8" id="post_category_Id" placeholder="Enter Category Id" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_author">Post Author</label>
      <input name="author" type="text" class="form-control col-md-8" id="post_author" placeholder="Enter Author Name" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_image">Post Image</label>
      <input name="image" type="file" class="form-control-file col-md-8" id="post_image" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>


    <div class="form-group">
      <label for="post_tags">Post Tag</label>
      <input name="tags" type="text" class="form-control col-md-8" id="post_tags" placeholder="Enter some tags" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_status">Post Status</label>
      <input name="status" type="text" class="form-control col-md-8" id="post_status" placeholder="Type Your status" required>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>

    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea name="content" class="form-control col-md-8" id="post_content" rows="3" placeholder="Enter Your Content" required></textarea>
      <div class="invalid-feedback">
        Must not be empty.
      </div>
    </div>
  
    <button type="submit" name="create_post" class="btn btn-dark btn-block col-md-8">Submit Post</button>

  </form>
</div>
