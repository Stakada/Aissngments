$(document).ready(function(){
    if(Cookies.get('tutorLogin') !== "login"){
        window.location = 'http://seton.northseattle.edu/tutor/signin.html'
    }
});