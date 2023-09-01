<!DOCTYPE html>
<html>
<head>
  <title>ProCare Medical Center</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
 <link rel="stylesheet" href="css/bootstrap.css">

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
        
      <a href="index.php">Dashboard</a>
      <a href="form1.php">Patient Registration</a>
      <a href="#">Patient Update</a>
      <a href="#">Medication</a>
      <a href="#">Drug inventory</a>
      <a href="Management.php">Staff Management</a>
    </div>

    <h1>DASHBOARD</h1>

  </div>






</body>
</html>

















