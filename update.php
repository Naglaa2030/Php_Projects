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

$select="select * from users where ID = $id ";
$res=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($res);
}
?>
    <br>

<form method="post" action="Admainfunctions/collect.php">
<input type="hidden" name="id" value="<?php echo $id; ?>">
client privielages :<input type="number" name="cp" value="<?php echo $row['privileges'];?>">
<br>
<input type="submit" name="update" value="update">
</form>





<?php
require_once "includes/templates/footer.php";
?>