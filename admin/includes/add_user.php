<?php
if (isset($_POST['create_user'])) {
    $FIRST_NAME = $_POST['FIRST_NAME'];
    $EMAIL = $_POST['EMAIL'];
    $USER_TYPE = $_POST['USER_TYPE'];
    $USER_PASSWORD = $_POST['USER_PASSWORD'];

    $query = "INSERT INTO user(FIRST_NAME, EMAIL, USER_TYPE, USER_PASSWORD) VALUES('{$FIRST_NAME}','{$EMAIL}','{$USER_TYPE}','{$USER_PASSWORD}')";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);

    echo "User Created: " . " " . "<a href='users.php'>View users</a>";
}
?>

<form action="" method="post">

    <div class="form-group">
        <label for="FIRST_NAME">Full Name</label>
        <input type="text" class="form-control" name="FIRST_NAME">
    </div>
    <div class="form-group">
        <label for="EMAIL">Email</label>
        <input type="email" class="form-control" name="EMAIL">
    </div>
    <div class="form-group">
        <label for="USER_TYPE">USER_TYPE</label>
        <br>
        <select name="USER_TYPE" id="">
            <?php
                echo "<option value='Standard'>Standard</option>";
                echo "<option value='Admin'>Admin</option>";
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="USER_PASSWORD">Initial password</label>
        <input type="text" class="form-control" name="USER_PASSWORD">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
    </div>
</form>