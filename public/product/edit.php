<?php require_once('../../private/initialise.php'); ?>
<?php $page_title = "Edit Product";?>
<?php include(SHARED_PATH.'/admin_header.php'); ?>

<?php 
//test here- should be deleted
if(!isset($_GET['id'])){
header("Location: index.php");
}
$id = $_GET['id'];

// echo $id."test"."</br>";
if(is_post_request()){
    $product = [];
    // edit acts  create now....
   
    

    $product['id'] = $id;

    $product['category'] = $_POST['category'] ?? '';
    $product['price'] = $_POST['price'] ?? '';
    $product['description'] = $_POST['description'] ?? '';
    $product['in_stock'] = $_POST['in_stock'] ?? '';
    $result = update_product($product);
    if($result=== true){

      $_SESSION['message'] = " this product details has been edited successfully";
      header("Location: edit.php?id=".$id);

    }
    else{
        $errors = $result;
        // var_dump($errors);
    }
} 

$product = find_product_by_id($id);
// $product = find_all_products();
// $products_count = mysqli_num_rows($product);
// mysqli_free_result($product);
?>

<?php echo display_errors($errors); ?>

<form action=<?php echo "edit.php?id=".$id; ?>  method="POST">
  <div class="form-group" >
    <label for="first-name">name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="emailHelp" value="<?php echo $product['name'];?>" placeholder="name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="last-name">Category</label>
    <input type="text" class="form-control" id="category" name="category" value="<?php echo $product['category'];?>" placeholder="category">
  </div>
  
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price" value="<?php echo $product['price'];?>" placeholder="price">
    </div>
  <div class="form-group">
    <label for="password">In Stock</label>
    <input type="text" class="form-control" id="in_stock" name="in_stock" value="<?php echo $product['in_stock'];?>"> 
  </div>
  <div class="form-group">
    <label for="conformed_password">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="<?php echo $product['description'];?>" placeholder="description">
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



<?php include(SHARED_PATH.'/admin_footer.php'); ?>
