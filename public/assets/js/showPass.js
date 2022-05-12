$(document).ready(function(){
    $('#show').click(function(){
        if($('#password').attr("type") == "password"){
            $("#password").attr("type", "text");
            $('#icons').removeAttr('data-icon', 'pepicons:eye')
            $('#icons').attr('data-icon', 'pepicons:eye-closed')
            
        } else{
            $("#password").attr("type", "password");
            $('#icons').removeAttr('data-icon', 'pepicons:eye-closed')
            $('#icons').attr('data-icon', 'pepicons:eye')
        };
    });
});