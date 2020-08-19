<?php
require_once("initialise.php");
// check to see if the string from client is not emty or space...
if(isset($_GET["searchtext"]) && trim($_GET["searchtext"]!="")){

    $name = $_GET["searchtext"];
    // finding all first_name values in database which matches the coming string 
    $staffs_set = find_all_staffs();
    $collections = [];
// if there is any staff available in database we can search. to protect error of empty value 
    if(!empty($staffs_set))
    while($staff = mysqli_fetch_assoc($staffs_set))
    // if first_name doen't contain the entered string (coming from client) it returns false otherwise it's a non-false value 
    if(strpos($staff['first_name'],$name)!== false){
        // it pushs new value in $collections.. like push function in javascript
        $collections []= $staff['first_name'];
    
    }
    $response = "";
    if(!empty($collections))
    // we put each first_name in list order and send them all together to ul in clientside
    foreach($collections as $collection){
       echo $response."<li>".$collection."</li>";
    }
    
    
    
    

}    

?>


