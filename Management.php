
<?php
include "config.php";


$sql = "Select * from staff";

$result = $conn->query($sql);

?>






<!DOCTYPE html>
<html>
<head>
  <title>Staff Management</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
 <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    

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
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
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

<div class="container">
        
        <h2>Staff Management</h2>
        
        <a class="btn btn-primary" style = "float:right" href="addstaff.php">Add New User</a>
         <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Email</th>
                <th>Address</th>
                <th>Staff Type</th>
                <th>Mobile NO</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
            </thead>
        
            <tbody>
                
                <?php
                    while($row = $result->fetch_assoc()){
                ?>
                
                <tr>
                    <td><?php echo $row['staff_id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['salary'] ?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['staff_type']?></td>
                    <td><?php echo $row['mobile_no']?></td>
                    <td><?php echo $row['gender']?></td>
                    
                    <td><a class="btn btn-info" href="updatestaff.php?id=<?php echo $row['staff_id']?>">Edit</a>&nbsp;&nbsp; <a class="btn btn-danger" href="deletestaff.php?id=<?php echo $row['staff_id'];?>" >Delete</a></td>
                </tr>
                
                <?php
                        
                    }
                
                ?>
            
            </tbody>
            
    </table>
    </div>

  </div>






</body>
</html>

















