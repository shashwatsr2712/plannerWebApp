<?php require 'includes/common.php';
$passold=$_POST['password'];$enpassold=md5($passold);$passnew=$_POST['newpassword'];$enpassnew=md5($passnew);
$repassnew=$_POST['rnewpassword'];
$query="SELECT password FROM users WHERE password='$enpassold' AND id='".$_SESSION['id']."'";
$run_query=mysqli_query($con,$query) or die(mysqli_error($con));
$nos=mysqli_num_rows($run_query);$row=mysqli_fetch_array($run_query);
if($passnew!=$repassnew){
	header('location:settings.php?error_mismatch=Passwords Do Not Match!');}
if(($nos==0)||($enpassold!=$row['password'])){
	header('location:settings.php?error_dne=Password does not exist!');}
if(($passnew==$repassnew)&&($enpassold==$row['password'])){
	$queryn="UPDATE users SET password='$enpassnew' WHERE id='".$_SESSION['id']."'";
	$run_queryn=mysqli_query($con,$queryn) or die(mysqli_error($con));
	echo "<h1>Password changed successfully! Redirecting...</h1>";
	echo "<meta http-equiv='refresh' content='1;main.php'/>";
}
?>