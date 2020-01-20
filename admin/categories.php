<?php include "includes/header.php" ?>

<div id="wrapper">

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Admin page
                    <small>Subheading</small>
                </h1>
                <!-- <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Admin page
                    </li>
                </ol> -->

                <div class="col-xs-6">

                <!-- problem z dublowaniem rekordow po refreshu strony - ob_start() - header(location) -->
                <?php 
                    insert_categories();
                ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat-title">Add New Category</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                        </div>
                    </form>
                    
                    <?php  //Update and include query
                        if(isset($_GET['edit'])) {
                            $id_cat = $_GET['edit'];
                            include "includes/update_categories.php";
                        }
                    ?>

                </div><!-- Add category form -->
                <div class="col-xs-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                findAllCategories();
                            ?>
                            <!-- delete function -->
                            <?php
                                //function deleteCategory();
                            ?>
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

<?php include "includes/footer.php" ?>