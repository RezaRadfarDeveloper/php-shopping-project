<?php require_once("initialise.php");?>
<?php 
$username = '';
$password = '';
$errors = [];

if(is_post_request()){

$username = $_POST['user_name']?? '';
$password = $_POST['password'] ?? '';
echo $username.$password;

if(is_blank($username)){
    $errors[]= "username can't be blank";
}
if(is_blank($password)){
    $errors[]= "password can't be blank";
}
if(empty($errors)){
    $admin = find_staff_by_username($username);
    echo ($admin);
    // using the variable for message ensures that messages is the same and more security...
    $login_msg_failure = "login was unsuccessful.";
    if($admin){
        if(password_verify($password, $admin['hashed_password'])){
            //password matches
            $result = log_in_admin($admin);
            if($result){
            $_SESSION['message'] = "New staff has been logged in successfully";
            header("Location: index.php");
            }

        }else{
            // password not matched..username found but
            $errors[]= $login_msg_failure;
            // header("Location: new.php");

        }
    }

    else{
        // no username found....
        $errors[]= $login_msg_failure;
        // header("Location: edit.php?id=1");


    }
}
else
echo "there is an empty field";
}

?>
<?php $page_title = "Login admin";?>
<?php include(SHARED_PATH.'/admin_header.php'); ?>

<form action=<?php echo "login.php"; ?>  method="POST">
  <div class="form-group" >
    <label for="user_name">Username:</label>
    <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="emailHelp" placeholder="Enter User Name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>