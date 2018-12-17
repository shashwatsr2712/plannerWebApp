<?php require "includes/common.php";
$query="SELECT plan,status FROM users_plans WHERE user_id='".$_SESSION['id']."'";
$run_query=mysqli_query($con,$query) or die(mysqli_error($con));
$num=mysqli_num_rows($run_query);
if($num==0){
	echo ";||;";
}
else{
	$s='';
	while($row=mysqli_fetch_array($run_query)){
		$s=$s.$row['plan'].';||;'.$row['status'].';||;';
	}
	echo substr($s,0,-4);
}
?>