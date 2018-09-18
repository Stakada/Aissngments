$(document).ready(function(){
	$('#signin').on('click', function(e){
		e.preventDefault();
		var email = $('#email').val();
		var pass = $('#pass').val();
		
		if(email !='' && pass != ''){
			if(signin(email, pass).trim() == 1){
				Cookies.set('loginAdmin', 'login', {expires:1, path:'/'});
					
				window.location = "http://seton.northseattle.edu/admin";
			}else{
				$('#errMss').removeClass('d-none');
			}
			
			/*if(signin(email,pass) == 'true'){
				window.location = "http://stakada.icoolshow.net/slc/admin/index.html";
			}else{
				console.log(signin);
				//$('errMss').removeClass('d-none');
			}
			*/
		}
	});
});

function signin(email, pass){
	var signin;
	$.ajax({
		async:false,
		type:'POST',
		url:'../admin/controller/signinCntrl.php',
		data:{
			email:email,
			pass:pass
		},
		success:function(response){
            console.log(response);
			signin = response;
		}
	});
	return signin;	
}