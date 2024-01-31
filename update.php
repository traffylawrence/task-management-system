 <?php
session_start(); 
if(!$_SESSION['UserLogin']){ 
    header("Location: index.php"); 
    exit; 
} else{
  //check session if there is logged in
echo 'Hello, user:'.$_SESSION['UserLogin']; 
}
include("connection.php");
$con=connection();
 $id=$_SESSION['UserLogin'];
$query=mysqli_query($con,"SELECT * FROM user_tbl where username='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
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
<style>
  .head1{
  width: 50%;
  margin: 30px auto;
  text-align: center;
  color: purple;
  background:white;
  border: 2px solid purple;
  border-radius: 20px;
}
  table{
  width: 50%;
  margin: 30px auto;
  border-collapse: collapse;
}
tr{
  border-bottom: 1px solid #cbcbcb;
}
th{
  font-size: 19px;
  color: white;
}
th,td{
  border: none;
  height: 30px;
  padding: 2px;
}
tr:hover{
  background:purple;
}
td.task, .center{
text-align:center;
}

</style>




<!--ADD TO tbl_task-->
<div class="head1"> 
<h1> Personal Information of <?php echo $_SESSION['UserLogin'] ?></h1>
</div>
  
<form action="" method="post">
<table>
  <thead>
    <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>

  <tr>
  <!--VIEW TASK-->  
       <td><input type="text" class="form-control" name="fname" style="width:10em;" placeholder="Edit First Name" value="<?php echo $row['firstname']; ?>" required />
          </td>  
       <<td><input type="text" class="form-control" name="lname" style="width:10em;" placeholder="Edit Last Name" value="<?php echo $row['lastname']; ?>" required />
          </td> 
          <td><input type="text" class="form-control" name="email" style="width:10em;" placeholder="Edit Email" value="<?php echo $row['email']; ?>" required />
          </td> 

      <td align="center"><button name="enter"><i class="fas fa-user-edit"></i></button></td>
      </form>
   
    </tr>
 
  </tbody>
</table>
</body>
</html>
<?php
      if(isset($_POST['enter'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        
      $query = "UPDATE user_tbl SET firstname = '$fname',
                      lastname = '$lname', email = '$email'
                      WHERE username = '$id'";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "index.php";
        </script>
        <?php
             }               
?> 