function conf(){
	var x=confirm("Looks like you have completed the targets. Start Afresh?");
	if(x==true){
		angular.element(document.getElementById('control')).scope().delToDo();
		angular.element(document.getElementById('control')).scope().$apply();
	}
}
var appmod=angular.module("myApp",[]);
appmod.controller("myController",function($scope){
	$scope.todos=[{text:'The Tasks will appear like this',done:false}];
	$scope.addToDo=function(){
		if($scope.todoText){
			if($scope.todos[0].text=='The Tasks will appear like this')
				$scope.todos=[];
			$scope.todos.push({text:$scope.todoText,done:false});
			$scope.todoText='';
		}
	};
	$scope.delToDo=function(){
		$scope.todos=[];
		$scope.todos=[{text:'The Tasks will appear like this',done:false}];
	};
});
