<?php

function u($string=""){
    return urlencode($string);
}
function u_raw($string=""){
    return urlrawencode($string);
}
function url_for($script_path){
    if($script_path[0]!='/')
    $script_path = '/'.$script_path;
    return WWW_ROOT.$script_path;
}

function h($string=""){
    return htmlspecialchars($string);
}
function find_all_staffs(){
    global $db;
    $qry = "SELECT * FROM staffs ";
    $qry .= "ORDER BY email ASC";
    $result = mysqli_query($db, $qry);
    confirm_result_set($result);
    return $result;
}
function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}
function find_staff_by_id($id){
    global $db;
    $sql = "select * from staffs ";
    $sql .= "where id='".db_escape($db,$id)."'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $staff = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $staff;
}
function find_staff_by_username($username){
    global $db;
    $sql = "select * from staffs ";
    $sql .= "where user_name='".db_escape($db,$username)."'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $staff = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $staff;
}

function delete_staff($id){  
    global $db;
    $sql = "delete from staffs ";
    $sql .= "where id='".db_escape($db,$id)."'";
    $sql .= " limit 1";
    $result = mysqli_query($db, $sql);
    if($result){
            return true;
            }
        else{
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
            }
    }
function update_staff($staff){
    global $db;

   $password_sent =!is_blank($staff['hashed_password']);
   



    $errors = validate_staff($staff,['password_required'=> $password_sent]);
    // using !empty helps not get in to database if there is any error...
    if(!empty($errors)){
      return $errors;  

    }
         $sql = "update staffs set ";
    $sql .= "first_name='".db_escape($db,$staff['first_name'])."',";
    $sql .= "last_name='".db_escape($db,$staff['last_name'])."',";
    if($password_sent){
     $sql .= "hashed_password='".db_escape($db,$staff['hashed_password'])."',";
    }
    $sql .= "email='".db_escape($db,$staff['email'])."' ";
    $sql .= "where id='".db_escape($db,$staff['id'])."' ";
    $sql .= "limit 1";
    $result = mysqli_query($db, $sql);
    if($result){
        return true;
        }
        else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
         
   
        }

function insert_staff($staff){
    global $db;

    $errors = validate_staff($staff);
    if(!empty($errors)){
      return $errors;  

    }
    $staff['hashed_password'] = password_hash($staff['password'],PASSWORD_BCRYPT);
    $sql = "insert into staffs ";
    $sql .= "(first_name,last_name, email, image, user_name, hashed_password) ";
    $sql .= "values (";
    $sql .= "'".db_escape($db,$staff['first_name'])."',";
    $sql .= "'".db_escape($db,$staff['last_name'])."',";
    $sql .= "'".db_escape($db,$staff['email'])."',";
    $sql .= "'".db_escape($db,$staff['image'])."',";
    $sql .= "'".db_escape($db,$staff['user_name'])."',";
    $sql .= "'".db_escape($db,$staff['hashed_password'])."')";
    $result = mysqli_query($db, $sql);
    if($result){
        return true;
    }
    else{
        echo mysqli_error($db);
        db_disconnect($db);
        exit;

    }
}

function has_unique_user_name($staff_user_name){
    global $db;

        $sql = "select * from staffs ";
        $sql .= "where user_name='".db_escape($db,$staff_user_name)."'";
        // $sql .= "and id!='".db_escape($db,$current_id)."'";
        $staff_set = mysqli_query($db, $sql);
        // print_r($staff_set."errorrrrr");
       

            $staff_count = mysqli_num_rows($staff_set);
                         mysqli_free_result($staff_set);
                         return $staff_count === 0;
        
}
function validate_staff($staff,$options=[]){

    // $password_required = $options['password_required']?? true ;
    if(is_blank($staff['first_name']))
    $errors []= "First name field should be filled";
    elseif (!has_length($staff['first_name'],['min'=> 3 ,'max' => 100]))
    $errors []= "name should be less than 100 character and more than 2";
    if(is_blank($staff['last_name']))
    $errors []= "last name field should be filled";
    elseif (!has_length($staff['last_name'],['min'=> 3 ,'max' => 100]))
    $errors []= "last name should be less than 100 character and more than 2";
    if(is_blank($staff['email']))
    $errors []= "email field should be filled";
    elseif (!has_length($staff['email'],['max' => 100]))
    $errors []= "email should be less than 100 character";
    elseif (!email_is_valid($staff['email']))
    $errors []= "email format should be as below";
    if(is_blank($staff['user_name']))
    $errors []= "username field should be filled";
    elseif (!has_length($staff['user_name'],['min'=> 4,'max' => 100]))
    $errors []= "User name should be more than 4 less than 100 character";
    if (!has_unique_user_name($staff['user_name']))
    $errors []= "User name should be unique";
    // print_r($staff['password']."--".$staff['confirm_password']);
    if(is_blank($staff['password']))
    $errors[]= "password cannot be empty...";
    elseif(!has_length($staff['password'],['min'=> 8]))
    $errors[]= "password should be at least 8 characters... ";
    elseif(!preg_match('/[A-Z]/', $staff['password']))
    $errors[]= "password should contain Caps letter...";
    elseif(!preg_match('/[a-z]/', $staff['password']))
    $errors[]= "password should contain Lower letter... ";
    elseif(!preg_match('/[0-9]/', $staff['password']))
    $error[]= "password should contain Lower letter... ";
    elseif(!preg_match('/[^A-Za-z0-9\s]/', $staff['password']))
    $errors[]= "password should contain symbol... ";
    // print_r($errors);
    
    if(is_blank($staff['confirm_password'])){
    $errors[]= "confirm password cannot be empty...";
    }
    elseif(($staff['password'] !== $staff['confirm_password'])){
    $errors[]= "password and confirm password are not matched";
    }
    return $errors;
}
function display_errors($errors= array()){

    $output = '';
    if(!empty($errors)){
    $output .= "<div class=\"errors\">";
    $output .= "Please Fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error){
    $output .= "<li>".$error."</li>";
    
    }
    $output .= "</ul></div>";
     
    }
    return $output;
    }

    function get_and_clear_session_message(){
        if(isset($_SESSION['message']) && $_SESSION['message']!=''){
            $msg = $_SESSION['message'];
            unset($_SESSION['message']);
            return $msg;
        }
    }

    function display_session_message(){
        $msg = get_and_clear_session_message();
        if(!is_blank($msg)){
            return '<div id="message">'.$msg.'</div>';
        }
     
    }

    // i will create image column in database first.....
   


?>
    