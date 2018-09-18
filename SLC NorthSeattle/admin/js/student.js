$(document).ready(function(){
	loadStudentType();
	
	$('#StudentsReport').on('click',function(e){
		
		e.preventDefault();
		
		var type = $('#student_type option:selected').val();
		var start = $('#start').val();
		var end = $('#end').val();
		if(start != '' && end != ''){
			start = start + ' 9:00:00';
			end = end + ' 18:00:00';
			loadStudents(type, start, end);
		}
	});
	
	$('#IndividualReport').on('click', function(e){
		e.preventDefault();
		
		var sid = $('#sid').val();
		var start = $('#startDate').val();
		var end = $('#endDate').val();
		if(sid != '' && start != '' && end != ''){ 
		    start += ' 9:00:00';
			end += ' 18:00:00';
		    loadIndividual(sid,start,end);
		} 
	});
});

function loadStudentType(){
	$.ajax({
		type:"POST",
		url:"../admin/controller/typeCntrl.php",
		data:{
			req:'load'
		},
		success:function(response){
			$.each(JSON.parse(response).TutorTypes,function(i,item){
				$('<option>').addClass(item['tt_id']).html(item['type']).appendTo('#student_type');
			});
		}
		
	});
}

function loadStudents(center, start, end){
	$('#students-table-body').empty();
	//alert(center + start + end);
	
	$.ajax({
		type:'POST',
		url:'../admin/controller/studentReportCntrl.php',
		data:{
			req:'load',
			center:center,
			start:start,
			end:end
		},
		success:function(response){
			$.each(JSON.parse(response).Students, function(i, item){
				var name = item['Username'].replace('@seattlecolleges.edu','');
				var indexOfDot = name.indexOf('.');
				var first = name.slice(0,indexOfDot);
				var last = name.slice(indexOfDot+1, name.length);
				var num = i + 1;
				$('#students-table-body').append(
					"<tr class='pb-1pt-1'>"+
						"<td>"+num+"</td>"+
						"<td>"+first+"</td>"+
						"<td>"+last+"</td>"+
						"<td>"+item['SID']+"</td>"+
						"<td>"+item['Access']+"</td>"+
						"<td>"+item['Total']+"</td>"+
					"</tr>"
				);
			});
			
		}
	});
}


function loadIndividual(sid, start, end){
	$('#student-table-body').empty();
	$.ajax({
		type:"POST",
		url:'../admin/controller/studentReportCntrl.php',
		data:{
			req:'loadStudent',
			sid:sid,
			start:start,
			end:end,
		},
		success:function(response){
			$.each(JSON.parse(response).Student, function(i, item){
				var num = i + 1;
				$('#student-table-body').append(
					"<tr class='pb-1pt-1'>"+
						"<td scope='row'>"+num+"</td>"+
						"<td scope='row'>"+item['Login']+"</td>"+
						"<td scope='row'>"+item['Logout']+"</td>"+
						"<td scope='row'>"+item['Total']+"</td>"+
						"<td scope='row'>"+item['Type']+"</td>"+
					"</tr>"
				);
			});
			
		}
	});
}