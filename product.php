<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Skill Fort";

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
  header("Location:index.php");
  exit();
}

?>


<?php include('header.php') ?>

<?php
$category = $_GET["category"];
?>
<div class="content-wrapper">
  <div class="container-table">
    <br>
    <section class="content-header">
      <h1>
        <?php echo $category; ?> Class
      </h1>
    </section>
    <br>
    <br />
    <div class="form-group float-right">
      <a href="product_add.php?category=<?php echo $category; ?>"><button class="btn btn-success">Add Batch</button></a>

    </div>

    <div id="table-content" class="table-responsive"> <!-- Add responsive wrapper here -->
      <table id="bootstrapdatatable" class="table table-hover table-bordered table-striped">
        <thead class="thead-light">
          <tr>
            <th>Id</th>
            <th>Course</th>
            <th>Batch Number</th>
            <th>Class Name</th>
            <th>Whatsapp Group Link</th>
            <th>Class Time</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $slno = 0;
          $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `course`='$category' ");

          while ($row_result = mysqli_fetch_array($result)) {
            $slno++;
            $item_id = $row_result['id'];
            $course = $row_result['course'];
            $batch_number = $row_result['batch_number'];
            $class_name = $row_result['class_name'];
            $class_time = $row_result['class_time'];
            $start_date = $row_result['start_date'];
            $whatsappLink = $row_result['whatsappLink'];
            $end_date = $row_result['end_date'];
          ?>
            <tr>
              <td><?php echo $slno; ?></td>
              <td><?php echo $course; ?></td>
              <td><?php echo $batch_number; ?></td>
              <td><?php echo $class_name; ?></td>
              <td><a href="<?php echo $whatsappLink; ?>" target="_blank"><?php echo $whatsappLink; ?></a></td>
              <td><?php echo $class_time; ?></td>
              <td><?php echo $start_date; ?></td>
              <td><?php echo $end_date; ?></td>
              <td>
                <a href="product_edit.php?id=<?php echo $row_result['id']; ?>"> <i class="fa fa-edit" style="color:red"></i></a> &nbsp;&nbsp;&nbsp;
                <a href="product_remove.php?id=<?php echo $row_result['id']; ?>&category=<?php echo $row_result['course']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a><br>
                <a href="#" style="color: orange;">Student Details</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table> <!-- Proper closing -->
    </div>


    <!-- ./col -->
  </div><!-- /.row -->
</div><!-- /.row -->



<?php include('footer.php') ?>