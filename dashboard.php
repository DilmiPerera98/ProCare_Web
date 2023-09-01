<?php
include "config.php";


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
 
    <title> Admin Dashboard</title>
    
 
 <link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="dashboard1.css" />
    <link rel="stylesheet" href="index.css">
<script>
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
          
                 <i class="fas fa-sign-out-alt fs-1"></i>

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

    <h1>DASHBOARD</h1>
      
        
          <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                     
                    
                     <div class="col-md-3" >
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                    
                                    
                                   <?php
                                    
                                    $sql = "SELECT COUNT(doctor_id) AS num FROM doctor";
                                        $result = mysqli_query($conn, $sql);
                                        $count = mysqli_fetch_assoc($result)['num'];
                                        echo $count;
                                    ?>
                                    
                                    
                                    </h3>
                                <p class="fs-5">Doctors</p>
                            </div>
                            <i class="fas fa-user-md fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                           
                        </div>
                    </div>
                            

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                
                                    <?php
                                    
                                    $sql = "SELECT COUNT(staff_id) AS num FROM staff WHERE staff_type='NUR';";
                                        $result = mysqli_query($conn, $sql);
                                        $count = mysqli_fetch_assoc($result)['num'];
                                        echo $count;
                                    ?>
                                    
                                    
                                
                                </h3>
                                <p class="fs-5">Nurse</p>
                            </div>
                            <i
                                class="fas fa-user-nurse fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                             

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                
                                
                                <?php
                                    
                                    $sql = "SELECT COUNT(staff_id) AS num FROM staff WHERE staff_type='MGR';";
                                        $result = mysqli_query($conn, $sql);
                                        $count = mysqli_fetch_assoc($result)['num'];
                                        echo $count;
                                    ?>
                                
                                
                                
                                </h3>
                                <p class="fs-5">Managers</p>
                            </div>
                            <i class="fas fa-user-shield fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                        

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                
                                 <?php
                                    
                                    $sql = "SELECT COUNT(staff_id) AS num FROM staff WHERE staff_type='PHA';";
                                        $result = mysqli_query($conn, $sql);
                                        $count = mysqli_fetch_assoc($result)['num'];
                                        echo $count;
                                    ?>
                                
                                
                                
                                 
                                    
                                </h3>
                                <p class="fs-5">Pharmasists</p>
                            </div>
                            <i class="fas fa-notes-medical fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                        
                    
                     <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">
                                
                                
                                
                                <?php
                                    
                                    $sql = "SELECT COUNT(staff_id) AS num FROM staff WHERE staff_type='REC';";
                                        $result = mysqli_query($conn, $sql);
                                        $count = mysqli_fetch_assoc($result)['num'];
                                        echo $count;
                                    ?>
                                
                                
                                
                                </h3>
                                <p class="fs-5">Receptionists</p>
                            </div>
                            <i class="fas fa-address-book fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                       
                   
                </div>

              

            </div>
       

  </div>



    
        
 

    
        

          


</body>

</html>



 

