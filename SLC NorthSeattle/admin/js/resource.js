$(document).ready(function(){
	$('#btnAccumReport').on('click',function(e){
		e.preventDefault();
		var center = $('#accum-center option:selected').val();
		var start = $('#accum-start').val();
		var end = $('#accum-end').val();
		
		if(center != '' || start != '' || end != ''){
			loadAccumResource(center, start, end);
		}
	});
	
	$('#btnDetailReport').on('click',function(e){
		e.preventDefault();
		var center = $('#detail-center option:selected').val();
		var start = $('#detail-start').val();
		var end = $('#detail-end').val();
		if(center != '' || start != '' || end != ''){
			loadDetailResource(center, start, end);
		}
	});
	
});


function loadAccumResource(center, start, end){
	$('#accum-table-body').empty();
	$.ajax({
		type:'POST',
		url:'../admin/controller/rsrcCntrl.php',
		data:{
			req:'accum',
			center:center,
			start:start,
			end:end
		},
		success:function(response){
			$.each(JSON.parse(response).Accum_Report, function(i, item){
				var num = i + 1;
				$('#accum-table-body').append(
					"<tr class='pb-1 pt-1'>"+
						"<th scope='row'>" + num + "</th>"+
						"<td>"+item['Subject']+"</td>"+
						"<td>"+item['Center']+"</td>"+
						"<td>"+item['Access']+"</td>"+
						"<td>"+item['Total']+"</td>"+
					"</tr>"	
				);
			})	
		}
	});
}

function loadDetailResource(center, start, end){
	$('#detail-table-body').empty();
	$.ajax({
		type:'POST',
		url:'../admin/controller/rsrcCntrl.php',
		data:{
			req:'detail',
			center:center,
			start:start,
			end:end
		},
		success:function(response){
			$.each(JSON.parse(response).Detail_Report, function(i, item){
				var num = i + 1;
				$('#detail-table-body').append(
					"<tr class='pb-1 pt-1'>"+
						"<th scope='row'>" + num + "</th>"+
						"<td>"+item['Center']+"</td>"+
						"<td>"+item['Subject']+"</td>"+
						"<td>"+item['timeStart']+"</td>"+
						"<td>"+item['timeEnd']+"</td>"+
					"</tr>"	
				);
			})	
		}
	});
}
