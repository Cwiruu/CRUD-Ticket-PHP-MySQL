<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type of user</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM user";
        $select_tickets = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_tickets)) {

            $ID_USER = $row['ID_USER'];
            $FIRST_NAME = $row['FIRST_NAME'];
            $EMAIL = $row['EMAIL'];
            $USER_TYPE = $row['USER_TYPE'];

            // $query = "SELECT * FROM user WHERE id_user = $ID_USER";
            // $select_user_id_query = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($select_user_id_query)) {
            //     $id_ticket = $row['ID_TICKET'];
            // }

            echo "<tr>";
            echo "<td>$ID_USER</td>";
            echo "<td>$FIRST_NAME</td>";
            echo "<td>$EMAIL</td>";
            echo "<td>$USER_TYPE</td>";
            echo "<td><a href='users.php?source=edit_user&edit_user={$ID_USER}'>Edit</a></td>";
            echo "<td><a href='users.php?delete={$ID_USER}'>Delete</a></td>";
            echo "<tr/>";
        }
        ?>

    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $delete_id_user = $_GET['delete'];
    $query = "DELETE FROM user WHERE id_user = {$delete_id_user}";
    $delete_query = mysqli_query($connection, $query);

    header("location: users.php");
}
?>