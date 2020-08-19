<?php require_once('../../private/initialise.php'); ?>
<?php $page_title = "New page";?>
<?php include(SHARED_PATH.'/admin_header.php'); ?>


<?php if(is_post_request()){

$product= [];
$product['name'] =  $_POST['name'];
$product['description'] =  $_POST['description'];
$product['price'] =  $_POST['price'];
$product['category'] =  $_POST['category'];
$product['in_stock'] =  $_POST['in_stock'];
$result = insert_product($product);
if($result===true){
    $new_id =mysqli_insert_id($db);
    $_SESSION['message'] = "Product has been added successfully";
    Header("Location: show.php?id=".$new_id);

}

} 
else?>{
<form action=<?php echo "new.php"; ?>  method="POST" enctype="multipart/form-data">
  <div class="form-group" >
    <label for="first-name">Product Name:</label>
    <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="emailHelp" placeholder="Enter Product Name">
    <small id="emailHelp" class="form-text text-muted">It is necessary to have name</small>
  </div>
  <div class="form-group">
    <label for="last-name">Category</label>
    <input type="text" class="form-control" id="category" name="category" placeholder="Select Category">
  </div>
  <div class="form-group">
    <label for="email">Description:</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="enter description">
  </div>
  <div class="form-group">
    <label for="user_name">Price:</label>
    <input type="text" class="form-control" id="price" name="price" placeholder="Enter price (in $AU)">
  </div>
  <div class="form-group">
    <label for="password">Available:</label>
    <input type="text" class="form-control" id="in_stock" name="in_stock"  value="" placeholder="availability">
  </div>
  
  <div class="form-group">
    <label for="image">Upload Image</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="Upload File">
  </div>
  <div class="form-group">
    <label for="image">Upload Image</label>
    <input type="file" class="form-control" id="image_path" name="image_path" placeholder="Upload Image">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    

}




    





<?php include(SHARED_PATH.'/admin_footer.php'); ?>