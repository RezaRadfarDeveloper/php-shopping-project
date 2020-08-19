<?php
require_once("initialise.php");?>
<?php 
// required_login();
echo $_SESSION['admin_id'];
?>

<?php $page_title = "Index admin";?>
<?php include(SHARED_PATH.'/admin_header.php'); ?>

<?php 
//test here- should be deleted
if(!isset($_GET['id'])){
header("Location: index.php");
}
$id = $_GET['id'];

// echo $id."test"."</br>";
if(is_post_request()){
    $staff = [];
    // edit acts  create now....
   
    

    $staff['id'] = $id;

    $staff['hashed_password'] = $_POST['password'] ?? '';
    $staff['first_name'] = $_POST['first_name'] ?? '';
    $staff['last_name'] = $_POST['last_name'] ?? '';
    $staff['email'] = $_POST['email'] ?? '';
    $result = update_staff($staff);
    if($result=== true){

      $_SESSION['message'] = " this staff details has been edited successfully";
      header("Location: edit.php?id=".$id);

    }
    else{
        $errors = $result;
        // var_dump($errors);
    }
} 

$staff = find_staff_by_id($id);
$staffs = find_all_staffs();
$staffs_count = mysqli_num_rows($staffs);
mysqli_free_result($staffs);
?>

<?php echo display_errors($errors); ?>

<form action=<?php echo "edit.php?id=".$id; ?>  method="POST">
  <div class="form-group" >
    <label for="first-name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp" value="<?php echo $staff['first_name'];?>" placeholder="First Name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="last-name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $staff['last_name'];?>" placeholder="Last name">
  </div>
  
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $staff['email'];?>" placeholder="email">
    </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="conformed_password">Confirm Password</label>
    <input type="text" class="form-control" id="confirmed_password" name="confirmed_password" value="<?php echo $staff['hashed_password'];?>" placeholder="Confirm Password">
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



<?php include(SHARED_PATH.'/admin_footer.php'); ?>


 


  


