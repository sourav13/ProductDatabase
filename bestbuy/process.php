<?php include 'connection.php';?>

<!-- insert,update and delete in category. -->
<?php
if($_GET["action"]){
	$action = $_GET["action"];
	if($action==1){
	$Categorysql="INSERT INTO Category (Category_Description)
VALUES
('$_POST[category_Description]')";
 
if (!mysqli_query($connection,$Categorysql))
  {
  die('Error: ' . mysql_error());
  }
  //take action to redirect back to the page
echo "1 record added";
 	
	}else if($action==2){
		$Categorysql = "UPDATE Category SET Category_Description = '$_POST[category_Description]' WHERE Category_ID = '$_POST[category_ID]';";
		if (!mysqli_query($connection,$Categorysql))
		  {
		  die('Error: ' . mysql_error());
		  }
		  echo "1 record updated";
	}else{
	$Categorysql="DELETE  FROM  Category WHERE Category_ID = '$_POST[category_ID]'; ";

 
if (!mysqli_query($connection,$Categorysql))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record deleted";
 	
	}
}
?>