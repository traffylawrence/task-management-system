<?php
session_start();
$_SESSION["UserLogin"];
include_once("connection.php");
$conn=connection();

?>
<html>
<head>
<title>Change Password</title>
<body>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="homestyle.css">
 
<nav>
<div class="dropdown">
<div class="menu">
 <button><a href="homepage.php"class="profile"><i class="fas fa-home"></i></a></button>
  <ul>
  
</ul>
</div>
<button><a href="update.php"class="profile"><i class="fas fa-user"></i>Update Info</a></button>
<div class="theme">
<button><i class="fas fa-share-alt">Share</i></button>
<ul>
  <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
</ul>
</div>
<div class="accsetting">
<button><a href="changepass.php" class="profile"><i class="fas fa-cog"></i>Change Password</a></button>
<ul>

</ul>
</div>
<button><a href="logout.php"class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></button>
</div>

</nav>  

    <section>
      <style>

.loginbox{
    border:3px solid #ffff;
    width: 320px;
    height: 500px;
    color: white;
    top: 60%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.loginbox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.loginbox input{
    width: 100%;
    margin-bottom: 10px;
}

.loginbox input[type="text"], input[type="password"]{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color:white;
    font-size: 16px;
}
.loginbox input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #82B3FF;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
    cursor: pointer;
    background: #A1C9F1;
    color: #57466D;
}

.loginbox a{
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: black;
}
.loginbox a:hover
{
    color: purple;
}
      </style>
<div class="loginbox">
  <?php if(isset($_POST['change'])){
$user=$_POST['username'];
$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$query=mysqli_query($conn,"SELECT username,password FROM user_tbl WHERE username='$user' AND password='$oldpass'");
$result=mysqli_fetch_array($query);

if($result>0){
$con=mysqli_query($conn,"UPDATE user_tbl SET password ='$newpass' WHERE username='$user'");
echo "Password Changed Successfully";
}else{
echo "Password is invalid";


}
}
?>
            <h1>Change Password</h1>
            <div style="height:10px; ">
      <form action="changepass.php" method="POST">
        </div>
            <p>Enter Username</p><br>
           <input type="text" class="userstyle" name="username" placeholder="Username">


            <p>Enter Old Password</p>
            <input type="password" class="userstyle" name="oldpass" placeholder="Old Password">
            <p>Enter New Password</p>
            <input type="password" class="userstyle" name="newpass" placeholder="New Password">
        
         
            <input type="submit" name="change" value="Change">

  
        </form>
    </div>
    
</section>
</body>
</head>
</html> 