
$(document).ready(function() {

    $(".contact").on('submit', function(e) {
        //e.preventDefault();

      var _t = $(this);
      if ( _t.hasClass( 'sending' ) ) { //formu primeste clasa sending cand se trimite
        return false;
      }
      $('.form-error').remove();
      _t.addClass('sending');

      var dataArray = $(this).serializeArray();
      dataObj = {};

      $(dataArray).each(function(i, field){
         dataObj[field.name] = field.value;

      });

      $.post("contact_data.php", {
        data: dataObj
      }, function(data, status) {

            var obj = $.parseJSON(data); //luam data ca si json si decodam
      
            if ( obj.status == 'failed' ) {

              var paragraph = $('<p />',{ //facem paragraf cu textu din obj
                'text' : obj.msg,
                'class' : 'form-error'
              });
              paragraph.appendTo(obj.where);
            }
            else {
              //date valide
              document.getElementById("form").reset();
              
            }

        //$("#test").html(data);



      _t.removeClass('sending');
    });

      return false;
  });

});

