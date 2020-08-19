<?php require_once("initialise.php");?>

<?php 


required_login();
?>

<?php $page_title = "Index admin";?>
<?php include(SHARED_PATH.'/admin_header.php'); ?>
<div class="container" id="main-content">
	<h2>Index for staff</h2>
	<!-- shows current active user -->
	<?php  echo $_SESSION['admin_id'];?>
	 

<table class="table" >
<thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First-Name</th>
      <th scope="col">Last-Name</th>
      <th scope="col">Email</th>
      <th scope="col">User Name</th>
	  <th scope="col">View</th>
	  <th scope="col">Edit</th>
	  <th scope="col">Delete</th>
    </tr>
  </thead>
	   	<?php

		$staffs_set = find_all_staffs();
		while($staff = mysqli_fetch_assoc($staffs_set)){
	
		?>
		<tbody>
		<tr>	
			<td><?php echo $staff['id'];?></td>
			<td><?php echo $staff['first_name'];?></td>
			<td><?php echo $staff['last_name'];?></td>
			<td><?php echo $staff['email'];?></td>
			<td><?php echo $staff['user_name'];?></td>
			<td><?php echo "<a href='show.php?id=".$staff['id']."'>"; ?> View</a></td>
			<td><?php echo "<a href='edit.php?id=".$staff['id']."'>"; ?> Edit</a></td>
			<td><span class="delete" data-id="<?php echo $staff['id']; ?>">Delete</span> </td>
			
		</tbody>
	<?php	}  ?>
		
	  
</table>

	
</div>
<div>     
	<div></div>
	<div></div>
	<div></div>
	<div></div>
</div>

<?php 
	mysqli_free_result($staffs_set);
?>
  
<?php include(SHARED_PATH.'/admin_footer.php'); ?>
