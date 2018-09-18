$(document).ready(function(){
    $("#buttons").on('click',function(){
        changeNumSelect();
    });
    $("#sbtBtn").on('click',function(){
        var place = $('input[name=place]:checked').val();
        var num;
        if(place == null){
            $("#errorMss").removeClass('hidden');
        }else{
            if(place == 'Table'){
                num = $("#num_tb option:selected").text();
            }else{
                num = $("#num_comp option:selected").text();
            }
            var sub = $("#sub").val();
            var id = Cookies.get('id');
            alert("Place : " + place + ' Number :' + num + ' Subject : ' + sub);
            //sendRequest(place, num, sub, id);
        }
    });
});


/***************************
 *
 * Get session information and insert them into database table
 *
 ***************************/

function sendRequest(place, num, subject, id){
    $.ajax({
        url:"http://stakada.icoolshow.net/slc/student/model/sendRequest.php",
        type:"POST",
        data:{'place':place,
             'num':num,
             'subject':subject,
             'student_id':id,
             'username':Cookies.get('username'),
             'sid':Cookies.get('sid')},
             success:function(response){
                if(response){
                    alert("success");
                }else{
                    alert("fail");
                }
            }
    });
    return false;
}


/***************************
 *
 *
 *
 ***************************/

function changeNumSelect(){
    if($('#tb:checked').val()){
            $("#num_tb").removeClass('hidden');
            $("#num_comp").addClass('hidden');

    }else{
        $("#num_tb").addClass('hidden');
        $("#num_comp").removeClass('hidden');
    }   
}