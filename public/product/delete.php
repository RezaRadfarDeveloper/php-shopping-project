<?php require_once('../../private/initialise.php'); ?>
<?php $title =  "delete products";?>
<?php include(SHARED_PATH.'/admin_header.php'); ?>

<?php if(!isset($_GET['id'])){
    Header("Location: index.php");

    }
    $id = $_GET['id'];
    if (is_post_request()){
        $result = delete_product($id);
        $_SESSION['message']="product has been deleted successfully";
        Header("Location: index.php");
    }
    else{
        $product = find_product_by_id($id);
    }
    ?>
    Are you sure you want to delete this product?...

<form action="<?php echo ("delete.php?id=".$id) ;?>" method="POST">
<input type="text" id="name" name="name" value="<?php echo $product['name']; ?>"><br><br>
<input type="text" id="description" name="description" value="<?php echo $product['description']; ?>"><br><br>
<input type="text" id="category" name="category" value="<?php echo $product['category']; ?>"><br><br>
<input type="text" id="price" name="price" value="<?php echo $product['price']; ?>"><br><br>
<input type="text" id="in_stock" name="in_stock" value="<?php echo $product['in_stock']; ?>"><br><br>
<input type="submit" value="Delete Item">
</form>        
    


<?php include(SHARED_PATH.'/admin_footer.php'); ?>
