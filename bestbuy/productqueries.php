<?php include 'connection.php';?>

<!-- insert,update and delete in product. -->

<?php
if($_GET["action"]){
	$action = $_GET["action"];
	if($action==1){


	$option = isset($_POST['pickSubCategory']) ? $_POST['pickSubCategory'] : false;
   if ($option) {
     echo htmlentities($_POST['pickSubCategory'], ENT_QUOTES, "UTF-8");

   } else {
     echo "task option is required";
     exit; 
   }


    $fetchSubCatId = mysqli_query($connection,"SELECT * FROM Subcategory WHERE Description = '$option'");


$value =  mysqli_fetch_array($fetchSubCatId);
$result =  $value['SubCategory_ID'];
echo $result;

	$Productsql="INSERT INTO Product (Product_ID, Product_Name,SubCategory_ID,Price)
VALUES
(NULL,'$_POST[Product_Name]','$result','$_POST[Product_Price]')";
 
if (!mysqli_query($connection,$Productsql))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
 	
	}else if($action==2){
	$SubCategorysql = "UPDATE Product SET Price = '$_POST[Product_Price]' ,Product_Name = '$_POST[Product_Name]' ,SubCategory_ID = '$_POST[Product_Subcategory_ID]'
	 WHERE Product_ID = '$_POST[Product_ID]'";

	//we should be allowed to change to category descripiton only if the category description's id exist. stating that whether this category exists or not.
		if (!mysqli_query($connection,$SubCategorysql))
		  {
		  die('Error: ' . mysql_error());
		  }
		  echo "1 record updated";
	}else{
	$Productsql="DELETE  FROM  Product WHERE Product_ID = '$_POST[product_ID]'; ";

 
if (!mysqli_query($connection,$Productsql))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record deleted";
 	
	}
}
?>