var app = angular.module("myApp",['ngRoute']);

app.config(['$routeProvider',
	function($routeProvider){
		$routeProvider.
		when('/login', {
			title:'Login',
			templateUrl:'login.html',
			controller:'authCtrl'
		})
		.when('/logout',{
			title:'Logout',
			templateUrl:'login.html',
			controller:'authCtrl'
		})
		.when('/signUp',{
			title:'SignUp',
			templateUrl:'signUp.html',
			controller:'authCtrl'
		})
		.when('/dashboard',{
			title:'Dashboard',
			templateUrl:'dashboard.html',
			controller:'authCtrl'
		})
		.when('/',{
			title:'Login',
			templateUrl:'login.html',
			controller:'authCtrl',
			role:'0'
		})
		.otherwise({
			redirectTo:'/login'
		});
}])

