$(document).ready(function(){ 

    $( "#nname" ).keyup(function(e) {
        var code = e.keyCode;
        if(code != 16) { 
            $nick = $("#nname").val();
            //console.log($nick);
            $.post("register_data.php", {
                nickname:$nick
            }, function(dataBack, status){
               var obj = $.parseJSON( dataBack );
                console.log(obj);
                //console.log( dataBack );
    
                if(obj.status == 'failed' ){
                    var paragraph = $('<p />',{ //facem paragraf cu textu din obj
                        'text' : obj.msg,
                        'class' : 'register-error'
                    });
                    paragraph.appendTo(".error-wrapper");
                }
                else {
                    //valid
                    console.log( obj);
                }
            });
            $('.register-error').remove();
        }
        
    });

    $(".form_class").on('submit', function(){
        var tform=$(this);
        if(tform.hasClass('sending')){
            return false;
        }
        $('.register-error').remove();
        tform.addClass('sending');

        var dataArray=tform.serializeArray();
        dataObj = {};

        $(dataArray).each(function(i,field){
            dataObj[field.name]=field.value;
        });
        $.post("register_data.php", {
            data:dataObj
        }, function(dataBack, status){
           var obj = $.parseJSON( dataBack );


            if(obj.status == 'failed' ){
                var paragraph = $('<p />',{ //facem paragraf cu textu din obj
                    'text' : obj.msg,
                    'class' : 'register-error'
                });
                paragraph.appendTo(".error-wrapper");
            }
            else {
                //valid
                console.log( obj);
                document.getElementById("form").reset();
            }
            tform.removeClass('sending');
        });
        
        return false;

    });

});