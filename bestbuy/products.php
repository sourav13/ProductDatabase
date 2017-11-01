<?php include 'connection.php';?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<link rel="stylesheet" type="text/css" href="categories.css">
</head>
<body style="background-color:grey;">
<?php 

$productSub= mysqli_query($connection,"SELECT Product_ID,Product_Name,Price ,Subcategory.Description,Category_Description FROM Product,Subcategory,Category WHERE Product.SubCategory_ID = Subcategory.SubCategory_ID && Subcategory.Category_ID = Category.Category_ID");
$subcategoryz = mysqli_query($connection,"SELECT Description FROM Subcategory ");
?>





<h1 style="font-style: italic; font-size: 32px;">Products</h1>

<table border="1">
            <tr>
                <th>Product Id</th>
                <th>Product  Name</th>
                <th>Product Price</th>
                <th>Product Subcategory</th>
                <th>Product Category</th>

            </tr>      
	<?php while($product = mysqli_fetch_array($productSub)) { ?>
               <tr>
               	<td> <?php echo $product['Product_ID']; ?>   </td> 
               	   <td> <?php echo $product['Product_Name']; ?>   </td> 
               <td> <?php echo $product['Price']; ?>   </td> 
			    <td> <?php echo $product['Description']; ?>   </td> 
				<td> <?php echo $product['Category_Description']; ?>   </td> 
                </tr>      
            <?php } ?>
			<?php 
			// $row_cnt = $productSub->num_rows;

				//	printf("Result set has %d rows.\n", $row_cnt);

			?>
             </table>

<div class = "container">

    <div class = "insert">
        <p style="font-style: italic; font-size: 32px;"> Insert</p>
<form action= "productqueries.php?action=1" method = "post">
<!-- Product ID : <input type = "text" name="Product_ID"/><br> -->
Product Name   : <input type = "text" name="Product_Name"/><br>
Product Price : <input type = "text" name="Product_Price"/><br>

Pick SubCategory:<?php 
echo '<select name = "pickSubCategory" id ="pickSubCategory">';
  while($row =  mysqli_fetch_array($subcategoryz)){
  echo "<option value='" . $row['Description'] ."'>" . $row['Description'] ."</option>";
}

echo '</select>';

?>
<br>
<!-- Product SubCategory ID: <input type = "text" name="Product_Subcategory_ID"/><br> -->
<!-- change to dropdown -->
  <button type="submit">Insert</button>
</form>
</div>
<div class= "update">
     <p style="font-style: italic; font-size: 32px;"> Update</p>
<form action= "productqueries.php?action=2" method = "post">
Product ID : <input type = "text" name="Product_ID"/><br>
Product Name   : <input type = "text" name="Product_Name"/><br>
Product Price : <input type = "text" name="Product_Price"/><br>
<!-- Product SubCategory ID: <input type = "text" name="Product_Subcategory_ID"/><br>
change to dropdown -->
  <button type="submit">Update</button>
</form>

</div>
<div class ="delete">
     <p style="font-style: italic; font-size: 32px;"> Delete</p>
<form action= "productqueries.php?action=3" method = "post">
Product ID : <input type = "text" name="product_ID"/><br>

  <button type="submit">Delete</button>
</form>
</div>


</div>

</body>
</html>