<?php include 'connection.php';?>

<!-- insert,update and delete in subcategory. -->

<?php
if($_GET["action"]){
	$action = $_GET["action"];
	if($action==1){



$option = isset($_POST['pickCategory']) ? $_POST['pickCategory'] : false;
   if ($option) {
     echo htmlentities($_POST['pickCategory'], ENT_QUOTES, "UTF-8");

   } else {
     echo "task option is required";
     exit; 
   }
 $fetchCatId = mysqli_query($connection,"SELECT * FROM Category WHERE Category_Description = '$option'");


$value =  mysqli_fetch_array($fetchCatId);
$result =  $value['Category_ID'];

	$SubCategorysql="INSERT INTO Subcategory (SubCategory_ID,Category_ID,Description)
VALUES
(NULL,'$result','$_POST[subCategory_Description]')";
if (!mysqli_query($connection,$SubCategorysql))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
	}
	else if($action==2){
	$SubCategorysql = "UPDATE Subcategory SET Description = '$_POST[subcategory_Description]' ,Category_ID = '$_POST[subcategory_Description]'
	 WHERE SubCategory_ID = '$_POST[subcategory_ID]';";

	//we should be allowed to change to category descripiton only if the category description's id exist. stating that whether this category exists or not.
		if (!mysqli_query($connection,$SubCategorysql))
		  {
		  die('Error: ' . mysql_error());
		  }
		  echo "1 record updated";


	}else{
	$SubCategorysql="DELETE  FROM  Subcategory WHERE SubCategory_ID = '$_POST[subcategory_ID]'; ";

 
if (!mysqli_query($connection,$SubCategorysql))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record deleted";
 	
	}
}
?>