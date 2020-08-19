<?php require_once('initialise.php'); ?>
<!-- <select>
        <option selected="selected">Choose one</option>
        <?php
        // A sample product array
        $products = array("Mobile", "Laptop", "Tablet", "Camera");
        $staffs = find_all_staffs();
        // Iterating through the product array
        // foreach($products as $item){

            while($staff = mysqli_fetch_assoc($staffs)){
        ?>
         
         <option value="<?php echo $staff['first_name']; ?>"><?php echo $staff['first_name']; ?></option>
         <?php
        }
        ?>
    </select>
        <?php echo strtolower($item); ?>"><?php echo $item; ?> -->
        <?php

$staffs_set = find_all_staffs();
while($staff = mysqli_fetch_assoc($staffs_set)){

?>
<div>

<div style><?php echo $staff['id'];?>
    <?php echo $staff['first_name'];?>
    <?php echo $staff['last_name'];?></div>
    <div><?php echo $staff['email'];?>
    <?php echo $staff['user_name'];?></div>
    
    <?php echo "<a href='show.php?id=".$staff['id']."'>"; ?> View</a>
    <?php echo "<a href='edit.php?id=".$staff['id']."'>"; ?> Edit</a>
    <?php echo "<a href='delete.php?id=".$staff['id']."'>"; ?>Delete</a>

</div>	

<?php	}  ?>
