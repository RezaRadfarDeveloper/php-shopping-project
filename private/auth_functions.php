<?php 
function log_in_admin($admin){
    //protects admin from session fixation risk....
    session_start();
    session_regenerate_id();
    $_SESSION['message'] = "New staff has been logged successfully";
    $_SESSION['admin_id']= $admin['id'];
    $_SESSION['last_login']= time();
    $_SESSION['user_name']= $admin['user_name'];
    return true;
}  

function log_admin_out(){
    // we can destroy the session but in the case we need it for other tasks we keep it...
    unset($_SESSION['admin_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['user_name']);
    return true;
}

function is_logged_in(){

        return $_SESSION['admin_id'];

}
function required_login(){

        if(!is_logged_in()){
            header("Location: login.php");
        }else{
            // do nothing and let the rest of process continue....
        }
}
    ?>