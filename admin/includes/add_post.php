<?php

if (isset($_POST['create_post'])) {
$post_title = $_POST['post_title'];
$post_author = $_POST['post_author'];
$post_category_id = $_POST['post_category'];
$post_status = $_POST['post_status'];

$post_image = $_FILES['post_image']['name'];
$post_image_temp = $_FILES['post_image']['tmp_name'];


$post_tag = $_POST['post_tag'];
$post_content = $_POST['post_content'];
$post_date = date('d-m-y');

move_uploaded_file($post_image_temp, "../images/$post_image");

$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image,
 post_content, post_tag, post_status) ";

 $query .= "VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),
 '{$post_image}','{$post_content}','{$post_tag}','{$post_status}')";

 $create_post_query = mysqli_query($connection, $query);

confirmQuery($create_post_query);

}
?>
    
<form action="" method="post" enctype="multipart/form-data">
<!-- POST TITLE -->
<div class="form-gorup">
<label for="post_title">Posts Title</label>
<input type="text" class="form-control" name="post_title">
</div>
<!-- POST CATEGORY -->
</br>
<div class="form-gorup">
<label for="post_category">Posts Category</label></br>
    <select name="post_category" id="post_category">
        
        <?php
$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);

confirmQuery($select_categories);

while($row = mysqli_fetch_assoc($select_categories)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    
    echo "<option value='{$cat_id}'>{$cat_title}</option>";
}
?>
</select>

</div>
</br>
<!-- POST AUTHOR -->
<div class="form-gorup">
<label for="post_author">Posts Author</label>
<input type="text" class="form-control" name="post_author">
</div>
<!-- POST STATUS -->
<div class="form-gorup">
<label for="post_status">Posts Status</label>
<input type="text" class="form-control" name="post_status">
</div>
<!-- POST IMAGE -->
<div class="form-gorup">
<label for="post_image">Posts Image</label>
<input type="file" class="form-control" name="post_image">
</div>
<!-- POST TAGS -->
<div class="form-gorup">
<label for="post_tag">Posts Tags</label>
<input type="text" class="form-control" name="post_tag">
</div>
<!-- POST CONTENT -->
<div class="form-gorup">
<label for="post_content">Posts Content</label>
<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>
<!-- POST BUTTON -->
<div class="form-gorup">
<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
</div>

</form>

