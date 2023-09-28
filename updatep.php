<?php
session_start();
$current="Update Information";

if(!isset($_SESSION['id'])){
header("location: login.php");
}

require_once "includes/connect.php";
require_once "includes/templates/header.php";
require_once "includes/templates/nav.php";
require_once "includes/templates/bread.php";



if(isset($_GET['id'])){

$id=$_GET['id'];

$select="select * from  where ID = $id ";
$res=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($res);
}
?>
    <br>

<form method="post" action="Admainfunctions/collect.php">
<input type="hidden" name="id" value="<?php echo $id; ?>">
client privielages :<input type="number" name="Price" value="<?php echo $row['price'];?>">
<br>
<input type="submit" name="updatep" value="update">
</form>





<?php
require_once "includes/templates/footer.php";
?>