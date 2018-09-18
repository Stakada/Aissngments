$(document).ready(function(){
    //get information
    
    $('#form').submit(function(){
        var username = $("#username").val();
        var pass = $("#password").val();
        var center = $("#center").val();
        if(username == null || pass == null){
            alert("Please fill out every input.");
        }else{
            if(username == 'Tutor' && pass == 'password123'){
                alert("success");
                //set login cookie to login for a day
                Cookies.set('login', 'login', {expires:1, path:'/'});
                send(center);
            }else{
                $('#errorMss').removeClass('hidden');
            }
        } 
    return false;
    });
});

function send(center){
    switch(center){
        case 'ms':
            window.location = "ms.html";
            break;
        case 'premath':
            window.location = "premath.html";
            break;
        case 'accnt':
            window.location = "accnt.html";
            break;
        case 'wrt':
            window.location = "wrt.html";
            break;
        default:
            break;
    }
}