<?php
include("connection.php");
$con=connection();
	$email=$_POST['email'];
	$user=$_POST['user'];
$sql=mysqli_query($con,"SELECT * from user_tbl where (email='$email' or username='$user')");
	 if (mysqli_num_rows($sql) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($sql);
            if ($user==$row['username'])
            {
                echo "Username already exists";
            }
            elseif($email==$row['email'])
            {
                echo "Email already exists";
            }
else if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
   $sql= "INSERT INTO `user_tbl`(`firstname`, `lastname`, `email`, `username`, `password`) VALUES ('$fname','$lname','$email','$user','$pass')";
	$con->query($sql)or die ($con->error);
	echo header("location: index.php");

}	
}



if (isset($_POST['signup'])) {
  	$email = $_POST['email'];
  	$user = $_POST['user'];
  	

  	$sql_e = "SELECT * FROM user_tbl WHERE email='$email'";
  	$sql_u = "SELECT * FROM users_user WHERE username='$user'";
  	$res_e = mysqli_query($con, $sql_e);
  	$res_u = mysqli_query($con, $sql_u);

  	if (mysqli_num_rows($res_e) > 0) {
  	  $name_error = "Sorry... username already taken"; 	
  	}else if(mysqli_num_rows($res_u) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}else{
        $sql= "INSERT INTO `user_tbl`(`firstname`, `lastname`, `email`, `username`, `password`) VALUES ('$fname','$lname','$email','$user','$pass')";
          $con->query($sql)or die ($con->error);
	echo header("location: index.php");
  	}
  }
?>
?>