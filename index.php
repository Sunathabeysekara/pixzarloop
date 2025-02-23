<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<!--a admin login page id:1,password:admin -->
</head>
<body>

<header>
</header>

<form method="POST" action="index.php">
	<h2  style="text-align: center; ">Admin Login</h2>

    <!--"user" -->
    <input type="text" id="userid" style="text-align: center;margin-left:680px " name="userid" placeholder="ID" required><br>
    <br>
    <!--"password"-->
    <input type="password"	style="text-align:center;margin-left:680px" id="password" name="password" placeholder="Password" required><br>
    
 
    <input type="submit" value="Log In" style="margin-left: 740px;margin-top: 12px;">
 
</form>
<!--<p>id:1<br>password:admin</p>-->
<?php
require_once'config/connect.php';
require_once'index.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$userid=$_POST['userid'];
	$password=$_POST['password'];

	$query="select * from admins where id='$userid' and password='$password'";
	$result=mysqli_query($connect,$query);
	$num=mysqli_num_rows($result);

	//for if login correctly
	if($num==1){

			header('location:home.php');
	}else{
		echo '<p style="color: red";>wrong id or password</p>';
	}

}

?>

<footer>
</footer>
</body>
</html>