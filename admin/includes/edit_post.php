<?php

if (isset($_GET['p_id'])) {

$the_post_id = $_GET['p_id'];

}

$query = "SELECT * FROM posts ";
$select_posts_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts_by_id)){
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_content = $row['post_content'];
$post_tag = $row['post_tag'];
$post_comment = $row['post_comment_count'];
$post_date = $row['post_date'];
}

?>
    
<form action="" method="post" enctype="multipart/form-data">
<!-- POST TITLE -->
<div class="form-gorup">
<label for="post_title">Posts Title</label>
<input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
</div>
<!-- POST CATEGORY -->
<div class="form-gorup">
<label for="post_category_id">Posts Category Id</label>
<input type="text" value="<?php echo $post_category; ?>" class="form-control" name="post_category_id">
</div>
<!-- POST AUTHOR -->
<div class="form-gorup">
<label for="post_author">Posts Author</label>
<input type="text" value="<?php echo $post_author; ?>" class="form-control" name="post_author">
</div>
<!-- POST STATUS -->
<div class="form-gorup">
<label for="post_status">Posts Status</label>
<input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">
</div>
<!-- POST IMAGE -->
<div class="form-gorup">
<label for="post_image">Posts Image</label>
<input type="file"  class="form-control" name="post_image">
</div>
<!-- POST TAGS -->
<div class="form-gorup">
<label for="post_tag">Posts Tags</label>
<input type="text" value="<?php echo $post_tag; ?>" class="form-control" name="post_tag">
</div>
<!-- POST CONTENT -->
<div class="form-gorup">
<label for="post_content">Posts Content</label>
<textarea class="form-control"  name="post_content" id="" cols="30" rows="10">
<?php echo $post_content; ?>
</textarea>
</div>
<!-- POST BUTTON -->
<div class="form-gorup">
<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
</div>

</form>

