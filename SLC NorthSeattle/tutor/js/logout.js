$(document).ready(function(){
    $('#logout').click(function(){
        Cookies.remove('login');
        if(Cookies.get('login') !== "login"){       window.location='http://stakada.icoolshow.net/slc/tutor/signin.html'
        }
    });
});