$(document).ready(function(){
	var disable = false;
	
	$('#type').change(function(){
		
		if($('#type option').filter(':selected').text() == "Writing"){
			if(!disable){
				undoDisable();
			}
			
			loadTutor($('#type option:selected').text());
		
		}else if($('#type option').filter(':selected').text() == "Navigator"){
			
			loadTutor($('#type option:selected').text());
			
			disableNumPlace();
			
		}else{
			
			$('#tutor-option').addClass("d-none");
			
			if(!disable){
			
				undoDisable();
			
			}
		}
	});
});	

function disableNumPlace(){
	$('.place').prop('disabled', true);
	$('#num').prop('disabled', true);
}

function undoDisable(){
	$('.place').prop('disabled', false);
	$('#num').prop('disabled', false);
}

function loadTutor(center){
	$('#tutor-option').removeClass("d-none");
	$('#tutor').empty();
	$.ajax({
		type:"POST",
		url:"../controller/tutor.php",
		data:{
			center:center
		},
		success:function(response){
			$('#tutor').prop('required', true);
			$.each($.parseJSON(response).Tutor, function(i,item){
				var options = "<option id=" + item['tutor_id'] + ">" + item['FirstName'] + " " + item['LastName'];
			
				$("#tutor").html("<option id='1'>Any Tutor</option>" + options);
			});
		}
	});
}