<?php
require_once("initialise.php");?>
<!-- echo $_SESSION['admin_id']; -->
<?php 
required_login();
?>
<?php
$id = $_GET['id']?? "1";
$sql = "select * from staffs ";
$sql .= "where id='".db_escape($db,$id)."'";
$result = mysqli_query($db, $sql);
confirm_result_set($result);
$staff = mysqli_fetch_assoc($result);
mysqli_free_result($result);


?>
<div class="show staff">
<p><?php echo $staff['id'];?></p>
<p><?php echo $staff['first_name'];?></p>
<p><?php echo $staff['last_name'];?></p>
<p><?php echo $staff['email'];?></p>
<?php if($staff['image']=="")
echo "<strong>no image has been selected for the staff</strong>";
else{?>

<p><?php echo "<img src='".WWW_ROOT."/public/img/".$staff['image']."' alt='".$staff['first_name']."'/>";?></p>


<?php } ?>
 
</div>
