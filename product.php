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

    <div class="classList">
      <div class="container-ClassList">
        <h1 id="h1id01">Today Python Class</h1>

        <div class="summary">
          <div class="summary-card">
            <h2 id="enquiryCount">0</h2>
          </div>
        </div>

        <div class="filters">
          <input type="text" id="searchInput" placeholder="Search Batch Number, Date or Time" />
          <button id="resetBtn">Reset Filters</button>
        </div>

        <div id="enquiryList" class="card-grid">

          <?php
          $slno = 0;
          $result = mysqli_query($conn, "SELECT * FROM `products` WHERE `course`='$category'  ORDER BY `id` DESC");

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

            <div class="card">
              <div class="menu-container">
                <button class="menu-btn">⋮</button>
                <div class="dropdown-menu">
                  <a href="#" class="menu-link edit-link">Edit</a>
                  <a href="#" class="menu-link delete-link">Delete</a>
                </div>
              </div>
              <h3 class="enquiry-id"><?php echo $class_name; ?></h3>
              <h4><?php echo $class_time; ?></h4>
              <div class="course-badge"><a href="<?php echo $whatsappLink; ?>" target="_blank">Whatsapp Group Link</a>
              </div>
              <div class="card-footer">
                <div><strong>Start Date:</strong><br><?php echo date("d/m/Y", strtotime($start_date)); ?></div>
                <div>
                  <strong>End Date:</strong><br>
                  <?php
                  if (!empty($end_date)) {
                    echo date("d/m/Y", strtotime($end_date));
                  } else {
                    echo "";
                  }
                  ?>
                </div>
              </div>
            </div>

          <?php
          }
          ?>

          <!-- You can add more cards similarly -->

        </div>

        <div class="pagination" id="pagination"></div>
      </div>
    </div>


    <!-- ./col -->
  </div><!-- /.row -->
</div><!-- /.row -->



<?php include('footer.php') ?>