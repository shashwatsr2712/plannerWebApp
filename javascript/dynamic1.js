var appmod=angular.module("myApp",[]);
appmod.controller("myController",function($scope){
	$scope.todos=[{text:'The Tasks will appear like this',done:false}];
	$scope.pendingCount=0;
	//Confirmation for Deletion;calls delToDo()
	$scope.conf=function(){
		if(confirm("Looks like you have completed the targets. Start Afresh?"))
			$scope.delToDo();
	};
	//Add to list
	$scope.addToDo=function(){
		if($scope.todoText){
			if($scope.todos[0].text=='The Tasks will appear like this'){
				$scope.todos=[];
				$scope.pendingCount=1;
			}
			else
				$scope.pendingCount+=1;
			$scope.todos.push({text:$scope.todoText,done:false});
			$scope.todoText='';
		}
	};
	//Delete or Create New;called by conf()
	$scope.delToDo=function(){
		$scope.todos=[];
		$scope.todos=[{text:'The Tasks will appear like this',done:false}];
		$scope.pendingCount=0;
	};
	//Count pending tasks
	$scope.countPending=function(){
		$scope.doneCount=0;
		for(i=0;i<$scope.todos.length;i++){
			if($scope.todos[i].done==true)
				$scope.doneCount+=1;
		}
		$scope.pendingCount=$scope.todos.length-$scope.doneCount;
	};
});
