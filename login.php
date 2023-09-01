
<?php

session_start();

include("config.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="login.css">
        <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    
    <div class="header">
   <img src="Logo.png" width="50" height="50"> PROCARE Medical Center
    </div>
  
    <div class="divisions">
    <section>
    <image src="clinic2.jpg" width="650" height="650"></image>
    
    </section>
        <form action="" method="POST">     
	<aside><br><br><br><br><br>
        
        
        <h2>WELCOME !</h2>
	
		
		
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
        <input type="text" name="username" placeholder="Enter the User Name"/>	<br><br><br>
			
			     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                </svg>
         
        <input type="password" name="password" placeholder="password"/>
			   <br><br>
         <input type="submit" name="submit" value="SUBMIT">
		</aside>
        </form>
	</div>
   
</body>
</html>


<?php

if(isset($_POST['submit'])){

$uname = mysqli_real_escape_string($conn,$_POST['username']);

$pass = mysqli_real_escape_string($conn,$_POST['password']);

$get_admin1 = "select * from staff where staff_id='$uname' AND password='$pass'";

$run_admin1 = mysqli_query($conn,$get_admin1);

$count1 = mysqli_num_rows($run_admin1);

$get_admin2 = "SELECT * FROM doctor WHERE doctor_id='$uname' AND password='$pass';";

$run_admin2 = mysqli_query($conn,$get_admin2);

$count2 = mysqli_num_rows($run_admin2);

if($count1==1 || $count2==1){

$_SESSION['username']=$uname;
//
//$sess = $_SESSION['username'];

echo "<script>alert('You are Logged in into system ')</script>";

echo "<script>window.open('dashboard.php?overview','_self')</script>";

}
else {

echo "<script>alert('Username or Password is Wrong')</script>";

}

}

?>