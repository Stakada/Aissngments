$(document).ready(function(){
    if(Cookies.get('loginAdmin') != "login"){
        window.location = 'http://seton.northseattle.edu/admin/signin.html';
    }
});