<?php

if (isset($_POST['create_user'])) {
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_role = $_POST['user_role'];

// $post_image = $_FILES['post_image']['name'];
// $post_image_temp = $_FILES['post_image']['tmp_name'];


$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
// $post_date = date('d-m-y');

// move_uploaded_file($post_image_temp, "../images/$post_image");

$query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, 
user_email, user_role) ";

 $query .= "VALUES ('{$username}','{$user_password}',
 '{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}')";

 $create_user_query = mysqli_query($connection, $query);

confirmQuery($create_user_query);

}
?>
    
<form action="" method="post" enctype="multipart/form-data">
<!-- USER FIRST NAME -->
<div class="form-gorup">
<label for="user_firstname">Firstname</label>
<input type="text" class="form-control" name="user_firstname">
</div>
<!-- USER LAST NAME -->
<div class="form-gorup">
<label for="user_lastname">Lastname</label>
<input type="text" class="form-control" name="user_lastname">
</div>
<!-- USER ROLE -->
</br>
<div class="form-gorup"> 
<label for="user_role">User Role:</label> </br>
<select name="user_role" id="">

<option value="subscriber">Select Options</option> 
<option value="admin">Admin</option>
<option value="subscriber">Subscriber</option>

</select>

</div>
</br>

<!-- USERNAME -->
<div class="form-gorup">
<label for="username">Username</label>
<input type="text" class="form-control" name="username">
</div>
<!-- USER EMAIL -->
<div class="form-gorup">
<label for="user_email">Email</label>
<input type="email" class="form-control" name="user_email">
</div>
<!-- POST IMAGE -->
<!-- <div class="form-gorup">
<label for="user_image">User Image</label>
<input type="file" class="form-control" name="user_image">
</div> -->
<!-- PASSWORD -->
<div class="form-gorup">
<label for="user_password">Password</label>
<input type="password" class="form-control" name="user_password">
</div>

<!-- CREATE BUTTON -->
<div class="form-gorup">
<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
</div>

</form>

