function template_err(e, str) {
    $('#err_msg').empty();
    $("#err_msg").addClass("alert alert-danger");
    $("#err_msg").css('visibility', "visible");
    $('<strong>Ошибка!</strong>').appendTo('#err_msg');
    $(str).appendTo('#err_msg');
    e.preventDefault();
}

$("#formbranch").submit( 
    function(e) {
        
        if ( $('#departure').val() == $('#destination_station').val() ) {
            str = '<span> Выберите другую станцую в одном из выпадающих списков! </span>';
            $('#length').css("box-shadow",  "0 0 10px 5px red");
            template_err(e, str);
        }

        if ( $('#departure').val() == "init") {
            var str = '<span> Выберите станцую отправки. </span>';
            template_err(e, str);
            return false;
        }
        
        if ( $('#destination_station').val() == "init" ) {
            var str = '<span> Выберите станцую прибытия. </span>';
            template_err(e, str);
            return false;
        }

        if ( document.getElementById('length').value == '' ) {
            str = '<span> Заполните поле &laquo;Протяженность&raquo;</span>';
            template_err( e, str);
            return false;
        }
    }

);

function change_disabled(value) {
    $('#destination_station').prop("disabled", value);
    $('#length').prop("disabled", value);
}


$(document).ready( function () {
    
    change_disabled(true);

    $('#destination_station').select2(
        {
            ajax : {
                url : 'http://mgtrains.com/includes/Handler_requst.php',
                type : "GET",
                dataType : 'json',
                delay: 250,
                data : function(params) {
                    console.log($('#departure').val());
                    return {
                        text : params.term,
                        departure : $('#departure').val()
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                };
            }
            }
        }
    );

    $("#departure").select2(
        { 
            ajax : {
                url : 'http://mgtrains.com/includes/Handler_requst.php',
                type : "GET",
                dataType : 'json',
                delay: 250,
                data : function(params) {
                    return {text : params.term };
                },
                processResults: function (response) {
                    
                    return {
                        results: response
                    };
                },
                cache : false 
            }
        }
    );
    
    $("#departure").on("change", function() {
        $("#hidden_departure").val( $('#departure').val() );
        change_disabled(false);
    });

    $('#length').on("click", function() {
        //$('#length').css("box-shadow",  "0 0 0px 0px black");
    })

});
