$(document).ready(function () {

    $("#button-auth").click(function() {
        var auth_login = $("#auth_login").val();
        var auth_pass = $("#auth_pass").val();

        if (auth_login === "" ) {
            $("#auth_login").css("borderColor","#db3434");
            send_login = 'no';
        }else {
            $("#auth_login").css("borderColor","#02334a");
            send_login = 'yes';
        }

        if (auth_pass === "") {
            $("#auth_pass").css("borderColor","#db3434");
            send_pass = 'no';
        }else {
            $("#auth_pass").css("borderColor","#02334a");
            send_pass = 'yes';
        }

        if ($("#remember").prop('checked')) {
            auth_remember = 'yes';
        }else {
            auth_remember = 'no';
        }

        if ( send_login === 'yes' && send_pass === 'yes' )
        {
            $.ajax({
                type: "POST",
                url: "../auth/auth.php",
                data: "username="+auth_login+"&password="+auth_pass+"&remember="+auth_remember,
                dataType: "html",
                cache: false,
                success: function(data) {
                    if (data === 'yes_auth') {
                        document.location.href="../index_auth.php";
                    }
                    else{
                        $("#message-auth").slideDown(400);
                    }
                }
            });
        }
    });
//Выход из профиля
    $('#logout').click(function(){
        $.ajax({
            type: "POST",
            url: "../logout.php",
            dataType: "html",
            cache: false,
            success: function(data) {
                if (data === 'logout') {
                    document.location.href="../index.php";
                }
            }
        });
    });
//Вывод расписания звонков
    $('.title-call').toggle(
        function() {
            $(".title-call").attr("id","active-button");
            $("#block-top-call").fadeIn(200);
        },
        function() {
            $(".title-call").attr("id","");
            $("#block-top-call").fadeOut(200);
        }
    );
//Вывод календаря
    $('.title-calendar').toggle(
        function() {
            $(".title-calendar").attr("id","active-button");
            $("#calendar").fadeIn(200);
        },
        function() {
            $(".title-calendar").attr("id","");
            $("#calendar").fadeOut(200);
        }
    );

//Обработка заполнения дистанционных занятий
    $("#button-check").click(function(){

        var link = $("#link").val();
        var education = $("#education").val();
        var group_kurs = $("#group-kurs").val();
        var number_para = $("#number-para").val();
        var date_para = $("#date-para").val();

        var id = $(".sessionID").text();
        let num_id = Number(id);

        if (link === "") {
            $("#link").css("borderColor","#db3434");
            send_link = 'no';
        }else {
            send_link = 'yes';
        }

        if (education === "") {
            $("#education").css("borderColor","#db3434");
            send_education = 'no';
        }else {
            send_education = 'yes';
        }

        if (group_kurs === "") {
            $("#group-kurs").css("borderColor","#db3434");
            send_group_kurs = 'no';
        }else {
            send_group_kurs = 'yes';
        }

        if (number_para === "") {
            $("#number-para").css("borderColor","#db3434");
            send_number_para = 'no';
        }else {
            send_number_para = 'yes';
        }

        if (date_para === "") {
            $("#date-para").css("borderColor","#db3434");
            send_date_para = 'no';
        }else {
            send_date_para = 'yes';
        }

        if (send_link === 'yes' && send_education === 'yes' && send_group_kurs === 'yes' && send_number_para === 'yes' && send_date_para === 'yes')
        {
            $.ajax({
                type: "POST",
                url: "../include-distance-learning/treatment-link.php",
                data: "link="+link+"&education="+education+"&group_kurs="+group_kurs+"&number_para="+number_para+"&date_para="+date_para+"&id="+num_id,
                dataType: "html",
                cache: false,
                success: function(data) {
                    if (data === 'yes_link') {
                        document.location.href="../index_auth.php";
                    }
                    if (data === 'no_link') {
                        $("#message-link").slideDown(400);
                    }
                }
            });
        }
    });

});