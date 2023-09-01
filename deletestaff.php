<?php
include "config.php";

if(isset($_GET['id'])){
    
    
    $user_id = $_GET['id'];
    
    //Query
    
    $sql = "Delete FROM staff where staff_id = '$user_id'";
    
    //Execute
    
    $result = $conn->query($sql);
    
        if($result == TRUE){
           echo "Deleted successfully";
           header("location: Management.php");
           
       }else{
           echo "Error:". $sql. "<br>". $conn->error;
       }     
}
