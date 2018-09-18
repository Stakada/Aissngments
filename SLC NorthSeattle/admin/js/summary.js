$(document).ready(function(){
	getStudents();
	getTotalhour();
	getTotalAccess();
});

function getStudents(){
	$.ajax({
		type:"POST",
		url:"../admin/controller/summary.php",
		data:{
			req:'student'
		},
		success:function(response){
			$("#student_count").append("<h5 class='txt-large'>" + response + "</h5>");
		}
	});
}

function getTotalhour(){
	$.ajax({
		type:"POST",
		url:"../admin/controller/summary.php",
		data:{
			req:'hour'
		},
		success:function(response){
			$("#total_hour").append("<h5 class='txt-large'>" + response + "</h5>");
		}
	});
}

function getTotalAccess(response){
	$.ajax({
		type:"POST",
		url:"../admin/controller/summary.php",
		data:{
			req:'access'
		},
		success:function(response){
			$("#access").append("<h5 class='txt-large'>" + response + "</h5>");
		}
	});
}