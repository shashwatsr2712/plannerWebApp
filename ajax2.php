<?php require "includes/common.php";
$length=$_POST['length'];
if(!($_POST['todo1text']==='The Tasks will appear like this')){
	for($i=1;$i<=$length;$i++){
		$str1="todo".$i."text";
		$str2="todo".$i."done";
		$plan=mysqli_real_escape_string($con,$_POST[$str1]);
		$status=mysqli_real_escape_string($con,$_POST[$str2]);
		
		$queryx="SELECT plan,status FROM users_plans WHERE user_id='".$_SESSION['id']."'";
		$run_queryx=mysqli_query($con,$queryx) or die(mysqli_error($con));
		$num=mysqli_num_rows($run_queryx);
		$s='';$flag=0;$st='';
		while($row=mysqli_fetch_array($run_queryx)){
			$s=$row['plan'];
			$st=$row['status'];
			if($s===$plan){
				$flag=1;
				break;
			}
		}
		
		if($flag===1){
			if($status=='true'){
			$query="UPDATE users_plans SET status='Done' WHERE plan='$s'";}
			else{
			$query="UPDATE users_plans SET status='Pending' WHERE plan='$s'";}
			$run_query=mysqli_query($con,$query) or die(mysqli_error($con));
		}
		else{
			if($status=='true'){
			$query="INSERT INTO users_plans(user_id,plan,status) VALUES('".$_SESSION['id']."','$plan','Done')";}
			else{
			$query="INSERT INTO users_plans(user_id,plan,status) VALUES('".$_SESSION['id']."','$plan','Pending')";}
			$run_query=mysqli_query($con,$query) or die(mysqli_error($con));
		}
	}
}
?>
