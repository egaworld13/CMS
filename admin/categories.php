
        <?php include "includes/admin.header.inc.php"?>
        <div id="wrapper">

          <!-- Navigation -->
          <?php include"includes/admin.navigation.inc.php"?>

          <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                             <div class="col-xs-6">

                             <?php 
                             
                             if(isset($_POST['submit'])){

                                $cat_title = $_POST['cat_title'];
                                if($cat_title==""|| empty($cat_title)){
                                  echo " This field should not be ampty";
                                }else{

                                  $query = "INSERT INTO categories(cat_title)";
                                  $query .= " VALUE('{$cat_title}')";

                                  $create_category_query = mysqli_query($connection,$query);
                                  if(!$create_category_query){
                                    die('QUERY FAILED' . mysqli_error($connection));
                                  }
                                }
                             }
                             
                             ?>
                                <!--  Add category form -->
                                <form action="" method="post">

                                  <div class="form-group">
                                
                                    <input class="form-control" type="text" name="cat_title" placeholder="Add Category">
                                  </div>

                                  <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                  </div>

                                </form>

                               <!-- Update categories -->
                               
                                <?php
                                  if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];
                                    include "includes/admin.update.categories.inc.php";
                                  } ?>

                               </div>  
                               <div class="col-xs-6">
                                  

                                <table class="table table-bordered table-hover">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Category tile</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                    <tr>
                                    <?php 
                                    //* FIND ALL CATEGORIES
                                    
                                      $query = "SELECT * FROM categories "; // LIMIT 3
                                      $select_categories = mysqli_query($connection, $query);


                                     while($row = mysqli_fetch_assoc($select_categories)){
                                      $cat_id = $row['cat_id'];
                                      $cat_title = $row['cat_title'];
                                      echo "<tr>";
                                      echo "<td>{$cat_id}</td>";
                                      echo "<td>{$cat_title}</td>";
                                      echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                      echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                      echo "</tr>";
                                      };
                                    ?>
                                    <?php
                                    if(isset($_GET['delete'])){

                                      $delete_cat_id = $_GET['delete'];

                                      $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id}";
                                        $delete_query = mysqli_query($connection,$query);
                                        //? header refresh page so u dont need to click on button twice!
                                        header("Location: categories.php");
                                    }
                                    ?>

                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                    </div>
                 </div>
                  <!-- /.row -->

               </div>
               <!-- /.container-fluid -->

             </div>
             <!-- /#page-wrapper -->

           </div>
          <?php include "includes/admin.footer.inc.php"?>
