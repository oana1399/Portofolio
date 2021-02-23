$(document).ready(function(){
    $(".form_class").on('submit', function(){
        var tform=$(this);
        if(tform.hasClass('sending')){
            return false;
        }
        $('.login-error').remove();
        tform.addClass('sending');

        $email = $("#login").val();
        $password = $("#password").val();

        $.post("login_data.php", {

            email_data: $email,
            password_data: $password

        }, function(dataBack, status){
           var obj = $.parseJSON( dataBack );

            console.log( dataBack );

            if(obj.status == 'failed' ){
                var paragraph = $('<p />',{ //facem paragraf cu textu din obj
                    'text' : obj.msg,
                    'class' : 'login-error'
                });
                paragraph.appendTo(obj.where);
            }
            else {
                //valid
                //console.log( dataBack);
                document.getElementById("form").reset();
            }
            tform.removeClass('sending');
        });

        return false;

    });



});