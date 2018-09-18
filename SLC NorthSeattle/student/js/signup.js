$(document).ready(function(){
    var sid = $('#sid');
    var resid  = $('#retypesid');
    var sidMatch = false;
    var errorMss = $("#errorMss");
    
	//check if the sid is matches or not
    resid.on("keyup", function(){
       if(sid.val() == resid.val()){
           $('.residError').addClass('d-none');
           sidMatch = true;
           
       }else{
           $('.residError').removeClass('d-none');
           sidMatch = false;
       }
    });
	
	
    $('#formSignup').submit(function(event){
		event.preventDefault();
		
		//retype sid is not matching
		if(sidMatch == false){
			
			
			
		}else{
			var username = $("#username").val() + '@seattlecolleges.edu';
			var sid = $("#sid").val();
			//alert("EAD -> " + username + " Sid is -> " + sid);
			if(username !="" && sid !=""){ 
				
				//alert("EAD -> " + username + " Sid is -> " + sid);
				
				
				//check if this information is already existed in database
				var result = signUp(username, sid);
				if(result == "siddup"){
					alert("This SID is already used.");
				}else if(result == 'false'){
					alert("There was an error. Try again.");
				}else if(result == 'true'){
					alert("You're account was successfully created.")
					window.location ="../signin.html";
				}  
				
			}	
			
			
		}
		
    });
});


function signUp(username,sid){
	var result;
    $.ajax({
		async:false,
		type:"POST",
      	url:"../model/signup.php",
        data:{
            'username':username, 
            'sid':sid
        },
        success:function(response){
            result = response;
        }
    });
	return result.trim();
}