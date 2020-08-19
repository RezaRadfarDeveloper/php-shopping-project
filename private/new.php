<?php
require_once("initialise.php");?>
<?php 

required_login();
?>

<?php $page_title = "New page";?>
<?php include(SHARED_PATH.'/admin_header.php'); ?>
<?php
if (is_post_request()){
    $staff = [];
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_name_split = explode('.',$image_name);
    // $imageExt = strtolower(end($image_name_split));
    // $allowedExt = array('jpg','jpeg','png');
    // $target = PUBLIC_PATH."/"."img/".$image_name;
    $target = IMAGE_PATH.$image_name;
    $staff['first_name'] = $_POST['first_name'] ?? '';
    $staff['email'] = $_POST['email'] ?? '';
    $staff['last_name'] = $_POST['last_name'] ?? '';
    $staff['user_name'] = $_POST['user_name'] ?? '';
    $staff['image'] = $image_name;
    
    $staff['password'] = $_POST['password']; 
    $staff['confirm_password'] = $_POST['confirm_password']; 
    // password_hash($_POST['password'],PASSWORD_BCRYPT);
    // $staff['confirm_password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);

    
    
    $result = insert_staff($staff);
    if($result===true){
      $new_id = mysqli_insert_id($db);
      $result_upload = move_uploaded_file($image_temp,$target);
      $_SESSION['message'] = "New staff has been created successfully";
      header("Location: show.php?id=".$new_id);
    }

    // print_r($_FILES['image']['error']."error number");

   

    else{
      
        $errors = $result;
        // print_r($errors);
        // display_errors($errors);
    }
    
    }?>
   
        <?php echo display_errors($errors); ?>
        
        
        <form action=<?php echo "new.php"; ?>  method="POST" enctype="multipart/form-data">
  <div class="form-group" >
    <label for="first-name">First Name:</label>
    <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="emailHelp" placeholder="Enter First Name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="last-name">Last Name:</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="user_name">User Name:</label>
    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="user_name">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password"  value="" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="confirm_password">confirm_password</label>
    <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" placeholder="Confirm Password">
  </div>
  <div class="form-group">
    <label for="image">Upload Image</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="Upload File">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        <p>password Should be at least 8 character long,
         including lower case, uper case, number and symbol</p>
<?php include(SHARED_PATH.'/admin_footer.php'); ?>
       
        
    