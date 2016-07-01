'use strict';

angular.module('todoListApp')
.service('dataService', function($http){
	this.helloConsole = function(){
		console.log("This is the hello console service!");
	};

	this.getTodos = function(calllback){
		$http.get('mock/todos.json')
		.then(calllback)
	};

	this.deleteTodo = function(todo){
		console.log("The " + todo.name + " has been delete!");
		//other logic
	};	

	this.saveTodos = function(todo){
		console.log(todo.length + " has been saved!");
		//other logic
	};
})