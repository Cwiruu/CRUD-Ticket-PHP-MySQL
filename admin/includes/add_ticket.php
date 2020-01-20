<?php
if (isset($_POST['create_ticket'])) {
    $OPENED_BY = $_POST['OPENED_BY'];
    $ASSIGNED_TO = $_POST['ASSIGNED_TO'];
    $CREATION_DATE = $_POST['CREATION_DATE'];
    $UPDATE_DATE = $_POST['UPDATE_DATE'];
    $WORK_GROUP = $_POST['WORK_GROUP'];
    $TICKET_STATE = $_POST['TICKET_STATE'];
    $TICKET_PRIORITY = $_POST['TICKET_PRIORITY'];
    $SHORT_DESC = $_POST['SHORT_DESC'];
    $LONG_DESC = $_POST['LONG_DESC'];

    $query = "INSERT INTO `ticket` (`ID_TICKET`, `OPENED_BY`, `ASSIGNED_TO`, `CREATION_DATE`, `UPDATE_DATE`, `WORK_GROUP`, `TICKET_STATE`, `TICKET_PRIORITY`, `SHORT_DESC`, `LONG_DESC`) VALUES(NULL, '{$OPENED_BY}', '{$ASSIGNED_TO}', current_timestamp(), current_timestamp(), '{$WORK_GROUP}', '{$TICKET_STATE}', '{$TICKET_PRIORITY}', '{$SHORT_DESC}', '{$LONG_DESC}')";


    // $query = "INSERT INTO ticket(OPENED_BY, ASSIGNED_TO, CREATION_DATE, UPDATE_DATE, WORK_GROUP, TICKET_STATE, TICKET_PRIORITY, SHORT_DESC, LONG_DESC) VALUES('{$OPENED_BY}','{$ASSIGNED_TO}', now(), now(),'{$WORK_GROUP}','{$TICKET_STATE}','{$TICKET_PRIORITY}','{$SHORT_DESC}','{$LONG_DESC}')";

    $create_ticket_query = mysqli_query($connection, $query);

    confirmQuery($create_ticket_query);
}
?>

<form action="" method="post">
    <div class="form-group">
        <label for="OPENED_BY">OPENED BY</label>
        <br>
        <select name="OPENED_BY" id="">
            <?php
            $query = "SELECT * FROM user";
            $select_all_users = mysqli_query($connection, $query);

            confirmQuery($select_all_users);

            while ($row = mysqli_fetch_assoc($select_all_users)) {
                $ID_USER = $row['ID_USER '];
                $FIRST_NAME = $row['FIRST_NAME'];

                echo "<option value='{$ID_USER}'>{$FIRST_NAME}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="ASSIGNED_TO">ASSIGNED TO</label>
        <br>
        <select name="ASSIGNED_TO" id="">
            <?php
            $query = "SELECT * FROM user";
            $select_all_users = mysqli_query($connection, $query);

            confirmQuery($select_all_users);

            while ($row = mysqli_fetch_assoc($select_all_users)) {
                $ID_USER = $row['ID_USER '];
                $FIRST_NAME = $row['FIRST_NAME'];

                echo "<option value='{$ID_USER}'>{$FIRST_NAME}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="CREATION_DATE">CREATION DATE</label>
        <input value="<?php $now = new DateTime();
                        echo $now->format('Y-m-d H:i:s'); ?>" type="text" class="form-control" name="CREATION_DATE" readonly>
    </div>
    <div class="form-group">
        <label for="UPDATE_DATE">UPDATE DATE</label>
        <input value="<?php $now = new DateTime();
                        echo $now->format('Y-m-d H:i:s'); ?>" type="text" class="form-control" name="UPDATE_DATE" readonly>
    </div>
    <div class="form-group">
        <label for="WORK_GROUP">WORK GROUP</label>
        <br>
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
        <div class="form-group">
            <label for="TICKET_STATE">TICKET STATE</label>
            <br>
            <select name="TICKET_STATE" id="">
                <option value="<?php echo "Opened"; ?>"><?php echo "Opened"; ?></option>
                <option value="<?php echo "In Progress"; ?>"><?php echo "In Progress"; ?></option>
                <option value="<?php echo "Closed"; ?>"><?php echo "Closed"; ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="TICKET_PRIORITY">TICKET PRIORITY</label>
            <br>
            <select name="TICKET_PRIORITY" id="">
                <option value="<?php echo "Low"; ?>"><?php echo "Low"; ?></option>
                <option value="<?php echo "Medium"; ?>"><?php echo "Medium"; ?></option>
                <option value="<?php echo "High"; ?>"><?php echo "High"; ?></option>
                <option value="<?php echo "Urgent"; ?>"><?php echo "Urgent"; ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="SHORT_DESC">SHORT DESCRIPTION</label>
            <input type="text" class="form-control" name="SHORT_DESC">
        </div>
        <div class="form-group">
            <label for="LONG_DESC">DESCRIPTION</label>
            <textarea class="form-control" name="LONG_DESC" id="" cols="30" rows="10">
        </textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_ticket" value="Create Ticket">
        </div>
</form>