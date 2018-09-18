$(document).ready(function(){
	$("form").submit(function(event){
		event.preventDefault();
		var center = $('#type option').filter(':selected').text();
        var place = $('input[name=place]:checked').val();
        var num = $('#num').val();
        var sub = $("#sub").val();
        var id = Cookies.get('id');
		
		if(center == 'Writing'){
		
			var tutor_id = $('#tutor option:selected').attr('id');
			var isValid = sendRequest(place, num, sub, id, center, tutor_id);
			if(isValid == 'false'){
				alert("Sorry, you can request a tutor only twice a day.");
			}else{
				alert("You're session request was send.");
				location.reload();
			}
			
		}else if(center == 'Navigator'){
			var tutor_id = $('#tutor option:selected').attr('id');
			sendRequest(null, null, sub, id, center, tutor_id);
			alert("You're session request was send.");
			location.reload();
		}else{
			sendRequest(place, num, sub, id, center, null);
			alert("You're session request was send.");
			location.reload();
		}
    });
});


/*************************************************************
 *
 * Get session information and insert them into database table
 *
 *************************************************************/

function sendRequest(place, num, subject, id, center, tutor_id){
	var res;
    $.ajax({
		async:false,
        type:"POST",
		url:"../controller/sendRequest.php",
        data:{
			'place':place,
            'num':num,
            'subject':subject,
            'student_id':id,
            'username':Cookies.get('username'),
            'sid':Cookies.get('sid'),
			'center':center,
			'tutor_id':tutor_id
		},success:function(response){
            res = response.trim();
        }
    });
	return res;
}

