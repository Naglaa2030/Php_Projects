<?php
session_start();
$current = "users";

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
<th  >Email</th>

<th >password</th>
<th>City</th>
<th   >privielages</th>
<th   >image</th>
<th   >Delete</th>
<th   >Update</th>
</tr>
<tr>

<?php
$id=$_SESSION['id'];
$select="select * from users  ";
    $res=mysqli_query($conn,$select);
   while($row=mysqli_fetch_assoc($res)){
   
?>



<td>
<?php echo $row['ID'];?> 
</td>
<td><?php echo $row['Name'];?></td>
<td><?php echo $row['Email'];?></td>
<td><?php echo $row['password'];?></td>
<td><?php

$select1="select * from City  ";
    $res1=mysqli_query($conn,$select1);
   while($row1=mysqli_fetch_assoc($res1)){
   
   

if($row1['C_ID']==$row['City']){ echo $row1['C_Name'];}

   }
?>




</td>
<td><?php if($row['privileges']==0){echo "user";}else{echo "Admain";} ?></td>
<td><?php echo $row['Picture'];?></td>
<td><a href="Admainfunctions/delete.php?id=<?php echo $row['ID'];?> " class="btn btn-danger">Delete</a></td>
<td><a href="update.php?id=<?php echo $row['ID'];?>" class="btn btn-primary">Update</a></td>
</tr>


<?php
   }
   
   
?>

</table>

<a href="add.php" class="btn btn-success" > Add New Client</a>

</section>







<?php
require_once "includes/templates/footer.php";
?>