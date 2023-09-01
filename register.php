<?php 
include "config.php";

if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $occupation=$_POST['occupation'];
    $nic=$_POST['nic'];
    $email=$_POST['email'];
    $blood_group=$_POST['blood_group'];
    $dob=$_POST['dob'];
    $mobile_no=$_POST['mobile_no'];
    $lan_no=$_POST['lan_no'];
    $address=$_POST['address'];
    $other=$_POST['other'];
    
    
    
    //query
     $sql1="INSERT INTO patient(patient_code,name,gender,occupation,nic,email,blood_group,dob,mobile_no,lan_no,address, other) VALUES('$id','$name','$gender','$occupation','$nic','$email','$blood_group','$dob','$mobile_no','$lan_no','$address','$other'); ";
    
    //Execute Query
    $result1=$conn->query($sql1);

    if($result1==TRUE){
         echo '<script> alert("Patient Added Successfully") </script>';
           
    }else{
        echo "Error".$sql1."<br>".$conn->error;
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

        <div class="commonClass" style="background-color: gray; margin: auto;border-top-right-radius: 20px;
        border-top-left-radius:20px;float:right; margin-right:250px;margin-top:100px;padding:20px;
        ">
            <header>
                <h1 style="padding-left: 50px;">Patient Registration</h1>
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
                <label for="name">Patient ID</label><br>
                <input type="text" name="id" value="<?php
	            $sql = "SELECT COUNT(patient_code) AS num FROM patient";
	            $result = mysqli_query($conn, $sql);
	            $count = mysqli_fetch_assoc($result)['num'];
	            echo 'P', ($count+1);?>">
            </div>
                
            <div class="innerDiv">
                <label for="name">Full Name</label><br>
                <input type="text" name="name" placeholder="fname lname">
            </div>
            
            <div class="innerDiv">
                <label>Gender</label>
                 <input type="radio" name="gender" value="Male" checked> Male
                  &nbsp;
                
                 <input type="radio" name="gender" value="Female"> Female&nbsp;
                
            </div>
    
            <div class="innerDiv">
                <label for="fullname">Occupation</label><br>
                <input type="text" id="occupation" name="occupation" placeholder="">
            </div>
            
            <div class="innerDiv">
                <label for="dob">Date of Birth</label><br>
                <input type="date" id="dob" name="dob">
            </div>
            

            <div class="innerDiv">
                <label for="blood_group">Blood Group</label><br>

                  
                <select id="blood_group" name="blood_group">
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
                <input type="text" id="nic" name="nic" >
            </div>
            
              
            <div class="innerDiv">
                <label for="mobile_no">Mobile Number</label><br>
                <input type="text" id="mobile_no" name="mobile_no">
            </div>

            <div class="innerDiv">
                <label for="lan_no">LAN Number</label><br>
                <input type="text" id="lan_no" name="lan_no">
            </div>
 
                
              <div class="innerDiv">
                <label for="email">Email Address</label><br>
                <input type="email" id="email" name="email" value="" placeholder="example@example.com">
            </div> 
                
            
            <div class="innerDiv">
                <label for="address">Home Address</label><br>
               <textarea id="address" name="address" rows="5" cols="20"></textarea>
            </div>
            
             <div class="innerDiv">
                <label for="other">Past Medical History - Note</label><br>
               <textarea id="other" name="other" rows="5" cols="20"></textarea>
            </div>

            <br><br><br>  
            
            <div class="innerDiv">
                 <button name="submit" type="submit" style="width: 20%">Submit</button>
                 <button value="Reset" type="reset"  style="width: 20%">Reset</button>
            </div>
            
            </form>  
        </div>
    

  </div>
</body>
</html>

















