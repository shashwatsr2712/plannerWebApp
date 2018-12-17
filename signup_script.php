<?php require "includes/common.php";
$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=$_POST['password'];
if(strlen($password)<8){
	header('location:signup.php?signup_error=Password too short!');}
$enpassword=md5($password);
$query="SELECT id FROM users WHERE email='$email'";
$run_query=mysqli_query($con,$query) or  die(mysqli_error($con));
$num=mysqli_num_rows($run_query);
if($num>0){
	echo "User ID already exists!";}
else{
	$query="INSERT INTO users(username,email,password) VALUES ('$name','$email','$enpassword')";
	$run_query=mysqli_query($con,$query) or die(mysqli_error($con));
	$_SESSION['id']=mysqli_insert_id($con);
	$_SESSION['email']=$email;echo "SignUp Successful !";
	header('location:main.php');
}
?>