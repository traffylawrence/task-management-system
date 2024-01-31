
<?php
session_start();
if(isset($_SESSION['UserLogin'])){ 
    header("Location:homepage.php"); 
    exit; 
}
include_once("connection.php");
$con=connection();
?>
<html>
<head>
<title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="indexx.css">
<body>
    <section>
    <div class="loginbox">
            <h1>Login Here</h1>
            <?php
            //LOG-IN VALIDATION
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$sql = "SELECT * FROM user_tbl WHERE username='$username' AND password='$password'";
$user=$con->query($sql)or die($con->error);
$row=$user->fetch_assoc();
$total=$user->num_rows;
if($total >0){
    $_SESSION['UserID']=$row['id'];
    
  $_SESSION['UserLogin']=$row['username'];
header("location:homepage.php");
}
else{
  echo "Invalid Username/Password";//LOGIN 
}
}
?>
        <form action="" method="POST">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login" value="Login">
            <BUTTON style="border-radius:15px;"><a href="forgotpass.php">FORGOT PASSWORD</a></BUTTON>
            <BUTTON style="border-radius:15px;"><a href="signup.php">CREATE ACCOUNT</a></BUTTON>
        </form>
    </div>
</section>
</body>
</head>
</html> 