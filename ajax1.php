<?php require "includes/common.php";
$query="DELETE FROM users_plans WHERE user_id='".$_SESSION['id']."'";
$run_query=mysqli_query($con,$query) or die(mysqli_error($con));
?>