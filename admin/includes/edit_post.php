<?php

if (isset($_GET['p_id'])) {

$the_post_id = $_GET['p_id'];

}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_posts_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts_by_id)){
$the_post_id = $row['post_id'];
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

if (isset($_POST['update_post']) ) {
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    
    $post_tag = $_POST['post_tag'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image) ) {

        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)){

        $post_image = $row['post_image'];

        }

    }
    
    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tag = '{$post_tag}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$the_post_id} ";
    
    $update_post = mysqli_query($connection, $query);
    confirmQuery($update_post);

    
    
}

?>
    
<form action="" method="post" enctype="multipart/form-data">
<!-- POST TITLE -->
<div class="form-gorup">
<label for="post_title">Posts Title</label>
<input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
</div>
<!-- POST CATEGORY -->
</br>
<div class="form-gorup">
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
<input type="text" value="<?php echo $post_author; ?>" class="form-control" name="post_author">
</div>
<!-- POST STATUS -->
<div class="form-gorup">
<label for="post_status">Posts Status</label>
<input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">
</div>
<!-- POST IMAGE -->
</br>
<div class="form-gorup">
    <img width="100" src="../images/<?php echo $post_image ?>" alt="Image">
    <input type="file" name="post_image">
</div>
</br>
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
<input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
</div>

</form>

