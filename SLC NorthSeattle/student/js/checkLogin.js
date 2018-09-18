$(document).ready(function(){
    if(Cookies.get('loginStudent') != "login"){
        window.location = 'http://seton.northseattle.edu/signin.html'
    }
});