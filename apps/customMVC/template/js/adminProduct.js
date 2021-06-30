$(document).ready(function () {

    $('.admin-language-content').click(function () {
        var lang = $(this).attr('data-lang'),
            productId = $('#product_id').val();

        $.post('/admin/product/get/content/update',
            {
                productId: productId,
                lang: lang
            },
            function (data) {
                $data = JSON.parse(data);
                console.log($data);
                if ($data) {


                    $('#meta_title').val($data.meta_title);
                    // $('#status').val();

                        $('#meta_description').val($data.meta_description);
                        $('#name_mini').val($data.title_mini);
                        $('#title').val($data.title);
                        $('#slogan').val($data.slogan);
                        $('#short_description').val($data.short_description);
                        $('#video_link').val($data.video_link);
                        $('#title_two').val($data.title_two);
                        $('#full_description').val($data.full_description);
                        $('#second_slogan').val($data.second_slogan);
                        $('#custom_html').val($data.custom_html);


                } else {

                }
            });
        return false;


    });


    $('#product_get_content').click(function () {

        var lang = $('.lang-list .active').attr('data-lang');

        if (lang == undefined || lang == '') {
            alert('Выберите язык!!!');
            return false;
        }

        var productId = $('#product_id').val(),
            status = $('#status').val(),
            metaTitle = $('#meta_title').val(),
            metaDescription = $('#meta_description').val(),
            titleMini = $('#name_mini').val(),
            title = $('#title').val(),
            slogan = $('#slogan').val(),
            shortDescription = $('#short_description').val(),
            videoLink = $('#video_link').val(),
            titleTwo = $('#title_two').val(),
            fullDescription = $('#full_description').val(),
            secondSlogan = $('#second_slogan').val(),
            customHtml = $('#custom_html').val();

        $.post('/admin/product/content/update',
            {
                productId: productId,
                lang: lang,
                status: status,
                metaTitle: metaTitle,
                metaDescription: metaDescription,
                titleMini: titleMini,
                title: title,
                slogan: slogan,
                shortDescription: shortDescription,
                videoLink: videoLink,
                titleTwo: titleTwo,
                fullDescription: fullDescription,
                secondSlogan: secondSlogan,
                customHtml: customHtml
            },
            function (data) { // Обработчик ответа от сервера
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

