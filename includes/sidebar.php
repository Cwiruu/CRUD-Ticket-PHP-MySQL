<div class="col-md-4">



    <div class="card my-4">

        <h5 class="card-header">Login</h5>
        <form action="includes/login.php" method="post">
            <div class="card-body">
                <div class="form-group">
                    <input name="userid" type="text" class="form-control" placeholder="Enter your ID">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter your password">
                    <span class="input-group-btn">
                        <button type="submit" name="login" class="btn btn-primary">Submit</button>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <!-- Search Widget -->
    <div class="card my-4">

        <h5 class="card-header">Search</h5>
        <form action="search.php" method="post">
            <div class="card-body">
                <div class="input-group">
                    <input name="search" type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button name="submit" class="btn btn-secondary" type="submit">Go!</button>
                    </span>
                </div>
            </div>
        </form>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <?php

        $query = "SELECT * FROM categories";
        $select_all_workgroups = mysqli_query($connection, $query);

        ?>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">

                        <?php
                        while ($row = mysqli_fetch_assoc($select_all_workgroups)) {
                            $workgroup_title = $row['CATEGORY'];
                            $cat_id = $row['ID_CAT'];
                            echo "<li><a href='category.php?category=$cat_id'>{$workgroup_title}</a></li>";
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- Side Widget
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div> -->

</div>