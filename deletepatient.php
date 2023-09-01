<?php 

include "config.php";
if(isset($_GET['id'])){
    $getId=$_GET['id'];
    
    //query
    $sqlquery="DELETE FROM patient WHERE patient_code='$getId';";
    
    //Execution of the Query
    $result=$conn->query($sqlquery);
    
    if($result==TRUE){
        echo '<script> alert("Record Deleted Successfully") </script>';
      header("location: update.php");
       
    }else{
        echo "Error".$sqlquery."<br>".$conn->error;
    }
}

?>