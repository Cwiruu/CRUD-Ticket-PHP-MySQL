<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";

?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if (isset($_GET['p_id'])) {
                $the_id_ticket = $_GET['p_id'];
            }

            $query = "SELECT * FROM ticket LEFT JOIN categories ON ticket.WORK_GROUP=categories.ID_CAT WHERE id_ticket = $the_id_ticket;";
            $select_all_tickets = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_tickets)) {
                $ID_TICKET = $row['ID_TICKET'];
                $OPENED_BY = $row['OPENED_BY'];
                $ASSIGNED_TO = $row['ASSIGNED_TO'];
                $CREATION_DATE = $row['CREATION_DATE'];
                $UPDATE_DATE = $row['UPDATE_DATE'];
                $CATEGORY = $row['CATEGORY'];
                $TICKET_STATE = $row['TICKET_STATE'];
                $TICKET_PRIORITY = $row['TICKET_PRIORITY'];
                $SHORT_DESC = $row['SHORT_DESC'];
                $LONG_DESC = $row['LONG_DESC'];
            ?>


                <h1 class="my-4">
                    <small><?php echo $SHORT_DESC ?></small>
                </h1>

                <!-- Blog Post -->
                <div class="card mb-4">
                    <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
                    <div class="card-body">
                        <!-- <h2 class="card-title">Post Title</h2> -->
                        <p class="card-text"><?php echo $LONG_DESC ?></p>
                        <!-- <a href="#" class="btn btn-primary">Read More &rarr;</a> -->
                    </div>
                    <div class="card-footer text-muted">
                        <?php include "includes/search_result.php"; ?>
                    </div>
                </div>

            <?php } ?>

            <?php 
                if(isset($_POST['create_comment'])) {
                    $the_id_ticket = $_GET['p_id'];

                    $comment_author = $_POST['comment_author'];
                    $comment_content = $_POST['comment_content'];

                $query = "INSERT INTO comments (comment_ticket_id, comment_author,comment_content, comment_date) VALUES ($the_id_ticket, '{$comment_author}', '{$comment_content}', now())";
                }

                $create_comment_query = mysqli_query($connection, $query);
                if(!$create_comment_query) {
                    die("Query failed" . mysqli_error($connection));
                }
            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="comment_author"></input>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment_content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <?php
                $query = "SELECT * FROM comments WHERE comment_ticket_id = $the_id_ticket ORDER BY id_comment DESC";
                $select_comment_query = mysqli_query($connection, $query);
                if(!$select_comment_query) {
                    die("Query failed" . mysqli_error($connection));
                }
                while ($row = mysqli_fetch_array($select_comment_query)) {
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_date = $row['comment_date'];
                
            ?>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#"></a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment_author; ?>
                        <small><?php echo $comment_date; ?></small>
                    </h4>
                    <?php echo $comment_content; ?>
                </div>
            </div>

            <?php } ?>

            <!-- Pagination -->
            <!-- <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul> -->

        </div>

        <!-- Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php include "includes/footer.php"; ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>