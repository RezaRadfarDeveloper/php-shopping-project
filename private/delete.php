<?php
require_once("initialise.php");?>
<?php
// echo $_SESSION['admin_id'];
required_login();
if(is_post_request()){
   $id = $_POST['id']; 
    $result = delete_staff($id);
    echo $id;
    $_SESSION['message'] = " staff has been deleted successfully";
    header("Location: index.php");
    }
    else{
    $staff = find_staff_by_id($id);
    }
//test here- should be deleted
if(!isset($_GET['id'])){
header("Location: index.php");
}
$id = $_GET['id'];


    //Delete the requeste if it is a POST....
   


?>

Are You Sure You Want Delete the Current Staff Record?
<form action=<?php echo "delete.php?id=".$id; ?>  method="POST">
First Name:<input type="text" name="id" value="<?php echo $staff['id'];?>">  <br><br>
First Name:<input type="text" name="first_name" value="<?php echo $staff['first_name'];?>">  <br><br>
Last Name:<input type="text" name="last_name" value="<?php echo $staff['last_name'];?>">  <br><br>
<input type="submit" value="Delete Record">
</form>




 

  


 