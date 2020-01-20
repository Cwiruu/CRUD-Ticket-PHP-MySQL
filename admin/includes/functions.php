<?php

function confirmQuery($result) {

    global $connection;

    if (!$result) {
        die("Query failerd" . mysqli_error($connection));
    }
}

function insert_categories() {

    global $connection;

    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field cannot be empty";
        } else {
            $query = "INSERT INTO categories(category) VALUE ('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);
            header('location: categories.php');

            if (!$create_category_query) {
                die('Query failed' . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories() {

    global $connection;

    $query = "SELECT * FROM categories";
    $select_all_workgroups = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_workgroups)) {

        $id_cat = $row['ID_CAT'];
        $workgroup_title = $row['CATEGORY'];

        echo "<tr>";
        echo "<td>{$id_cat}</td>";
        echo "<td>{$workgroup_title}</td>";
        // echo "<td><a href='categories.php?delete={$id_cat}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$id_cat}'>Edit</a></td>";
        echo "<tr/>";
    }
}

//nie uzywana
function deleteCategory() {
    global $connection;

    if (isset($_GET['delete'])) {

        $delete_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE id_cat = {$delete_cat_id}";
        $delete_query = mysqli_query($connection, $query);

        header('location: categories.php');
    }
}

function isLoggedIn()
{
    if (isset($_SESSION['USER_TYPE'])) {

        return true;
    }

    return false;
}

?>

