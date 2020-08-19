<?php require_once('../../private/initialise.php'); ?>


<?php $page_title = "Index product";?>
<?php include(SHARED_PATH.'/admin_header.php'); ?>
<div class="container" id="main-content">
	
	 

<table class="table" >
<thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Available</th>
      <th scope="col">Category</th>
	  <!-- <th scope="col">Attitude</th> -->
	  <th scope="col">View</th>
	  <th scope="col">Edit</th>
	  <th scope="col">Delete</th>
    </tr>
  </thead>
	   	<?php

		$products_set = find_all_products();
		while($product = mysqli_fetch_assoc($products_set)){
	
		?>
		<tbody>
		<tr>	
			<td><?php echo $product['id'];?></td>
			<td><?php echo $product['price'];?></td>
			<td><?php echo $product['description'];?></td>
			<td><?php echo $product['in_stock'];?></td>
			<td><?php echo $product['category'];?></td>
			<td><?php echo "<a href='show.php?id=".$product['id']."'>"; ?> View</a></td>
			<td><?php echo "<a href='delete.php?id=".$product['id']."'>"; ?>Delete</a></td>
			<td><?php echo "<a href='edit.php?id=".$product['id']."'>"; ?> Edit</a></td>
		</tr>
		</tbody>
	<?php	}  ?>
		
	  
</table>

	
</div>

<?php 
	mysqli_free_result($products_set);
?>



	</p>
</div>



</body>
</html>