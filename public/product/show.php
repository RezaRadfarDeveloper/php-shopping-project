<?php require_once('../../private/initialise.php'); ?>
 <?php include(SHARED_PATH.'/admin_header.php'); ?>

 <a href="<?php  echo url_for('/public/product/index');?>"> Product home</a> 
<?php 
    $id = $_GET['id']?? '1';
$product = find_product_by_id($id);
?>

<div class="show product">
<p><?php echo $product['id'];?></p>
<p><?php echo $product['name'];?></p>
<p><?php echo $product['category'];?></p>
<p><?php echo $product['description'];?></p>
<p><?php echo $product['in_stock'];?></p>


<?php include(SHARED_PATH.'/admin_footer.php'); ?>