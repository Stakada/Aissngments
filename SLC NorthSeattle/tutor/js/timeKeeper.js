$(document).ready(function(){ 
	
	/***************************************************
	 *
	 *     					Log in 
	 *
	 ***************************************************/
	$("#formLogin").submit(function(event){
		event.preventDefault();
		
		var sid = $("#sidLogin").val();
		var username;
		var type = $("#type").find('option:selected').text();
		
		//check sid is valid
		if(checkSid(sid, type) == 1){
			
			//check username 
			var username = getUsername(sid);
			
			if(username != 'false'){
			
				if(confirm('Is this you? ' + username)){
				
				//Sign in
				var result = signin(sid,type);
				
				if(result == "loggedin"){
					
					$('#errLogin').removeClass('d-none');
					
				}else{
					
					alert("You're signed in");
					location.reload();
				}
							
				//login failed
				}else{

					alert("Log in refused");

				}	
			}
			
		//SID is invalid
		}else{
			
			$("#errSidLogin").removeClass("d-none");
		
		}
	
	});
	
	/***************************************************
	 *
	 *     					Log out
	 *
	 ***************************************************/
	$("#formLogout").submit(function(event){
		
		event.preventDefault();
		
		var sid = $("#sidLogout").val();
		
		//check sid is valid
		if(checkSid(sid) == 1){
			
			//check login hour is exceeded 8 hours.
			
			if(isSigninHourValid(sid) == 1){
			
				//check username 
				var username = getUsername(sid);

				if(username != false){

					if(confirm('Is this you? ' + username)){

						//Sign our
						if(signout(sid) == 1){

							alert("You're signed out");
							location.reload();
						}else{
							alert("Unexpected error happned");
							location.reload();
						}
						
					//logout failed
					}else{

						alert("Log out refused");

					}	
				}
				
			}else{
				
				var time = window.prompt("Enter how many minutes you were here:", "Ex. 3 hours -> 180");
				
				while($.isNumeric(time) === false){
					hour = window.prompt("Enter how many minutes you were here:", "Ex. 3 hours -> 180");
				}
				
				if(signoutCustomeHour(sid, time) == 1){
					alert("You're logged out");
					location.reload();
				}else{
					alert("Unexpected error happned");
					location.reload();
				}
				
			}
			
		//SID is invalid
		}else{
			
			$("#err").removeClass("d-none");
		
		}
	});
	
	
	/***************************************************
	 *
	 *						Register
	 *
	 ***************************************************/
	$("#formRegister").submit(function(e){
		e.preventDefault();
		var username = $("#username").val() + '@seattlecolleges.edu';
		var sid = $("#sidRegis").val();
		var resid  = $('#retypesid').val();
		var sidMatch = false;

		if(sid == resid){
			if(checkSid(sid) == 'false'){
				if(signup(username, sid) == 1){
					location.reload();
				}
			}else{
				alert("This SID is already used.");
			} 
		}else{
			$('.residError').removeClass('d-none');
		}	
	});
});



///////////// Functions ////////////////
function getUsername(sid){
	var username;
	$.ajax({
		async:false,
		url:"../tutor/controller/timekeeper.php",
		type:"POST",
		data:{sid:sid,
			 req:"getUsername"},
		success:function(response){
			username = response
		}
	});
	return username.trim();
}

/***************************************************
 *
 *
 *
 *
 ***************************************************/
function checkSid(sid){
	var checkSid;
	$.ajax({
		async: false,
		type:"POST",
		url:"../tutor/controller/timekeeper.php",
		data:{sid:sid,
			  req:"checkSid"},
		success:function(response){
			checkSid = response;
		}	
	});
	return checkSid.trim();
}



/***************************************************
 *
 *
 *
 *
 ***************************************************/
function signin(sid,type){
	var result;
	$.ajax({
		async:false,
		type:"POST",
		url:"../tutor/controller/timekeeper.php",
		data:{sid: sid, 
			  center:type,
			  req:'signin'},
		success:function(response){
			result = response;
		}
	});
	
	return result.trim();
}



/***************************************************
 *
 *
 *
 *
 ***************************************************/
function signout(sid){
	var result;
	$.ajax({
		async:false,
		type:"POST",
		url:"../tutor/controller/timekeeper.php",
		data:{sid: sid, 
			  req:'signout'},
		success:function(response){
			result = response;
		}
		
	});
	
	return result.trim();
}

function signoutCustomeHour(sid, time){
	var result;
	$.ajax({
		async:false,
		type:"POST",
		url:'../tutor/controller/timekeeper.php',
		data:{
			sid:sid,
			time:time,
			req:'signoutCustomeHour'
		},
		success:function(response){
			console.log(response);
			result = response;
		}
	});
	return result.trim();

}


/***************************************************
 *
 *
 *
 *
 ***************************************************/
function signup(username, sid){
	var result;
	$.ajax({
		async:false,
		type:"POST",
		url:"../tutor/controller/timekeeper.php",
		data:{
			username:username, 
			sid:sid,
			req:'signup'
		},
		success : function(response){
            console.log(response);
			result = response;
		}
		
	});
	return result.trim();
}

function isSigninHourValid(sid){
	var result;
	$.ajax({
		async:false,
		type:'POST',
		url:'../tutor/controller/timekeeper.php',
		data:{
			sid:sid,
			req:'checkSigninHour'
		},
		success:function(response){
			result = response;
		}
	});
	return result.trim();
}

