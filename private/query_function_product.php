<?php 
function find_all_products(){
    
    global $db;
    $qry = "SELECT * FROM products ";
    $qry .= "ORDER BY category ASC";
    $result = mysqli_query($db, $qry);
    confirm_result_set($result);
    return $result;
}

function insert_product($product){
    global $db;

    $qry = "insert into products";
    $qry .= "(category, price, description, in_stock,image_path) ";
    $qry .= "values (";
    $qry .="'".$_POST['category']."',";
    $qry .="'".$_POST['price']."',";
    $qry .="'".$_POST['description']."',";
    $qry .="'".$_POST['in_stock']."',";
    // json value cannot be empty and should be added ..to be fixed
    // $qry .="'".$_POST['attribute']."',";
    $qry .="'".$_POST['image_path']."')";

    $result = mysqli_query($db,$qry);
    if($result ===true){
        return true;
    }else{
           echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    
}

function delete_product($id){

    global $db;
    
        $id = $_GET['id'];
        $qry = "delete from products ";
        $qry .= "where id='".$id."'";
        $qry .= "limit 1";
        $result = mysqli_query($db,$qry);
        if($result===true){
           return true;
        }else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }


function find_product_by_id($id){

    global $db;
    $qry = "select * from products ";
    $qry .= "where id='".$id."' ";
    $qry .= "limit 1";

    $result = mysqli_query($db,$qry);
    confirm_result_set($result);
    $product = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
         return $product;
    }



function update_product($product){

global $db;
$qry = "update products set ";
$qry .= "category='".$product['category']."',";
$qry .= "description='".$product['description']."',";
$qry .= "price='".$product['price']."',";
$qry .= "in_stock='".$product['in_stock']."' ";
$qry .= "where id='".$product['id']."' ";
$qry .= "limit 1";
$result = mysqli_query($db, $qry);
if($result){
return true;
}
else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;

}

}
?>