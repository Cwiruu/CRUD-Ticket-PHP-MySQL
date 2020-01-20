<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Comment ID</th>
            <th>Ticket ID</th>
            <th>Author ID</th>
            <th>Content</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM comments";
        $select_tickets = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_tickets)) {

            $id_comment = $row['id_comment'];
            $comment_ticket_id = $row['comment_ticket_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];

            $query = "SELECT * FROM ticket WHERE id_ticket = $comment_ticket_id";
            $select_ticket_id_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_ticket_id_query)) {
                $id_ticket = $row['ID_TICKET'];
            }

            echo "<tr>";
            echo "<td>$id_comment</td>";
            echo "<td><a href='../tickets.php?p_id={$id_ticket}'>{$id_ticket}</a></td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_content</td>";
            echo "<td>$comment_date</td>";
            echo "<td><a href='comments.php?source=edit_comment&p_id={$id_comment}'>Edit</a></td>";
            echo "<td><a href='comments.php?delete={$id_comment}'>Delete</a></td>";
            echo "<tr/>";
        }
        ?>

    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $delete_id_comment = $_GET['delete'];
    $query = "DELETE FROM comments WHERE id_comment = {$delete_id_comment}";
    $delete_query = mysqli_query($connection, $query);

    header("location: comments.php");
}
?>