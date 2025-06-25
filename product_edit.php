<?php 
session_start();
 require 'db.php';
$username = $_SESSION["username"];
$company_name="Skill Fort";
$id = $_REQUEST["id"];

if(!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
 {
     header("Location:index.php");
     exit();
 }

?>
<?php include('header.php')?>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Edit Image          
          </h1>
          </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            
           
            <div class="col-lg-12">

             <div class="box box-warning">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" action="product_update.php" method="POST" enctype="multipart/form-data">

                  <?php
                $result= mysqli_query($conn,"SELECT * FROM `products` where id = '$id' ")or die (mysql_error());
                while($row=mysqli_fetch_array ($result))
                { 
                     $id = $row['id'];

                     $category = $row['category'];
					  $name= $row['name'];
					  $item_id= $row['item_id'];
                     $image = $row['image'];
                    
                     $rate1= $row['rate1'];
                     $rate2 = $row['rate2'];
                     $type = $row['type'];
					 $instock = $row['instock'];
                     $saleqty = $row['saleqty'];
					 $description= $row['description'];
					 $display=$row['display'];
					 $offer=$row['offer'];
                }  ?> 
                    <!-- text input -->
                    
                      <input type="hidden" name="id" value="<?php echo $id; ?>" />
                   
         <div class = "form-group">
						<br><br><label>Category</label>
						<input type = "text" class = "form-control" name = "category" value="<?php echo $category;?>">
					</div> 
						<div class="form-group">
            <label>Choose a Product:</label>
            <select class ="form-control" name = "display">   
            <option value="all product"><?php echo $display;?></option>			
            <option value="all product">All Product</option>
			<option value="popular">Popular</option>
			
			</select>
		    </div>
					<div class = "form-group">
						<br><br><label>Name</label>
						<input type = "text" class = "form-control" name = "name" value="<?php echo $name;?>" placeholder="English  ,  தமிழ்  ,  हिन्दी(Hindi)">
					</div>
					<div class = "form-group">
						<br><br><label>Item Id</label>
						<input type = "text" class = "form-control" name = "item_id" value="<?php echo $item_id;?>">
					</div>
                
                  <div class="form-group">
				  <label for="save">Image </label>
				   <img src="Upload/<?php echo $image;?>" height="100px">
                            <input type="file" name="image" accept="image/*" >
                                 <input class="file-path validate" type="hidden" placeholder="Choose your profile image" >

                  </div>
                   
                
                <br>
				   <br>
				<br><br>
				<br><br>
               
				
				
				 <br>
				 <div class = "form-group">
						<br><br><label>Rate1</label>
						<input type = "text" class = "form-control" name = "rate1" value="<?php echo $rate1;?>">
					</div><div class = "form-group">
						<br><br><label>Rate2</label>
						<input type = "text" class = "form-control" name = "rate2" value="<?php echo $rate2;?>">
					</div><div class = "form-group">
						<br><br><label>Type</label>
						<input type = "text" class = "form-control" name = "type" value="<?php echo $type;?>" placeholder="Kilogram , Gram , Litter ">
					</div>
					<div class = "form-group">
						<br><br><label>Offer</label>
						<input type = "text" class = "form-control" name = "offer" value="<?php echo $offer;?>">
					</div>
				
				<div class = "form-group">
						<label>In Stock</label>
						<input type = "text" class = "form-control" name = "instock" value="<?php echo $instock;?>">
					</div>
					
				<div class = "form-group">
						<label>Sold Quantity</label>
						<input type = "text" class = "form-control" name = "saleqty" value="<?php echo $saleqty;?>">
					</div>
                    <div class="form-group">
                  <label for="comment">Description</label>
            <textarea class="form-control" rows="5" id="description" name = "description" ><?php echo $description;?></textarea>
                     </div>	
					
					 
					     
                <br>
                <br>
            
                       
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="product.php?category=<?php echo $category; ?>"><button type="button" class="btn btn-primary">Back</button></a>

                 
                </div><!-- /.box-body -->  
              </div>

            
           
    
                  
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
           
            <!--/////////////////////////////////////////////////////////////////////////-->
          </div>
         

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>