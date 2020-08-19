<?php require_once("initialise.php");?>
<?php
if(is_post_request()){
echo "we are here";
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    else{
        print_r("no id was sent");
    }
    $result = delete_staff($id);
    if($result===true){
        echo $id;
    }
    else{
        echo "0";
    }
}
?>