<?php
$current = "Add New Client";
require_once "includes/connect.php";
require_once "includes/templates/header.php";
require_once "includes/templates/nav.php";
require_once "includes/templates/bread.php";

?>



    <br>
<form method="post" action="Admainfunctions/collect.php" enctype="multipart/form-data">
<br>
Client Name:<input type="text" name="name">
<br><br>
Client Email :<input type="email" name="email">
<br><br>
Client Password :<input type="password" name="pass">
<br><br>
Client privielages :
<br><br>
<input type="radio" name="cp" value="1">admain

<input type="radio" name="cp" value="0">user
<br><br>
client Image : <input type="file" name="pic">
<br><br>
city Name :
<select name="city">
<?php
$select="select * from city";
$city=mysqli_query($conn,$select);
while($row=mysqli_fetch_assoc($city)){
    ?>

  <option value="<?php echo $row['C_ID'] ;?>">
  <?php echo $row['C_Name'];?></option>
  <?php
}
?>

</select>
<br>
<br>
<br>
<input type="submit" name="newclient" value="ADD New Client" class=" btn btn-success">
</form>











<?php

require_once "includes/templates/footer.php";

?>

