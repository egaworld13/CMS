<?php include "includes/header.inc.php" ?>
<?php include "includes/db.inc.php" ?>

    <!-- Navigation -->
   <?php include "includes/navigation.inc.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                $query = "SELECT * FROM posts ";
                $select_all_posts = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_all_posts)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,100);
                    $post_status = $row['post_status'];
                    
                    if($post_status === 'Published'){
                        ?>


<h1 class="page-header">
    Page Heading
    <small>Secondary Text</small>
  </h1>
  
  <!-- Blog Post -->
  <h2>
      <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a>
  </h2>
  <p class="lead">
      by <a href="index.php"><?php echo $post_author?></a>
  </p>
  <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>
  <hr>
  <a href="post.php?p_id=<?php echo $post_id;?>">
      <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
  </a>
  <hr>
  <p><?php echo $post_content?></p>
  <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
  
  <hr>

                <?php } ?>
                        
<?php}

if($post_status !== 'Published'){ ?>
    <h1 class="text-center"> There is no posts at the moment! </h1>
<?php }?>

             </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.inc.php"?>

        </div>
        <!-- /.row -->
        <hr>

        <?php include "includes/footer.inc.php"?>