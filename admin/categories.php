
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
           <?php insertCategories()?>
              <!--  Add category form -->
              <form action="" method="post">
                <div class="form-group">
              
                  <input class="form-control" type="text" name="cat_title" placeholder="Add Category">
                </div>
                      <div class="form-group">
                          <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>
                   
                     
                      <?php
                      //* UPDATE AND INCLUDE QUERY
                        if (isset($_GET['edit'])) {
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
                        <?php findAllCategories()?>
                        <?php deleteCategories()?>
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
