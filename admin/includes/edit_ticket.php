<?php
//p_id = ticket_id
if (isset($_GET['p_id'])) {
    $the_ticket_id = $_GET['p_id'];
}

$query = "SELECT * FROM ticket WHERE id_ticket = $the_ticket_id";
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
    $LONG_DESC = $row['LONG_DESC'];
}

if (isset($_POST['edit_ticket'])) {
    $ID_TICKET = $_POST['ID_TICKET'];
    $OPENED_BY = $_POST['OPENED_BY'];
    $ASSIGNED_TO = $_POST['ASSIGNED_TO'];
    $CREATION_DATE = $_POST['CREATION_DATE'];
    $UPDATE_DATE = $_POST['UPDATE_DATE'];
    $WORK_GROUP = $_POST['WORK_GROUP'];
    $TICKET_STATE = $_POST['TICKET_STATE'];
    $TICKET_PRIORITY = $_POST['TICKET_PRIORITY'];
    $SHORT_DESC = $_POST['SHORT_DESC'];
    $LONG_DESC = $_POST['LONG_DESC'];

    $query = "UPDATE ticket SET OPENED_BY = '{$OPENED_BY}', ASSIGNED_TO = '{$ASSIGNED_TO}', CREATION_DATE = '{$CREATION_DATE}', UPDATE_DATE = '{$UPDATE_DATE}', WORK_GROUP = '{$WORK_GROUP}', TICKET_STATE= '{$TICKET_STATE}', TICKET_PRIORITY = '{$TICKET_PRIORITY}', SHORT_DESC = '{$SHORT_DESC}', LONG_DESC = '{$LONG_DESC}' WHERE ID_ticket = $the_ticket_id";

    $update_ticket = mysqli_query($connection, $query);

    confirmQuery($update_ticket);

    echo "Ticket updated: " . " " . "<a href='tickets.php'>View tickets</a>";
}
?>

<form action="" method="post">

    <div class="form-group">
        <label for="ID_TICKET">Ticket ID</label>
        <input value="<?php echo $ID_TICKET; ?>" type="text" class="form-control" name="ID_TICKET" readonly>
    </div>
    <div class="form-group">
        <label for="OPENED_BY">OPENED_BY</label>
        <input value="<?php echo $OPENED_BY; ?>" type="text" class="form-control" name="OPENED_BY" readonly>
    </div>
    <div class="form-group">
        <label for="ASSIGNED_TO">ASSIGNED_TO</label>
        <input value="<?php echo $ASSIGNED_TO; ?>" type="text" class="form-control" name="ASSIGNED_TO" readonly>
    </div>
    <div class="form-group">
        <label for="CREATION_DATE">CREATION_DATE</label>
        <input value="<?php echo $CREATION_DATE; ?>" type="text" class="form-control" name="CREATION_DATE" readonly>
    </div>
    <div class="form-group">
        <label for="UPDATE_DATE">UPDATE_DATE</label>
        <input value="<?php echo $UPDATE_DATE ?>" type="text" class="form-control" name="UPDATE_DATE" readonly>
    </div>
    <div class="form-group">
        <label for="WORK_GROUP">WORK_GROUP</label>
        <select name="WORK_GROUP" id="">
            <?php
            $query = "SELECT * FROM categories";
            $select_all_workgroups = mysqli_query($connection, $query);

            confirmQuery($select_all_workgroups);

            while ($row = mysqli_fetch_assoc($select_all_workgroups)) {
                $id_cat = $row['ID_CAT'];
                $workgroup_title = $row['CATEGORY'];

                echo "<option value='{$id_cat}'>{$workgroup_title}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="TICKET_STATE">TICKET_STATE</label>
        <select name="TICKET_STATE" id="">
            <option value="<?php echo $TICKET_STATE; ?>"><?php echo $TICKET_STATE; ?></option>
            <option value="<?php echo "Opened"; ?>"><?php echo "Opened"; ?></option>
            <option value="<?php echo "In Progress"; ?>"><?php echo "In Progress"; ?></option>
            <option value="<?php echo "Closed"; ?>"><?php echo "Closed"; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="TICKET_PRIORITY">TICKET_PRIORITY</label>
        <select name="TICKET_PRIORITY" id="">
            <option value="<?php echo $TICKET_PRIORITY; ?>"><?php echo $TICKET_PRIORITY; ?></option>
            <option value="<?php echo "Low"; ?>"><?php echo "Low"; ?></option>
            <option value="<?php echo "Medium"; ?>"><?php echo "Medium"; ?></option>
            <option value="<?php echo "High"; ?>"><?php echo "High"; ?></option>
            <option value="<?php echo "Urgent"; ?>"><?php echo "Urgent"; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="SHORT_DESC">SHORT_DESC</label>
        <input value="<?php echo $SHORT_DESC; ?>" type="text" class="form-control" name="SHORT_DESC">
    </div>
    <div class="form-group">
        <label for="LONG_DESC">LONG_DESC</label>
        <textarea class="form-control" name="LONG_DESC" id="" cols="30" rows="10"><?php echo $LONG_DESC; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_ticket" value="Edit Ticket">
    </div>

</form>