<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>

        <?php
        if (isset($_GET['edit'])) {
            $id_cat = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE id_cat = $id_cat";
            $select_all_workgroups = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_workgroups)) {
                $id_cat = $row['ID_CAT'];
                $workgroup_title = $row['CATEGORY'];

        ?>
                <input value="<?php if (isset($id_cat)) { echo $workgroup_title;}; ?>" class="form-control" type="text" name="cat_title">
        <?php
            }
        }
        ?>
        <?php ///Update 
        if (isset($_GET['update_category'])) {

            $update_category = $_GET['update_category'];
            $query = "UPDATE categories SET category = '{$update_category}' WHERE {$id_cat}";
            $update_query = mysqli_query($connection, $query);
            if (!$update_query) {
                die("Query failed" . mysqli_error($connection));
            }
            header('location: categories.php');
        }
        ?>


    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update category">
    </div>
</form>