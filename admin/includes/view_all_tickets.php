<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Ticket ID</th>
            <th>Opened by</th>
            <th>Assigned to</th>
            <th>Creation Date</th>
            <th>Update Date</th>
            <th>Work group</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Short description</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM ticket LEFT JOIN categories ON ticket.WORK_GROUP=categories.ID_CAT";
        $select_tickets = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_tickets)) {

            $ID_TICKET = $row['ID_TICKET'];
            $OPENED_BY = $row['OPENED_BY'];
            $ASSIGNED_TO = $row['ASSIGNED_TO'];
            $CREATION_DATE = $row['CREATION_DATE'];
            $UPDATE_DATE = $row['UPDATE_DATE'];
            $WORK_GROUP = $row['WORK_GROUP'];
            $TICKET_STATE = $row['TICKET_STATE'];
            $TICKET_PRIORITY = $row['TICKET_PRIORITY'];
            $SHORT_DESC = $row['SHORT_DESC'];
            $LONG_DES = $row['LONG_DESC'];

            echo "<tr>";
            echo "<td>$ID_TICKET</td>";
            echo "<td>$OPENED_BY</td>";
            echo "<td>$ASSIGNED_TO</td>";
            echo "<td>$CREATION_DATE</td>";
            echo "<td>$UPDATE_DATE</td>";

            $query = "SELECT * FROM categories WHERE id_cat = $WORK_GROUP";
            $select_all_workgroups = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_workgroups)) {
                $id_cat = $row['ID_CAT'];
                $CATEGORY = $row['CATEGORY'];
            }

            echo "<td>$CATEGORY</td>";
            echo "<td>$TICKET_STATE</td>";
            echo "<td>$TICKET_PRIORITY</td>";
            echo "<td>$SHORT_DESC</td>";
            echo "<td>$LONG_DES</td>";
            echo "<td><a href='tickets.php?source=edit_ticket&p_id={$ID_TICKET}'>Edit</a></td>";
            echo "<td><a href='tickets.php?delete={$ID_TICKET}'>Delete</a></td>";
            echo "<tr/>";
        }
        ?>

    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $delete_id_ticket = $_GET['delete'];
    $query = "DELETE FROM ticket WHERE id_ticket = {$delete_id_ticket}";
    $delete_query = mysqli_query($connection, $query);

    header("location: tickets.php");
}
?>