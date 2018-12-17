<?php require "includes/common.php";?>
<!DOCTYPE html>
<html ng-app="myApp">
<head>
	<title>Planner-Plan It.Do It.</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.4/angular.min.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
</head>
<body ng-controller="myController" id="control">
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
			<a href="main.php" class="navbar-brand" style="padding-top:0px;"><img src="images/pLogo1n.jpeg" alt="Planner Logo"/></a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Logout</a></li>
				<li><a href="" ng-click="conf()"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Create New/Delete Existing</a></li>
				<li><a href="settings.php"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Settings</a></li>
				<li><button type="button" class="btn btn-primary navbar-button" data-toggle="modal" data-target="#myModal">About</button></li>
			</ul>
		</div>
	</div>
	</nav>
	
	<?php include "includes/modal.php";?>
	
	<!--Banner with count of tasks in list-->
	<div class="jumbotron" id="bg-img"><br/>
		<div id="banner"><h1 id="banner1">Pending Tasks : {{pendingCount}}</h1><h2 id="banner2">Total : {{todos.length}}</h2></div>
	</div>
	
	<!--Table of tasks-->
	<div class="container col-sm-offset-2 col-sm-8">
		<div class="table responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>	
					<tr id="head">
						<th><h3>ToDo&nbsp;<button type="button" class="btn btn-danger" style="font-style:bold;border-radius:50%;" ng-click="saveToDo()">SAVE</button>&nbsp;<button type="button" class="btn btn-primary btn-large" style="font-style:bold;" ng-click="loadToDo()">LOAD SAVED PLANS</button></h3></th>
						<th><h3></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="todo in todos">
						<td class="done-{{todo.done}}"><h3 id="content">{{todo.text}}</h3></td>
						<td style="text-align:center;vertical-align:middle;"><input type="checkbox" ng-model="todo.done" id="check" ng-change="countPending()"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
	<!--Form to add tasks to the list-->	
	<div class="container">	
		<form class="col-sm-offset-2 col-sm-8">
			<div class="form-group">
			<input type="text" ng-model="todoText" placeholder="Add new ToDo here" class="form-control">
			</div>
			<button type="submit" class="btn btn-info" ng-click="addToDo()" style="border-radius:8px;">Add To List</button>
		</form>
	</div>
	
	<?php include "includes/footer.php";?>
<script type="text/javascript" src="javascript/dynamic2.js"></script>
</body>
</html>