<?php
require('db.php');

$id=$_POST['id'];


$category=$_POST['category'];
$name=$_POST['name'];


$item_id=$_POST['item_id'];

$type=$_POST['type'];


$rate1=$_POST['rate1'];

$rate2=$_POST['rate2'];
$instock=$_POST['instock'];

$saleqty=$_POST['saleqty'];


$description=$_POST['description'];
$offer=$_POST['offer'];
$display=$_POST['display'];


$res = mysqli_query($conn,"Select * from products");  
$no = mysqli_num_rows($res)+1;

//image1


if($_FILES['image']['tmp_name']!=''){
	$sourcePath1= $_FILES['image']['tmp_name'];
$targetPath1 = "Upload/".$_FILES['image']['name'];
$filename1 = $_FILES['image']['name'];
if(move_uploaded_file($sourcePath1,$targetPath1)) {
   $image=$filename1;
  
}
  $sql="UPDATE `products` SET `category`='{$category}',`name`='{$name}',`item_id`='{$item_id}',`image`='{$image}',`type`='{$type}',`instock`='{$instock}',`saleqty`='{$saleqty}',`description`='{$description}',`offer`='{$offer}',`display`='{$display}'
WHERE `id`='$id'";

}
if($_FILES['image']['tmp_name']==''){
	$sourcePath1= $_FILES['image']['tmp_name'];
$targetPath1 = "Upload/".$_FILES['image']['name'];
$filename1 = $_FILES['image']['name'];
if(move_uploaded_file($sourcePath1,$targetPath1)) {
   $image=$filename1;
  
}
 $sql="UPDATE `products` SET  `category`='{$category}',`name`='{$name}',`item_id`='{$item_id}',`rate1`='{$rate1}',`rate2`='{$rate2}',`type`='{$type}',`instock`='{$instock}',`saleqty`='{$saleqty}',`description`='{$description}',`offer`='{$offer}',`display`='{$display}'
WHERE `id`='$id'";
}




if($conn->query($sql)==TRUE)
{
echo "<script>alert('Updated Successfully!');</script>";
echo "<script type='text/javascript'>

window.location.href = 'product.php?category=$category';
</script>";
}
if($conn->$connect_error)
{


echo "Error: ".$sql."<br>".$conn->error;

}

?>
