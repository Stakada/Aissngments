$(document).ready(function(){
    $('#logout, .logout').click(function(){
        Cookies.remove('loginStudent');
        if(Cookies.get('loginStudent') !== "login"){
            window.location = 'http://seton.northseattle.edu/signin.html'
        }
    });
});