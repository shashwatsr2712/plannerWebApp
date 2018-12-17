var appmod=angular.module("myApp",[]);
appmod.controller("myController",function($scope){
	$scope.todos=[{text:'The Tasks will appear like this',done:false}];
	$scope.pendingCount=0;
	/*Request server to fetch data from DB in order to include it in scope in $todos *begins* */ 
	$scope.loadToDo=function(){
		var s;
		var req2=new XMLHttpRequest();
		req2.onreadystatechange=function(){
			if(req2.status==200&&req2.readyState==4){
				s=req2.responseText;
				if(!(s===';||;')){
					var i;
					var tokens=s.split(";||;");
					$scope.todos=[];
					for(i=0;i<tokens.length;i+=2){
						if(tokens[i+1]==='Pending')
							$scope.todos.push({text:tokens[i],done:false});
						else
							$scope.todos.push({text:tokens[i],done:true});
					}
					$scope.countPending();
				}
			}
		};
		req2.open("POST","ajax3.php",true);
		req2.send();
		/*ends*/
	};
	
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
		/*Server request process for deleting from database *begins* */
		var req=new XMLHttpRequest();
		req.onreadystatechange=function(){
			if(req.status==200&&req.readyState==4){
				document.getElementById('control').innerHTML="<h1>Done! Redirecting...</h1><meta http-equiv='refresh' content='1;main.php'/>";
			}
		};
		req.open("POST","ajax1.php",true);
		req.send();
		/*ends*/
	};
	
	//Save
	$scope.saveToDo=function(){
		/*Server request process for updating database *begins* */
		var req1=new XMLHttpRequest();
		req1.onreadystatechange=function(){
			if(req1.status==200&&req1.readyState==4){
				document.getElementById('control').innerHTML="<h1>Done! Redirecting...</h1><meta http-equiv='refresh' content='1;main.php'/>";
			}
		};
		var str;
		str="length="+$scope.todos.length+"&";
		req1.open("POST","ajax2.php",true);
		req1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		for(i=1;i<=$scope.todos.length;i++){
			str=str+"todo"+i+"text="+$scope.todos[i-1].text+"&todo"+i+"done="+$scope.todos[i-1].done+"&";
		}
		str=str.slice(0,-1);
		req1.send(str);
		/*ends*/
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
