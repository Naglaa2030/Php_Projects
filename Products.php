
<?php
session_start();
$current = "Products";

if(!isset($_SESSION['id'])){
   header("location:  login.php");
}

require_once "includes/connect.php";
require_once "includes/templates/header.php";
require_once "includes/templates/sidebar.php";
require_once "includes/templates/nav.php";

?>


<section style="height:1000px;">

<table width="100%" class=" table-bordered table-dark">
<tr>
<th  >ID</th>
<th  >Name</th>
<th  >Price</th>

<th >Serial</th>
<th>Descreption</th>
<th   >Category</th>
<th   >image</th>
<th   >Offer</th>
<th   >Delete</th>
<th   >Update</th>
</tr>
<tr>

<?php
$id=$_SESSION['id'];
$select="select * from productes  ";
    $res=mysqli_query($conn,$select);
   while($row=mysqli_fetch_assoc($res)){
   
?>



<td>
<?php echo $row['ID'];?> 
</td>
<td><?php echo $row['Name'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['Serial'];?></td>
<td><?php echo $row['Descreption'];?></td>
<td><?php

$select1="select * from category  ";
    $res1=mysqli_query($conn,$select1);
   while($row1=mysqli_fetch_assoc($res1)){
   
   

if($row1['Cat_ID']==$row['Category']){ echo $row1['Cat_Name'];}

   }
?>




</td>
<td><?php echo $row['Picture'];?></td>
<td><?php echo $row['Offer'];?></td>
<td><a href="Admainfunctions/deletep.php?id=<?php echo $row['ID'];?> " class="btn btn-danger">Delete</a></td>
<td><a href="updatep.php?id=<?php echo $row['ID'];?>" class="btn btn-primary">Update</a></td>
</tr>


<?php
   }
   
   
?>

</table>

<a href="addp.php" class="btn btn-success" > Add New Produect</a>

</section>







<?php
require_once "includes/templates/footer.php";
?>