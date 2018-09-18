$(document).ready(function(){
	loadSubjectType();
	
	loadCenter();
	
	loadSubjects($(".sub_type option").filter(':selected').text());
	
	$('.sub_type').change(function(){
		loadSubjects($(".sub_type option").filter(':selected').text());
	});
	
	$('#subject-table-body').on('click','.btn',function(){
		var id = $(this).attr('id');
		if(confirm("Are you sure delete this subject?")){
			deleteSubject(id);	
		}
		
	});
	
	$('#addSub').on('click', function(){
		var subject = $('#subject_name').val();
		var center = $('select.center_type option:selected').val();
		if(subject !=''){
			addSubject(subject, center);
		}
	});
});

function loadSubjectType(){
	$.ajax({
		type:"POST",
		url:"../admin/controller/typeCntrl.php",
		data:{
			req:'load'
		},
		success:function(response){
			$.each(JSON.parse(response).TutorTypes,function(i,item){
				$('<option>').addClass(item['tt_id']).html(item['type']).appendTo('select.sub_type');
			});
		}
		
	});
}

function loadCenter(){
	$.ajax({
		type:"POST",
		url:"../admin/controller/typeCntrl.php",
		data:{
			req:'load'
		},
		success:function(response){
			$.each(JSON.parse(response).TutorTypes,function(i,item){
				$('<option>').addClass(item['tt_id']).html(item['type']).appendTo('select.center_type');
			});
		}
		
	});
	
}


function loadSubjects(center){
	$('#subject-table-body').empty();
	$.ajax({
		type:'POST',
		url:'../admin/controller/subCntrl.php',
		data:{
			req:'load',
			center:center
		},
		success:function(response){
			$.each(JSON.parse(response).Subjects, function(i, item){
				$('#subject-table-body').append(
				"<tr class='pb-1 pt-1'>" +
				"<td >" + 
					item['subject'] +	
				"</td>"+
				"<td>"+
					item['center'] +
				"</td>"+
				"<td><button id="+ item['subject_id'] +" class='btn btn-danger  ml-3 p-1'>-</button></td></tr>"
				);
			});
		}
	});
}


function addSubject(subject, center){
	$.ajax({
		type:'POST',
		url:'../admin/controller/subCntrl.php',
		data:{
			req:'add',
			sub:subject,
			center:center
		},
		success:function(){
			location.reload();
		}
	});
}

function deleteSubject(subject_id){
	$.ajax({
		type:'POST',
		url:'../admin/controller/subCntrl.php',
		data:{
			req:'delete',
			subject_id:subject_id
		},
		success:function(){
			location.reload();
		}
	});
}