<?php 
include "db.php";
session_start();

if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $userid = stripslashes($userid);
    $password = stripslashes($password);
    $userid = mysqli_real_escape_string($connection, $userid);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM user WHERE id_user = '$userid' and user_password = '$password' ";
    $select_user_query = mysqli_query($connection, $query);

    // if (!$select_user_query) {
    //     die("Query failed" . mysqli_error($connection));
    // }

    while ($row = mysqli_fetch_array($select_user_query)) {
        $ID_USER = $row['ID_USER'];
        $USER_PASSWORD = $row['USER_PASSWORD'];
    }
}

if (!empty($userid) && !empty($password) && $userid === $ID_USER && $password === $USER_PASSWORD && $userid != "" && $password != "") {

    $_SESSION['userid'] = $ID_USER;
    // $_SESSION['firstname'] = $FIRST_NAME;
    // $_SESSION['email'] = $EMAIL;
    // $_SESSION['USER_TYPE'] = $USER_TYPE;

    header("Location: ../main.php");
} else {
    header("Location: ../index.php");
}


?>
