$(document).ready(function(){
	$('#type').change(function(){
		loadSubject($("#type option").filter(':selected').text());
	});
});	


function loadSubject(center){
	$('#sub').empty();
	$.ajax({
		type:"GET",
		url:"../model/subject.php",
		data:{
			center:center
		},
		success:function(response){
			$.each(JSON.parse(response).Subjects,function(i,item){
				
				$('<option>').addClass(item['center']).html(item['subject']).appendTo('#sub');
			});
		}
	});
}

