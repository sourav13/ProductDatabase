<?php include 'connection.php';?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="categories.css">
<title>SubCategories</title>
</head>
<body style="background-color:grey;">

<?php 

$catsub = mysqli_query($connection,"SELECT Subcategory.SubCategory_ID ,Category.Category_Description , Subcategory.Description as Description FROM Category,Subcategory WHERE Category.Category_ID = Subcategory.Category_ID");

$categoryz = mysqli_query($connection,"SELECT Category_Description FROM Category ");
?>
<h1 style="font-style: italic; font-size: 32px;">Subcategories</h1>
<table border="1">
            <tr>
                <th>SubCategory Id</th>
                <th>Sub Category Description</th>
                <th>Category </th>
            </tr>
          <?php while($subcategory = mysqli_fetch_array($catsub)) { ?>
               <tr>
               	<td> <?php echo $subcategory['SubCategory_ID']; ?>   </td> 
                	<td> <?php echo $subcategory['Description']; ?>   </td> 
						<td> <?php echo $subcategory['Category_Description']; ?>   </td> 
					
                </tr>      
            <?php } ?>
		 
             </table>


<div class = "container">

    <div class = "insert">
        <p style="font-style: italic; font-size: 32px;"> Insert</p>
<form action= "subcategoryqueries.php?action=1" method = "post">
<!-- SubCategory ID : <input type = "text" name="subcategory_ID"/><br> -->
<!-- Category ID : <input type = "text" name="category_ID"/><br>
change to dropdown -->
Pick Category:<?php 
echo '<select name = "pickCategory" id ="pickCategory">';
  while($row =  mysqli_fetch_array($categoryz)){
  echo "<option value='" . $row['Category_Description'] ."'>" . $row['Category_Description'] ."</option>";
}

echo '</select>';
echo '<br>';
?>

SubCategory Description  : <input type = "text" name="subCategory_Description"/><br>
  <button type="submit">Insert</button>
</form>

</div>
<div class= "update">
     <p style="font-style: italic; font-size: 32px;">Update</p>
<form action= "subcategoryqueries.php?action=2" method = "post">
SubCategory ID : <input type = "text" name="subcategory_ID"/><br>
Category ID : <input type = "text" name="category_ID"/><br>
<!-- SubCategory Description  : <input type = "text" name="subcategory_Description"/>
change to dropdown -->
<br>
  <button type="submit">Update</button>
</form>

</div>
<div class ="delete">
     <p style="font-style: italic; font-size: 32px;">Delete</p>
<form action= "subcategoryqueries.php?action=3" method = "post">
SubCategory ID : <input type = "text" name="subcategory_ID"/><br>
  <button type="submit">Delete</button>
</form>
</div>


</div>

</body>
</html>