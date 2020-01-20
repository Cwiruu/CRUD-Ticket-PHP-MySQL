<?php
include "includes/db.php";
include "includes/header.php";
?>

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <?php

      if (isset($_POST['submit'])) {

        $search = $_POST['search'];

        $query = "SELECT * FROM ticket LEFT JOIN categories ON ticket.WORK_GROUP=categories.ID_CAT
            WHERE ID_TICKET LIKE '%$search%' OR 
                  OPENED_BY LIKE '%$search%' OR
                  ASSIGNED_TO LIKE '%$search%' OR
                  CREATION_DATE LIKE '%$search%' OR
                  UPDATE_DATE LIKE '%$search%' OR
                  CATEGORY LIKE '%$search%' OR
                  TICKET_STATE LIKE '%$search%' OR
                  TICKET_PRIORITY LIKE '%$search%' OR
                  SHORT_DESC LIKE '%$search%' OR
                  LONG_DESC LIKE '%$search%' ";

        $search_query = mysqli_query($connection, $query);

        if (!$search_query) {

          die("QUERY FAILED" . mysqli_error($connection));
        }

        $count = mysqli_num_rows($search_query);

        if ($count == 0) {

          echo "<br><h1>NO RESULT</h1>";
        } else {

          while ($row = mysqli_fetch_assoc($search_query)) {
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
                <a href="#" class="btn btn-primary">Read More &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                <?php include "includes/search_result.php"; ?>
              </div>
            </div>

            <hr>

      <?php     }
        }
      }
      ?>


      <!-- Pagination
      <ul class="pagination justify-content-center mb-4">
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