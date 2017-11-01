<?php
function open_connection(){
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$conn = new mysqli($dbhost,$dbuser,$dbpass,"bestbuy2") or die("Cannot connect to the database: %s\n".$conn->error);
	return $conn;
}

function close_connection($conn){
	$conn->close();
}

$connection = open_connection();
$products = mysqli_query($connection,"SELECT * FROM Product");
$categories = mysqli_query($connection,"SELECT * FROM Category");
$subcategories = mysqli_query($connection,"SELECT * FROM Subcategory");

//$categoryOfSub = mysqli_query($connection,"SELECT * FROM Subcategory INNER JOIN Category ON Subcategory.SubCategory_ID = Category.Category_ID ");
//$catsub = mysqli_query($connection,"SELECT Category.Category_Description, Subcategory.Description FROM Category,Subcategory WHERE Category.Category_ID = Subcategory.SubCategory_ID");
if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//mysqli_close($connection);

?>