<?php include "db.php"; ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $userid = mysqli_real_escape_string($connection, $userid);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM user WHERE id_user = $userid";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        die("Query failed" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {
        $ID_USER = $row['ID_USER'];
        $FIRST_NAME = $row['FIRST_NAME'];
        $EMAIL = $row['EMAIL'];
        $USER_TYPE = $row['USER_TYPE'];
        $USER_PASSWORD = $row['USER_PASSWORD'];
    }
}

if ($userid !== $ID_USER && $password != $USER_PASSWORD) {
    header("Location: ../index.php");
} else if ($userid == $ID_USER && $password == $USER_PASSWORD) {

    $_SESSION['userid'] = $ID_USER;
    $_SESSION['firstname'] = $FIRST_NAME;
    $_SESSION['email'] = $EMAIL;
    $_SESSION['USER_TYPE'] = $USER_TYPE;

    header("Location: ../admin");
} else {
    header("Location: ../index.php");
}

?>
