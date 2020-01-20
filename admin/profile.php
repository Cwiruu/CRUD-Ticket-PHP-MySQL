<?php include "includes/header.php" ?>
<?php

if (isset($_SESSION['userid'])) {

    $userid = $_SESSION['userid'];
    $query = "SELECT * FROM user WHERE id_user = $userid";
    $select_user_profile = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile)) {
        $ID_USER = $row['ID_USER'];
        $FIRST_NAME = $row['FIRST_NAME'];
        $EMAIL = $row['EMAIL'];
        $USER_TYPE = $row['USER_TYPE'];
    }
}

?>
<?php
//p_id = ticket_id
if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM user WHERE id_user = $the_user_id ";
    $select_users = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_users)) {

        $ID_USER = $row['ID_USER'];
        $FIRST_NAME = $row['FIRST_NAME'];
        $EMAIL = $row['EMAIL'];
        $USER_TYPE = $row['USER_TYPE'];
        $USER_PASSWORD = $row['USER_PASSWORD'];
    }
}
if (isset($_POST['edit_user'])) {
    $ID_USER = $_POST['ID_USER'];
    $FIRST_NAME = $_POST['FIRST_NAME'];
    $EMAIL = $_POST['EMAIL'];
    $USER_TYPE = $_POST['USER_TYPE'];

    $query = "UPDATE user SET ID_USER = '{$ID_USER}', FIRST_NAME = '{$FIRST_NAME}', EMAIL = '{$EMAIL}',  USER_TYPE = '{$USER_TYPE}' WHERE id_user = $the_user_id";

    $update_user = mysqli_query($connection, $query);

    confirmQuery($update_user);
}

?>


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

                    <form action="" method="post">

                        <div class="form-group">
                            <label for="ID_USER">ID_USER</label>
                            <input value="<?php echo $ID_USER; ?>" type="text" class="form-control" name="ID_USER" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FIRST_NAME">FIRST_NAME</label>
                            <input value="<?php echo $FIRST_NAME; ?>" type="text" class="form-control" name="FIRST_NAME">
                        </div>
                        <div class="form-group">
                            <label for="EMAIL">EMAIL</label>
                            <input value="<?php echo $EMAIL; ?>" type="text" class="form-control" name="EMAIL">
                        </div>
                        <div class="form-group">
                            <label for="USER_TYPE">USER_TYPE - TODO: select nie dziala jako jedny nie wiadomo czemu Undefined index (Admin/Standard)</label>
                            <input value="<?php echo $USER_TYPE; ?>" type="text" class="form-control" name="USER_TYPE">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/footer.php" ?>