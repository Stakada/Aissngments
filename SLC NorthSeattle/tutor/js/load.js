$(document).ready(function(){
	var interval;
	
	$('.sub_type').change(function(){
		stopLoading(interval);
		center = $(".sub_type option").filter(':selected').text();
		interval = setInterval(function(){
						load(center);
					},2000);
	});
});

function load(center){
	$.ajax({
		type:"GET",
		url:"../tutor/model/load.php",
		data:{
			center:center
		},
		success:function(response){
			console.log(response);
			$('#session').html(response);
		}
	});
}

function stopLoading(interval){
	clearInterval(interval);
}