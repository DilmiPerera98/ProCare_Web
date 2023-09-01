<?php
    include "config.php";


if(isset($_GET['id'])){
    
    $user_id = $_GET['id'];
    
    //query
    $sql = "Select * from staff where staff_id ='$user_id'";
    
    $result = $conn->query($sql);
    
    if($row = $result->fetch_assoc()){
        $id = $row['staff_id'];
       $password = $row['password'];
       $name = $row['name'];
       $salary = $row['salary'];
       $email = $row['email'];
       $address = $row['address'];
       $type = $row['staff_type'];
       $mobile = $row['mobile_no'];
       $gender = $row['gender'];
            
        
    }
}



if(isset($_POST['update'])){
       
      
     
       $name = $_POST['name'];
       $salary = $_POST['salary'];
       $email = $_POST['email'];
       $address = $_POST['address'];
       $type = $_POST['type'];
       $mobile = $_POST['mobile'];
       $gender = $_POST['gender'];
       
       //SQL QUERY
   $sql = "UPDATE staff set  name = '$name',  email = '$email', password ='$password', gender = '$gender' , salary = '$salary', address = '$address', staff_type = '$type', mobile_no = '$mobile'    where staff_id = '$user_id'";
       
       //Execute the query
       
      $result =   $conn->query($sql);
       
       if($result == TRUE){
           echo "updated successfully";
           header("location: Management.php");
           
       }else{
           echo "Error:". $sql. "<br>". $conn->error;
       }     
       
       
   }


?>



<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
 <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" type="text/css" href="procare-STYLES1.css">
    
    
<script>
    function validation(){
      
      var id=document.forms["myForm"]["id"].value;
      var name=document.forms["myForm"]["name"].value;
      var salary=document.forms["myForm"]["salary"].value;
      var email=document.forms["myForm"]["email"].value;
      var address=document.forms["myForm"]["address"].value;
      var type=document.forms["myForm"]["type"].value;
      var mobile=document.forms["myForm"]["mobile"].value;
      
      if(id==""){
              alert("Staff ID is Required! ");
              return false;
      }
      
          
      if(name==""){
              alert("Name is required! ");
              return false;   
      }else if(!isNaN(name)){
              alert(" A valid Name is required! ");
              return false;
      }
      
      
      if(salary==""){
              alert("Salary is Required! ");
              return false;
      }
    
      if (email == "") {
          alert("Email Address is required !! ");
          return false;
      }else {
          var regEmail = /^([a-zA-Z0-9\._]+)@([a-zA-Z0-9])+.([a-z]+)(.[a-z]+)?$/;
          if (!regEmail.text(email)) {
              alert("A valid Email Address is required !! ");
              return false;
          }
      }

      if(address==""){
              alert("Address is required!");
              return false;   
      }

      if(type==""){
              alert("Staff Type is required!");
              return false;   
      }
      
      if(mobile_no==""){
          alert("Contact Number is required!");
              return false;
      }else{
          if(mobile_no.length<10){
              alert(" A valid Contact Number is required !! "); 
              return false;
          }if(mobile_no.length>10){
              alert("A valid Contact Number is required.Maximum length should be 10 !!"); 
              return false;
          }else if(mobile_no.length==10){
              return true;
          }
          
      }  
      
  }

  function openSlideMenu(){
    document.getElementById('menu').style.width = '250px';
    document.getElementById('content').style.marginLeft = '250px';
  }
  function closeSlideMenu(){
    document.getElementById('menu').style.width = '0';
    document.getElementById('content').style.marginLeft = '0';
  }
</script>
</head>
<body>
    
     

  <div id="content">
      <div class="header">
         
     <img src="Logo.png" width="50" height="50">   PROCARE Medical Center
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
          <a href="logout.php">    <button type="button" class="btn btn-secondary" >Logout</button></a> 
          
                <i class="fas fa-sign-out-alt"></i>

        </div>
   
      
      
      <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars"></i>
      </a>
    </span>
      
      

    <div id="menu" class="nav">
      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
      </a>
        
      <a href="dashboard.php">Dashboard</a>
      <a href="register.php">Patient Registration</a>
      <a href="update.php">Patient Update</a>
      <a href="med.php">Medication</a>
      <a href="addstaff.php">Staff registration</a>
      <a href="Management.php">Staff Management</a>
    </div>

    <div class="commonClass" style="background-color: gray; margin: auto;border-top-right-radius: 20px;
    border-top-left-radius:20px;float:right; margin-right:250px;margin-top:100px;padding:20px;
">
                <header>
                    <h1 style="padding-left: 50px;">Update Staff</h1>
                </header>
            </div>
            
        
        <div class="commonClass" style="background-color:lightgray;border-bottom-right-radius: 20px;
    border-bottom-left-radius:20px;float:right; margin-right:250px;padding:20px;
">
            <form name="myForm" onsubmit="return validation()" method="POST">
        
              <div class="innerDiv">  
             <label for=""><u><h2>Personal Details</h2></u></label><br>  
                </div>
                
                 <div class="innerDiv">
                <label for="name">Staff ID</label><br>
                <input type="text" name="id" value="<?php echo $id; ?>" >
            </div>
                
           
        
       
                
            <div class="innerDiv">
                <label for="name">Name</label><br>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
                
                
            <div class="innerDiv">
                <label for="dob">Salary</label><br>
                <input type="text" name="salary" value="<?php echo $salary; ?>">
            </div>
                
                
            <div class="innerDiv">
                <label for="fullname">E-mail</label><br>
                <input type="text"  name="email" value="<?php echo $email; ?>">
            </div>
                
                
            <div class="innerDiv">
                <label for="fullname">Address</label><br>
                <input type="text"  name="address" value="<?php echo $address; ?>">
            </div>
                
                
            <div class="innerDiv">
                <label for="fullname">Staff Type</label><br>
                <input type="text"  name="type" value="<?php echo $type; ?>">
            </div>
                
                
            <div class="innerDiv">
                <label for="fullname">Mobile NO</label><br>
                <input type="text"  name="mobile" value="<?php echo $mobile; ?>">
            </div>
                
            
            <div class="innerDiv">
                <label>Gender</label>
                 
                <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){echo "checked";} ?>>Male
                <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){echo "checked";} ?>>Female
                
            </div>
    
            
            
           
            

           
                
           
                
                
                
           
<br>  
            
             <div class="innerDiv">
                 <input type="submit" name="submit" value="Update">
            </div>
            
            </form>  
        </div>
    

  </div>






</body>
</html>













