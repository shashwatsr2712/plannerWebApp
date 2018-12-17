<?php require "includes/common.php";
$length=$_POST['length'];
if(!($_POST['todo1text']==='The Tasks will appear like this')){
	for($i=1;$i<=$length;$i++){
		$str1="todo".$i."text";
		$str2="todo".$i."done";
		$plan=mysqli_real_escape_string($con,$_POST[$str1]);
		$status=mysqli_real_escape_string($con,$_POST[$str2]);
		if($status=='true'){
		$query="INSERT INTO users_plans(user_id,plan,status) VALUES('".$_SESSION['id']."','$plan','Done')";}
		else{
		$query="INSERT INTO users_plans(user_id,plan,status) VALUES('".$_SESSION['id']."','$plan','Pending')";}
		$run_query=mysqli_query($con,$query) or die(mysqli_error($con));
	}
}
?>