$(document).ready(function(){
    var place = $("#place").val(); 
    var num = $("#num").val();
    var subject = $("#subject").val();
    var id = Cookies.get("id");
    
    
});


function sendRequest(place, num, subject){
    
    $.ajax({
       type:"POST",
        url:"",
        data:{"place":place, 
              "num":num, 
              "subject":subject,
              "id":id},
        success:function(){
            //true send to success page
            //false show error
        }
    });
}