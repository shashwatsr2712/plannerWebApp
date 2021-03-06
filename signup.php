<?php require "includes/common.php";
if(isset($_SESSION['id'])){
	header('location:main.php');}
else{
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp-Planner</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.4/angular.min.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
</head>
<body>

	<!--Fixed navbar at the top-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--padding-top=0px(overriding bootstrap's navbar-brand css) is essential for logo to fit in the navbar as height of logo is same as that of navbar-->
			<a href="index.php" class="navbar-brand" style="padding-top:0px;"><img src="images/pLogo1n.jpeg" alt="Planner Logo"/></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><button type="button" class="btn btn-primary navbar-button" data-toggle="modal" data-target="#myModal">About</button></li>
			</ul>
		</div>
	</div>
	</nav>	

	<?php include "includes/modal.php";?>

	<div class="jumbotron" id="bg-img"><br/><h1 id="banner1" style="text-align:center;">PLAN IT. DO IT.</h1></div>
	
	<div class="row"><div class="col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
	<div class="panel panel-primary">
    <div class="panel-heading">
	</div>
	<div class="panel-body">
      <div class="row"><div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-xs-12"><p class="text-warning"><h3 style="font-family:roboto;">SignUp Now</h3></p><br/>
	  <form method="post" action="signup_script.php">
        <div class="form-group">
	      <label for="name">UserName</label>
	      <input type="text" name="name" placeholder="Enter your name" class="form-control" required="true">
	    </div><br/>
	    <div class="form-group">
	      <label for="email">Email</label>
	      <input type="email" name="email" placeholder="Enter your email id" class="form-control" required="true">
	    </div><br/>
	    <div class="form-group">
	      <label for="password">Password</label>
	      <input type="password" name="password" placeholder="Enter your password" class="form-control" required="true" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
		  <div style="font-style:bold;color:#FF0000;"><?php echo $_GET['signup_error'];?></div>
		</div><br/>
	    <button type="submit" value="submit" class="btn btn-primary btn-block">SignUp</button><br/><br/>
      </form>
	  </div></div>
    </div>
	<div class="panel-footer"><p style="font-family:courier;font-style:bold;">Already have an account? <a href="login.php"><strong>Login</strong></a></p>
	</div>
	</div></div></div><?php }?>
  
  <?php include "includes/footer.php";?>
  
</body>
</html>