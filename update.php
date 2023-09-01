<?php

include "config.php";

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
          
          
          var name=document.forms["myForm"]["name"].value;
          var gender=document.forms["myForm"]["gender"].value;
          var occupation=document.forms["myForm"]["occupation"].value;
          var nic=document.forms["myForm"]["nic"].value;
          var email=document.forms["myForm"]["email"].value;
          var blood_group=document.forms["myForm"]["blood_group"].value;
          var dob=document.forms["myForm"]["dob"].value;
          var mobile_no=document.forms["myForm"]["mobile_no"].value;
          var lan_no=document.forms["myForm"]["lan_no"].value;
          var address=document.forms["myForm"]["address"].value;
          
      
          
              
        if(name==""){
                  alert("Name is required! ");
                  return false;   
          }else if(!isNaN(name)){
                  alert(" A valid Name is required! ");
                  return false;
          }
          
          
          if(dob==""){
                  alert("Birth Date is Required! ");
                  return false;
          }

          if (nic == "") {
              alert(" NIC is required! ");
              return false;
          }else if (!(nic == "")) {
              if (nic.length <= 10) {
                  alert("Invalid Nic Number! ");
                  return false;
              } else if (nic.length > 12) {
                  alert("Invalid Nic Number! NIC should not exeed 12 ");
              return false;
              }
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
        <a href="addstaff.php">Staff Registration</a>
        <a href="Management.php">Staff Management</a>
    </div>

    <center>
    <form action="" method="POST" style="background-color:deeppink">
        <input type="text"  style="width:40%; height:5%; margin:10px 0px 15px 0px; "name="id" placeholder="Enter Patient Code for search"><br>
        <input type="submit" name="search" value="search">
    </form>
       
    <?php
       if(isset($_POST['search'])){
           
          $id= $_POST['id'];
           
          $query = "SELECT * FROM patient WHERE patient_code='$id' ";
          $query_run = mysqli_query($conn,$query);
           
          while($row = mysqli_fetch_array($query_run)){
          ?>
       
          <div class="commonClass" style="background-color: gray; margin: auto;border-top-right-radius: 20px;
          border-top-left-radius:20px; margin-right:250px;margin-top:100px;padding:10px;
          ">
          <header>
            <h1 style="padding-left: 50px;">Update Patient</h1>
          </header>
        </div>
            
        
        <div class="commonClass" style="background-color:lightgray;border-bottom-right-radius: 20px;
    border-bottom-left-radius:20px;float:right; margin-right:250px;padding:10px;
">
       
       <form name="myForm" action="" onsubmit="return validation()" method="POST">
                         
        
        <div class="innerDiv">  
          <label for=""><u><h2>Personal Details</h2></u></label><br>  
        </div>
        <div class="innerDiv">
                <label for="Patient code">Patient code</label><br>
                <input type="text" name="id" value="<?php echo $row['patient_code'] ?>" ><br>
        </div>
        <div class="innerDiv">
            <label for="name">Full Name</label><br>
            <input type="text" name="name" placeholder="fname lname" value="<?php echo $row['name'] ?>">
            
        </div>
        <div class="innerDiv">    
          <label>Gender</label>
          <input type="radio" name="gender" value="Male" checked> Male
            &nbsp;
          
            <input type="radio" name="gender" value="Female"> Female&nbsp;
          
      </div>
                
          
                
        <div class="innerDiv">
            <label for="fullname">Occupation</label><br>
            <input type="text" id="occupation" name="occupation" placeholder="" value="<?php echo  $row['occupation'] ?>">
        
        </div>
        
            
        <div class="innerDiv">
            <label for="dob">Date of Birth</label><br>
            <input type="date" id="dob" name="dob" value="<?php echo  $row['dob']?>">
        </div>
            
        
        <div class="innerDiv">
            <label for="blood_group">Blood Group</label><br>

              
            <select id="blood_group" name="blood_group" value="<?php echo  $row['blood_group']?>">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>
        
        
        <div class="innerDiv">
            <label for="nic">NIC Number</label><br>
            <input type="text" id="nic" name="nic"  value="<?php echo $row['nic'] ?>">
        </div>
        
        
        <div class="innerDiv">
            <label for="mobile_no">Mobile Number</label><br>
            <input type="text" id="mobile_no" name="mobile_no"   value="<?php echo $row['mobile_no'] ?>">
        </div>

        <div class="innerDiv">
            <label for="lan_no">LAN Number</label><br>
            <input type="text" id="lan_no" name="lan_no"  value="<?php echo $row['lan_no'] ?>">
        </div>

            
          <div class="innerDiv">
            <label for="email">Email Address</label><br>
            <input type="email" id="email" name="email"  placeholder="example@example.com"  value="<?php echo $row['email'] ?>">
        </div> 
            
        
        <div class="innerDiv">
            <label for="address">Home Address</label><br>
            <input type="text" id="address" name="address"  value="<?php echo $row['address'] ?>">
        </div>
        
            
            
        <div class="innerDiv">
            <label for="other">Medical History - Note</label><br>
            <input type="text" id="other" name="other"  value="<?php echo $row['other'] ?>">
        </div>    
            
          
        <br><br><br>  
        
          <div class="innerDiv">
              <button class="btn btn-info" name="submit" type="submit" style="width: 20%">Update</button>
              <a class="btn btn-danger" style="width: 20%" href="deletepatient.php?id=<?php echo $row['patient_code'];?>" >Delete</a>
        </div>
                      
            
      </form>  
       
       
      <?php
           }
               
               
       }
       
       ?>
       </div>
       
    </center>

  </div>






</body>
</html>


<?php

if(isset($_POST['submit'])){
    $name=$_POST['name'];
   
    $occupation=$_POST['occupation'];
    $nic=$_POST['nic'];
    $email=$_POST['email'];
    $blood_group=$_POST['blood_group'];
    $dob=$_POST['dob'];
    $mobile_no=$_POST['mobile_no'];
    $lan_no=$_POST['lan_no'];
    $address=$_POST['address'];
    $other=$_POST['other'];
    $id= $_POST['id'];

//sql query
$sqlquery="UPDATE patient SET name='$name',occupation='$occupation',nic='$nic',email='$email',blood_group='$blood_group',dob='$dob',mobile_no='$mobile_no',lan_no='$lan_no',address='$address' WHERE patient_code='$id'";

$result=$conn->query($sqlquery);

if($result==TRUE){
        echo '<script> alert("Data Updated") </script>';
       
}else{
    echo "Error".$sqlquery."<br>".$conn->error;
    }

  }
      
?>














