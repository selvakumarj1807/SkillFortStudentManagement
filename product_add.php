<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Ecom";

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}
?>
<?php include('header.php') ?>

<!-- Include Bootstrap Datepicker & Timepicker CSS (Optional if not already included) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

<div class="content-wrapper">
    <section class="content-header">
        <h1>ADD Class</h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="box box-warning">
                    <div class="box-body">

                        <?php $category = $_GET['category']; ?>

                        <form role="form" action="product_save.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label for="course">Course</label>
                                <input type="text" class="form-control" id="course" name="course" value="<?php echo $category; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="course">Whatsapp Group Link</label>
                                <input type="text" class="form-control" id="whatsappLink" name="whatsappLink" placeholder="Enter Whatsapp Group Link" required>
                            </div>


                            <div class="form-group">
                                <label for="class_time">Class Time</label>
                                <input type="text" class="form-control timepicker" id="class_time" name="class_time" placeholder="Select Class Time" required>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="product.php?category=<?php echo $category; ?>" class="btn btn-secondary">Back</a>
                            
                        </form>

                    </div><!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('footer.php') ?>

<!-- Include jQuery, Bootstrap JS, Timepicker JS (Optional if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

<script>
$(document).ready(function() {
    
    // Initialize timepicker with 12-hour format
    $('.timepicker').timepicker({
        showMeridian: true,
        defaultTime: false
    });

    // Set today's date as default in date field
    let today = new Date().toISOString().split('T')[0];
    $('#start_date').val(today);

});
</script>
