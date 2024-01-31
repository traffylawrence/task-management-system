<?php
session_start();
if(isset($_SESSION['UserLogin'])){ 
    header("Location:homepage.php"); 
    exit; 
}
include("connection.php");
$con=connection();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign-up</title>
	<link rel="stylesheet" href="signup.css">
</head>
<body>
<section>
	 <div class="signupbox">
  
<h1>Enter Details</h1>
        <form action="signup.php" method="POST">
    <?php        if (isset($_POST['signup'])) {
 $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $sql_e = "SELECT * FROM user_tbl WHERE email='$email'";
    $sql_u = "SELECT * FROM user_tbl WHERE username='$user'";
    $res_e = mysqli_query($con, $sql_e);
    $res_u = mysqli_query($con, $sql_u);

    if (mysqli_num_rows($res_e) > 0) {
      echo "Email already taken";  
    }else if(mysqli_num_rows($res_u) > 0){
      echo"Username already taken";    
    }else{
        $sql= "INSERT INTO `user_tbl`(`firstname`, `lastname`, `email`, `username`, `password`) VALUES ('$fname','$lname','$email','$user','$pass')";
          $con->query($sql)or die ($con->error);
    echo header("location: index.php");
    }
  }?>
      <br>
            <input type="text" name="fname" placeholder="First Name" required>
            <input type="text" name="lname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="user" placeholder="Username" required>
            <input class="pass" type="password" name="pass" placeholder="Password" required>
            <input class="button" type="submit" name="signup" value="Sign Up">

           <a href="forgotpass.php">Forgot Password</a><br>
            <a href="index.php">Log-in</a>
          
        </form>
        
    </div>

</body>
</section>
</html>
