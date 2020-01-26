<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
include "admin/includes/functions.php";

?>


<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <?php

      $query = "SELECT * FROM ticket LEFT JOIN categories ON ticket.WORK_GROUP=categories.ID_CAT";
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
        $LONG_DESC = substr($row['LONG_DESC'], 100);

      ?>


        <h1 class="my-4">
          <small><a href="ticket.php?p_id=<?php echo $ID_TICKET ?>"><?php echo $ID_TICKET ?></small>
        </h1>

        <!-- Blog Post -->
        <div class="card mb-4">
          <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
          <div class="card-body">
            <!-- <h2 class="card-title">Post Title</h2> -->
            <p class="card-text"><?php echo $SHORT_DESC ?></p>
            <a href="ticket.php?p_id=<?php echo $ID_TICKET ?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            <?php include "includes/search_result.php"; ?>
          </div>
        </div>

      <?php } ?>


      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>

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
