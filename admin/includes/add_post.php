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

}
  
?>


<div class="mx-4">
  <h3>Add Post</h3>
  <hr>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
      <label for="post_title">Post Title</label>
      <input name="title" type="text" class="form-control col-md-8" id="post_title" placeholder="Enter Title">
    </div>

    <div class="form-group">
      <label for="post_category_Id">Post Category Id</label>
      <input name="category_id" type="number" class="form-control col-md-8" id="post_category_Id" placeholder="Enter Category Id">
    </div>

    <div class="form-group">
      <label for="post_author">Post Author</label>
      <input name="author" type="text" class="form-control col-md-8" id="post_author" placeholder="Enter Author Name">
    </div>

    <div class="form-group">
      <label for="post_image">Post Image</label>
      <input name="image" type="file" class="form-control-file col-md-8" id="post_image">
    </div>


    <div class="form-group">
      <label for="post_tags">Post Tag</label>
      <input name="tags" type="text" class="form-control col-md-8" id="post_tags" placeholder="Enter Author Name">
    </div>

    <div class="form-group">
      <label for="post_status">Post Status</label>
      <input name="status" type="text" class="form-control col-md-8" id="post_status" placeholder="Enter Author Name">
    </div>

    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea name="content" class="form-control col-md-8" id="post_content" rows="3" placeholder="Enter Your Content"></textarea>
    </div>
  
    <button type="submit" name="create_post" class="btn btn-dark btn-block col-md-8">Submit Post</button>

  </form>
</div>