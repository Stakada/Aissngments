$(document).ready(function(){
    $('#logout').click(function(){
        Cookies.remove('loginAdmin');
        if(Cookies.get('loginAdmin') !== "login"){
            window.location = 'http://seton.northseattle.edu/admin/signin.html'
        }
    });
});