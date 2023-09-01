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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="medication.css">

<script>
  function validateMedication(){
      var diagIll=document.forms["Medication"]["diagnosedIllness"].value;
      var drug=document.forms["Medication"]["drugAndDosage"].value;
      var pay=document.forms["Medication"]["payment"].value;
  
      if(diagIll==""){
            alert("Diagnosed Illness is Required! ");
            return false;
      }

      if(drug==""){
            alert("Drug and Dose is Required! ");
            return false;
      }

      if(pay==""){
            alert("Payment is Required! ");
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
       
    </center>
       
       <div class="commonClass" style="background-color: gray; margin: auto;border-top-right-radius: 20px;
    border-top-left-radius:20px; margin-right:250px;margin-top:100px;padding:10px;
">
                <header>
                    <h1 style="padding-left: 50px;">Medication</h1>
                </header>
            </div>
            
        
        
       
       
      <form name="Medication" onsubmit="return validateMedication()" action="" method="POST">
       <!--REsponsive-->
       <div class="row">
  
       <div class="col-sm-12 col-lg-6 " style="padding-left: 160px">
        
         <!--Patient details-->
          <div class="patientDetails"> 
              <br>
               <h2><u>Patient Details</u></h2>
              
                <div>               
                   <label for="name">Patient Code : </label>
                    <span>    
                        <input type="text" id="id" name="id" readonly value="<?php echo $row['patient_code'] ?>">
                    </span>  
                </div>
              
                <div>               
                   <label for="name">Name : </label>
                    <span>    
                        <input type="text" id="name" name="name" readonly value="<?php echo $row['name'] ?>">
                    </span>  
                </div>
                
                <div>               
                   <label for="bloodGroup">Blood Group : </label>
                    <span>    
                        <input type="text" id="bloodGroup" name="bloodGroup" readonly  value="<?php echo  $row['blood_group']?>">
                    </span>  
                </div>
                
                <div>               
                   <label for="gender">Gender : </label>
                    <span>    
                        <input type="text" id="gender" name="gender" value="<?php echo  $row['gender']?>">
                    </span>  
                </div>   
                <div>               
                   <label for="other">Medical History : </label>
                    <span>    
                        <input type="text" id="other" name="other" value="<?php echo  $row['other']?>">
                    </span>  
                </div>               
        </div>
        
        <!-- Medical History-->
        <div class="medicalHistory">
           <br><br>
           
             <div class="row">
              <div class="col-sm-3 col-sm">
            </div>
            </div>
            <br><br><br>
        </div>
      </div>
      
      
      <!--New Prescription -->
      <div class=" col-sm-12 col-lg-6 "><div class="newPrescription">
       <br>
        <h2><u>New Prescription</u></h2>
        
            <div>               
                <label for="diagnosedIllness">Diagnosed Illness :</label>
                <span>    
                    <input type="text" id="diagnosedIllness" name="diagnosedIllness">
                </span>  
            </div>
            
            <div>               
                Drug and Dosage : <br>
                   <textarea id="drugAndDosage" name="drugAndDosage" ></textarea> 
            </div>
               
            <div>
                Additional Notes : <br>
                <textarea id="additionalnotes" name="additionalnotes"></textarea>
            </div>
            
            <div>               
                   <label for="payment">Payment : </label>
                    <span>    
                        <input type="text" id="payment" name="payment">
                    </span>  
            </div>
            
        </div>
        
        <div class="btn">
           <br><br>
            <button type="submit" name="submit" style="  background-color:#B20837;width: 200px;height:40px;color:white;">Save</button>
            <button type="button" style="background-color:#B20837;width: 200px;height:40px;color:white;" onclick="window.print()">Print</button>
        </div>
        </div>
      </div> 

    </form>
       
       
               <?php
           }
               
               
       }
       
       ?>

  </div>






</body>
</html>




<?php

if(isset($_POST['submit'])){
   
   
    $illness=$_POST['diagnosedIllness'];
    $drug=$_POST['drugAndDosage'];
    $payment=$_POST['payment'];
    $other=$_POST['additionalnotes'];
   
    $id= $_POST['id'];

//sql query
$sql1="INSERT INTO treatment(patient_code,illness,drug_and_dose,payment,notes) VALUES('$id','$illness','$drug','$payment', '$other'); ";

 $result1=$conn->query($sql1);

    
    if($result1==TRUE){
         echo '<script> alert("Added Successfully") </script>';
           
    }else{
        echo "Error".$sql1."<br>".$conn->error;
    }

  }
      
?>















