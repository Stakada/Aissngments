$(document).ready(function(){
	$('#reportBtn').on('click', function(e){
		e.preventDefault();
		var sid = $('#sid').val();
		var start = $('#start').val() + ' 09:00:00';
		var end = $('#end').val() + ' 18:00:00';
		if(sid !='' || start !='' || end !=''){
			generateTutorReport(sid, start, end);
		}
	
	});

});


function generateTutorReport(sid, start, end){
	$('#tutor-table-body').empty();
	$.ajax({
		type:'POST',
		url:'../admin/controller/tutorReportCntrl.php',
		data:{
			sid:sid,
			start:start,
			end:end
		},
		success:function(response){
			$.each(JSON.parse(response).Tutor, function(i, item){
				var num = i + 1;
				$('#tutor-table-body').append(
					"<tr scope='row' class='pb-1pt-1'>"+
						"<td>"+num+"</td>"+
						"<td>"+item['Login']+"</td>"+
						"<td>"+item['Logout']+"</td>"+
						"<td>"+item['Total']+"</td>"+
						"<td>"+item['Type']+"</td>"+
					+"</tr>"
				);
			});
		}
	})
}