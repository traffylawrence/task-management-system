 <?php
session_start(); 
if(!$_SESSION['UserLogin']){ 
    header("Location: index.php"); 
    exit; 
} else{
  //check session if there is logged in
echo 'User: '.$_SESSION['UserLogin']; 
}
include("connection.php");
$con=connection();
#ADD TASK
if(isset($_POST['add'])){
$task =$_POST['task'];
$user_ID=$_SESSION['UserID'];
$sql= "INSERT INTO `task_tbl`(`task`, `user_ID`) VALUES ('$task','$user_ID')";
  $con->query($sql)or die ($con->error);
header('location:homepage.php');
}
//Delete task
if(isset($_GET['del'])){
   $ID=$_GET['del'];
 mysqli_query($con, "DELETE FROM task_tbl WHERE ID=$ID");
header('location:homepage.php');

}
//viewtask
$user_ID=$_SESSION['UserID'];
 $sql = "SELECT * FROM task_tbl INNER JOIN user_tbl ON task_tbl.user_ID = user_tbl.id WHERE user_ID=$user_ID";  
 $result = mysqli_query($con, $sql);  
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
<button><a href="changepass.php"><i class="fas fa-cog"></i>Change Password</a></button>
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
<h1>To Do List of <?php echo $_SESSION['UserLogin'] ?></h1>
</div>
  <form action="homepage.php" method="post">
  <input type="text" name="task" class="task_input" required="">
  <button type="submit" name="add"><i class="fas fa-plus-circle"></i></button>
</form>
<table>
  <thead>
    <tr>
      <th>NO.</th>
      <th>TASKS</th>
      <th>DELETE</th>
    </tr>
  </thead>

  <tbody>
<?php $ID = 1;
  if(mysqli_num_rows($result) > 0)  
  {  
    ?>
      <?php  $i=1;  while($row = mysqli_fetch_array($result))  
       {  
  ?>  
  <tr>
  <!--VIEW TASK-->  
       <td align="center"><?php echo "$ID"; ?></td>  
       <td align="center"><?php echo $row["task"]; ?></td>  
  <td class="center"><a href="homepage.php?del=<?php echo $row['ID']; ?>"><i class="fas fa-trash-alt"></i></a>
      
      </td>
  <?php  
       $ID++;}  
 } 
   
  ?>        
    </tr>
 
  </tbody>
</table>
</body>
</html>