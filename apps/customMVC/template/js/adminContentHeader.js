$(document).ready(function () {

    $('.admin-language-content').click(function () {
        var lang = $(this).attr('data-lang');


        $.post('/admin/task/head/content/get',
            {
                lang: lang
            },
            function (data) {
                $data = JSON.parse(data);
                console.log($data);
                if ($data) {


                    $('#content_1').val($data.content_1);
                    $('#content_2').val($data.content_2);
                    $('#content_3').val($data.content_3);
                    $('#content_4').val($data.content_4);
                    $('#content_5').val($data.content_5);
                    $('#content_6').val($data.content_6);
                    $('#content_7').val($data.content_7);
                    $('#content_8').val($data.content_8);

                    $('#popup_1').val($data.popup_1);
                    $('#popup_2').val($data.popup_2);
                    $('#popup_3').val($data.popup_3);
                    $('#popup_4').val($data.popup_4);
                    $('#popup_5').val($data.popup_5);
                    $('#popup_6').val($data.popup_6);
                    $('#popup_7').val($data.popup_7);
                    $('#popup_8').val($data.popup_8);
                    $('#popup_9').val($data.popup_9);

                    $('#popup_10').val($data.popup_10);
                    $('#popup_11').val($data.popup_11);
                    $('#popup_13').val($data.popup_13);
                    $('#popup_14').val($data.popup_14);
                    $('#popup_15').val($data.popup_15);
                    $('#popup_16').val($data.popup_16);
                    $('#popup_17').val($data.popup_17);
                    $('#popup_18').val($data.popup_18);
                    $('#popup_19').val($data.popup_19);
                    $('#popup_20').val($data.popup_20);
                    $('#popup_21').val($data.popup_21);
                    $('#popup_22').val($data.popup_22);



                } else {

                }
            });
        return false;


    });


    $('#head_content_save').click(function () {

        var lang = $('.lang-list .active').attr('data-lang');

        if (lang == undefined || lang == '') {
            alert('Выберите язык!!!');
            return false;
        }

        var content_1 = $('#content_1').val(),
            content_2 = $('#content_2').val(),
            content_3 = $('#content_3').val(),
            content_4 = $('#content_4').val(),
            content_5 = $('#content_5').val(),
            content_6 = $('#content_6').val(),
            content_7 = $('#content_7').val(),
            content_8 = $('#content_8').val(),

            popup_1 = $('#popup_1').val(),
            popup_2 = $('#popup_2').val(),
            popup_3 = $('#popup_3').val(),
            popup_4 = $('#popup_4').val(),
            popup_5 = $('#popup_5').val(),
            popup_6 = $('#popup_6').val(),
            popup_7 = $('#popup_7').val(),
            popup_8 = $('#popup_8').val(),
            popup_9 = $('#popup_9').val(),
            popup_10 = $('#popup_10').val(),
            popup_11 = $('#popup_11').val(),
            popup_12 = $('#popup_12').val(),
            popup_13 = $('#popup_13').val(),
            popup_14 = $('#popup_14').val(),
            popup_15 = $('#popup_15').val(),
            popup_16 = $('#popup_16').val(),
            popup_17 = $('#popup_17').val(),
            popup_18 = $('#popup_18').val(),
            popup_19 = $('#popup_19').val(),
            popup_20 = $('#popup_20').val(),
            popup_21 = $('#popup_21').val(),
            popup_22 = $('#popup_22').val();


        $.post('/admin/task/head/multilangcontent',
            {

                lang: lang,

                content_1: content_1,
                content_2: content_2,
                content_3: content_3,
                content_4: content_4,
                content_5: content_5,
                content_6: content_6,
                content_7: content_7,
                content_8: content_8,

                popup_1: popup_1,
                popup_2: popup_2,
                popup_3: popup_3,
                popup_4: popup_4,
                popup_5: popup_5,
                popup_6: popup_6,
                popup_7: popup_7,
                popup_8: popup_8,
                popup_9: popup_9,
                popup_10: popup_10,
                popup_11: popup_11,
                popup_12: popup_12,
                popup_13: popup_13,
                popup_14: popup_14,
                popup_15: popup_15,
                popup_16: popup_16,
                popup_17: popup_17,
                popup_18: popup_18,
                popup_19: popup_19,
                popup_20: popup_20,
                popup_21: popup_21,
                popup_22: popup_22
            },
            function (data) {
                $data = (data);
                console.log($data);
                if ($data) {
                    alert('ok');
                } else {
                    alert('error data');
                }
            });
        return false;


    });

    $('.admin-language-content').click(function () {

        $('.admin-language-content').css('color', 'white');
        $('.admin-language-content').css('background', '#666');
        $('.admin-language-content').css('border', 'none');
        $('.admin-language-content').removeClass('active');


        $(this).css('color', 'red');
        $(this).css('background', 'white');
        $(this).css('border', 'solid 2px #666');
        $(this).addClass('active');

    });

});

