<?php include 'connection.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Categories</title>
<link rel="stylesheet" href="categories.css">
</head>
<body style="background-color:grey;">




<h1 style="font-style: italic; font-size: 32px;">Categories</h1>
<table border="1">
            <tr>
                <th>Category Id</th>
                <th>Category Description</th>
            </tr>      
			<?php while($category = mysqli_fetch_array($categories)) { ?>
               <tr>
               	   <td><?php echo $category['Category_ID']; ?></td> 
                <td><?php echo $category['Category_Description']; ?></td> 
                </tr>      
            <?php } ?>
</table>



<div class = "container">

    <div class = "insert">
        <p style="font-style: italic; font-size: 32px;"> Insert</p>
<form action= "process.php?action=1" method = "post">
<!-- Category ID : <input type = "text" name="category_ID"/><br> -->
Category Description  : <input type = "text" name="category_Description"/><br>
    <button type="submit">Insert</button>
</form>
</div>
<div class= "update">
     <p style="font-style: italic; font-size: 32px;"> Update</p>
<form action= "process.php?action=2" method = "post">
Category ID : <input type = "text" name="category_ID"/><br>
Category Description  : <input type = "text" name="category_Description"/><br>
    <button type="submit">Update</button>
</form>
</div>
<div class ="delete">
     <p style="font-style: italic; font-size: 32px;"> Delete</p>
<form action= "process.php?action=3" method = "post">
Category ID : <input type = "text" name="category_ID"/><br>
    <button type="submit">Delete</button>
</form>
</div>


</div>
</body>
</html>