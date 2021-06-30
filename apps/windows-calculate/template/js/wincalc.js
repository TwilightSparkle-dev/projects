$(function () {


    var params = {};

    params['x'] = 1330;
    params['y'] = 1400;

    firstchange = true;

    $(".wincalc-vertical-slider-ui").slider({
        min: 500,
        max: 1800,
        step: 10,
        orientation: "vertical",
        slide: sliderChange,
        change: sliderChange,
    });
    $(".wincalc-horisontal-slider-ui").slider({
        min: 500,
        max: 3000,
        step: 10,
        slide: sliderChange,
        change: sliderChange,
    });

    //setTimeout(function(){$("html, body").stop().animate({scrollTop:210}, 500, 'swing');}, 100);


    $(".wincalc-vertical-slider-ui").slider({value: params['y']});
    $(".wincalc-horisontal-slider-ui").slider({value: params['x']});

    function sliderChange(event, ui) {

        //console.log(ui.value);
        if ($(event.target).hasClass('wincalc-vertical-slider-ui')) {
            $(".wincalc-vertical-slider-counter").text(ui.value);
            $("#wincalc-size-selector-y").val(ui.value);
            $(".wincalc-vertical-slider-counter").css('top', 100 - (ui.value - $('.wincalc-vertical-slider-ui').slider("option", 'min')) / ($('.wincalc-vertical-slider-ui').slider("option", 'max') - $('.wincalc-vertical-slider-ui').slider("option", 'min')) * 100 + '%');
        }

        if ($(event.target).hasClass('wincalc-horisontal-slider-ui')) {
            $(".wincalc-horisontal-slider-counter").text(ui.value);
            $("#wincalc-size-selector-x").val(ui.value);
            $(".wincalc-horisontal-slider-counter").css('left', (ui.value - $('.wincalc-horisontal-slider-ui').slider("option", 'min')) / ($('.wincalc-horisontal-slider-ui').slider("option", 'max') - $('.wincalc-horisontal-slider-ui').slider("option", 'min')) * 100 + '%');
        }

        calculateBalkonPrice();
    }

    $('#wincalc-size-selector-x').on('change', function () {
        $('.wincalc-horisontal-slider-ui').slider('value', $(this).val());
    });

    $('#wincalc-size-selector-y').on('change', function () {
        $('.wincalc-vertical-slider-ui').slider('value', $(this).val());
    });

    $('.wincalc-type-selector-one').on('click', function () {
        //$('.wincalc-type-selector-one-selected').find('img').attr('src','/wincalc/images/balkon/'+$('.wincalc-type-selector-one-selected').data('btype')+'-icon.png');
        $('.wincalc-type-selector-one-selected').removeClass('wincalc-type-selector-one-selected');
        $(this).addClass('wincalc-type-selector-one-selected');
        //$(this).find('img').attr('src','/wincalc/images/balkon/'+$(this).data('btype')+'-icon-active.png');
        changeBalkonType();
    });

    $('.wincalc-type2-selector input').on('change', function () {
        changeBalkonType();
    });

    $('.wincalc-options input').on('change', function () {
        changeBalkonType();
    });

    $('.wincalc-frame-selector > div').on('click', function () {
        $(this).parent().find('.wincalc-frame-selector-selected').removeClass('wincalc-frame-selector-selected');
        $(this).addClass('wincalc-frame-selector-selected');

        $('.wincalc-frame').css('z-index', '0');
        $(this).parent().parent().css('z-index', '1');

        if ($(this).hasClass('wincalc-frame-selector-g')) {
            $(this).parent().parent().find('img').css('opacity', 0);
        } else {
            $(this).parent().parent().find('img').css('opacity', 1);

            rotateAngle = '-20deg';
            if ($(this).parent().parent().hasClass('wincalc-frame-2') || $(this).parent().parent().hasClass('wincalc-frame-4')) {
                rotateAngle = '20deg';
            }

            if ($(this).hasClass('wincalc-frame-selector-p')) {

                $(this).parent().parent().find('img')
                    .queue(function () {
                        $(this).css('transform', 'perspective(800px) rotateY(' + rotateAngle + ') scale(.9,1)').css('-webkit-transform', 'perspective(800px) rotateY(' + rotateAngle + ') scale(.9,1)');
                        ;$(this).dequeue();
                    })
                    .delay(1000)
                    .queue(function () {
                        $(this).css('transform', 'perspective(800px) rotateY(0)').css('-webkit-transform', 'perspective(800px) rotateY(0)');
                        $(this).dequeue();
                    });
            } else {
                $(this).parent().parent().find('img')
                    .queue(function () {
                        $(this).css('transform', 'perspective(800px) rotateY(' + rotateAngle + ') scale(.9,1)').css('-webkit-transform', 'perspective(800px) rotateY(' + rotateAngle + ') scale(.9,1)');
                        $(this).dequeue();
                    })
                    .delay(1000)
                    .queue(function () {
                        $(this).css('transform', 'perspective(800px) rotateY(0)').css('-webkit-transform', 'perspective(800px) rotateY(0)');
                        $(this).dequeue();
                    })
                    .delay(1000)
                    .queue(function () {
                        $(this).css('transform', 'perspective(800px) rotateX(-10deg) scale(1,.9)').css('-webkit-transform', 'perspective(800px) rotateX(-10deg) scale(1,.9)');
                        $(this).dequeue();
                    })
                    .delay(1000)
                    .queue(function () {
                        $(this).css('transform', 'perspective(800px) rotateX(0)').css('-webkit-transform', 'perspective(800px) rotateX(0)');
                        $(this).dequeue();
                    });

            }
        }
        changeBalkonType();
    });

    var btype;


    function changeBalkonType() {

        btype = $('.wincalc-type-selector-one-selected').data('btype');
        $('.wincalc-constuction img').attr('src', 'template/img/window-' + btype + '-frame.jpg');


        switch (btype) {
            case 1: {
                $('.wincalc-horisontal-slider').css('width', '200px');
                sminx = 500;
                smaxx = 1000;
                sminy = 500;
                smaxy = 2400;
                $('.wincalc-frame').css('opacity', 0);
                $('.wincalc-frame-1').css('opacity', 1);
                $('.wincalc-frames').css('transform', 'scale(1)');
            }
                break;

            case 2: {
                $('.wincalc-horisontal-slider').css('width', '350px');
                sminx = 1000;
                smaxx = 1600;
                sminy = 500;
                smaxy = 2400;
                $('.wincalc-frame').css('opacity', 0);
                $('.wincalc-frame-1').css('opacity', 1);
                $('.wincalc-frame-2').css('opacity', 1);
                $('.wincalc-frames').css('transform', 'scale(1)');
            }
                break;
            case 3: {
                $('.wincalc-horisontal-slider').css('width', '530px');
                sminx = 1500;
                smaxx = 2500;
                sminy = 500;
                smaxy = 2400;
                $('.wincalc-frame').css('opacity', 1);
                $('.wincalc-frame-4').css('opacity', 0);
                $('.wincalc-frames').css('transform', 'scale(1)');
            }
                break;
            case 4: {
                $('.wincalc-horisontal-slider').css('width', '650px');
                sminx = 2300;
                smaxx = 3500;
                sminy = 500;
                smaxy = 2400;
                $('.wincalc-frame').css('opacity', 1);
                $('.wincalc-frames').css('transform', 'scale(1)');
            }
                break;
            case 'b': {
                $('.wincalc-horisontal-slider').css('width', '360px');
                sminx = 1500;
                smaxx = 2600;
                sminy = 500;
                smaxy = 2400;
                $('.wincalc-frame').css('opacity', 0);
                $('.wincalc-frame-1').css('opacity', 1);
                $('.wincalc-frame-2').css('opacity', 1);
                $('.wincalc-frames').css('transform', 'scale(.73)');
            }
                break;
            case 'd': {
                $('.wincalc-horisontal-slider').css('width', '130px');
                sminx = 500;
                smaxx = 1000;
                sminy = 500;
                smaxy = 2400;
                $('.wincalc-frame').css('opacity', 0);
            }
                break;
        }

        $(".wincalc-horisontal-slider-ui").slider({min: sminx, max: smaxx});
        $(".wincalc-vertical-slider-ui").slider({min: sminy, max: smaxy});
        $('.wincalc-vertical-slider-min').text(sminy);
        $('.wincalc-vertical-slider-max').text(smaxy);
        $('.wincalc-horisontal-slider-min').text(sminx);
        $('.wincalc-horisontal-slider-max').text(smaxx);


        if ($('.wincalc-horisontal-slider-ui').slider("option", 'value') < sminx) {
            $('.wincalc-horisontal-slider-ui').slider('value', sminx)
        }
        if ($('.wincalc-horisontal-slider-ui').slider("option", 'value') > smaxx) {
            $('.wincalc-horisontal-slider-ui').slider('value', smaxx)
        }
        if ($('.wincalc-vertical-slider-ui').slider("option", 'value') < sminy) {
            $('.wincalc-vertical-slider-ui').slider('value', sminy)
        }
        if ($('.wincalc-vertical-slider-ui').slider("option", 'value') > smaxy) {
            $('.wincalc-vertical-slider-ui').slider('value', smaxy)
        }

        $('.wincalc-horisontal-slider-ui').slider('value', $('.wincalc-horisontal-slider-ui').slider('value'));
        $('.wincalc-vertical-slider-ui').slider('value', $('.wincalc-vertical-slider-ui').slider('value'));

        calculateBalkonPrice();
    }

    $('.wincalc-frame-selector-selected').trigger('click');

    changeBalkonType();

    function calculateBalkonPrice() {

        console.log(firstchange);
        if (firstchange) {

        } else {
            //ga('send', 'event', 'Windows page calc', 'changed');
        }

        var priceMultipler,
            btype2 = $('.wincalc-type2-selector > div > input:checked').data('btype2');
        //alert(btype2);

        var baseprice = 4300;

        switch (btype2) {
            case 'p1':
                priceMultipler = 0.95 * 0.827;
                break;
            case 'p2':
                priceMultipler = 0.95;
                break;
            case 'p3':
                priceMultipler = 0.95 * 1.1153;
                break;
            case 'p4':
                priceMultipler = 0.95 * 1.1728;
                break;
            //case 'p4':priceMultipler=1.9;break;
        }

        var framesCount = 0;

        switch (btype) {
            case 'd':
                framesCount = 0;
                break;
            case 1:
                framesCount = 1;
                break;
            case 2:
            case 'b':
                framesCount = 2;
                break;
            case 3:
                framesCount = 3;
                break;
            case 4:
                framesCount = 4;
                break;
        }

        switch (btype) {
            case 1:
                priceMultipler *= 1;
                break;
            case 2:
                priceMultipler *= 0.785;
                break;
            case 3:
                priceMultipler *= 0.753;
                break;
            case 'b':
                priceMultipler *= .775;
                break;
        }

        var frameMultipler = 1;

        for (i = 1; i <= framesCount; i++) {
            if ($('.wincalc-frame').eq(i - 1).find(".wincalc-frame-selector-selected").hasClass('wincalc-frame-selector-p')) frameMultipler += .1;
            if ($('.wincalc-frame').eq(i - 1).find(".wincalc-frame-selector-selected").hasClass('wincalc-frame-selector-o')) frameMultipler += .12;
        }

        console.log(framesCount, frameMultipler);

        var sizeMultipler = $('.wincalc-vertical-slider-ui').slider("option", 'value') * $('.wincalc-horisontal-slider-ui').slider("option", 'value') / (1000 * 1000);


        optionsSum = 0;

        var optionMontagPrice = Math.round(sizeMultipler * 1450);
        if (optionMontagPrice > 4000) optionMontagPrice = 4000;

        var optioPodokonnikPrice = Math.round(.360 * $('.wincalc-horisontal-slider-ui').slider("option", 'value'));

        var optioOtkosPrice = Math.round(($('.wincalc-horisontal-slider-ui').slider("option", 'value') + $('.wincalc-vertical-slider-ui').slider("option", 'value') * 2) / 1000 * 480);
        var optioOtlivPrice = Math.round(.209 * $('.wincalc-horisontal-slider-ui').slider("option", 'value'));

        $('#wincalc-options-1').next().find('span > span').eq(0).text('+' + optionMontagPrice);
        $('#wincalc-options-2').next().find('span > span').eq(0).text('+' + optioPodokonnikPrice);
        $('#wincalc-options-3').next().find('span > span').eq(0).text('+' + optioOtlivPrice);
        $('#wincalc-options-4').next().find('span > span').eq(0).text('+' + optioOtkosPrice);

        if ($('#wincalc-options-1').is(':checked')) optionsSum += optionMontagPrice;
        if ($('#wincalc-options-2').is(':checked')) optionsSum += optioPodokonnikPrice;
        if ($('#wincalc-options-3').is(':checked')) optionsSum += optioOtlivPrice;
        if ($('#wincalc-options-4').is(':checked')) optionsSum += optioOtkosPrice;

        price = Math.round(1000 + baseprice * priceMultipler * sizeMultipler * frameMultipler + optionsSum);

        //console.log(priceMultipler+', '+sizeMultipler+', '+optionsMultipler);

        $('.wincalc-price-value').text(String(price).replace(/(.)(?=(\d{3})+$)/g, '$1 '));

        $('.wincalc-button').on('click', function () {


            switch (btype) {
                case 1:
                    calcType = "одностворчатое окно";
                    break;
                case 2:
                    calcType = "двухстворчатое окно";
                    break;
                case 3:
                    calcType = "трехстворчатое окно";
                    break;
                case 4:
                    calcType = "четырехстворчатое окно";
                    break;
                case 'b':
                    calcType = "балконный блок";
                    break;
                case 'd':
                    calcType = "балконная дверь";
                    break;
            }

            calcOtions = '';

            if ($('#wincalc-options-1').is(':checked')) calcOtions += 'монтажом, ';
            if ($('#wincalc-options-2').is(':checked')) calcOtions += 'подоконником, ';
            if ($('#wincalc-options-3').is(':checked')) calcOtions += 'отливом, ';
            if ($('#wincalc-options-4').is(':checked')) calcOtions += 'откосом, ';

            if (calcOtions != '') calcOtions = ' (с ' + calcOtions.substr(0, calcOtions.length - 2) + ')';

            phrase_wh = 'Мы перезвоним вам за 25 секунд, уточним стоимость и поможем оформить заказ на ' + calcType + ' ' + $('.wincalc-horisontal-slider-ui').slider("option", 'value') + 'x' + $('.wincalc-vertical-slider-ui').slider("option", 'value') + calcOtions;
            phrase_nwh = 'Мы перезвоним вам, уточним стоимость и поможем оформить заказ на ' + calcType + ' ' + $('.wincalc-horisontal-slider-ui').slider("option", 'value') + 'x' + $('.wincalc-vertical-slider-ui').slider("option", 'value') + calcOtions;
            //DialogWidget.globalDW.activatePopup(phrase_wh,phrase_nwh);

            //ga('send', 'event', 'Windows page calc', 'send', calcType+' '+$('.wincalc-horisontal-slider-ui').slider("option", 'value')+'x'+$('.wincalc-vertical-slider-ui').slider("option", 'value')+calcOtions);

            return false;
        });

    }

    visiblesend = false;
    firstchange = false;

    $('.wincalc-17').on('mouseover', function () {
        if (visiblesend) {

        } else {
            //ga('send', 'event', 'Windows page calc','mouse');
            visiblesend = true;
        }

    });


    /*var calculateTimeout;
    var xhrCount = 0;
    
    function calculateBalkonPrice(){
		  	    
	  	$('.block-balkon-calc-price-value').countTo('stop');
	  	
	  	$('.block-balkon-calc-price-value').css('opacity',.05);
	  	$('.block-balkon-calc-price-loading').css('opacity',1);
	  	
	  	
	  	clearTimeout(calculateTimeout);
	  	
	    calculateTimeout=setTimeout(function(){
		    
		    var constructionOptions='';
		    
		    btype2=$('.wincalc-type2-selector > div > input:checked').data('btype2');
		     	    
		    if($('#block-balkon-calc-options-1').is(':checked'))constructionOptions+='m';
		    if($('#block-balkon-calc-options-2').is(':checked'))constructionOptions+='p';
		    if($('#block-balkon-calc-options-3').is(':checked'))constructionOptions+='ov';
		    if($('#block-balkon-calc-options-4').is(':checked'))constructionOptions+='k';
		    
		    //alert(constructionOptions);
		    
		    var seqNumber = ++xhrCount;
		    $.ajax({
			  method: "POST",
			  url: "/ajax/price_api.php",
			  data: { 
				  constructionType: btype,
				  constructionHeight: $('.block-balkon-calc-vertical-slider-ui').slider("option", 'value'),
				  constructionWidth: $('.block-balkon-calc-horisontal-slider-ui').slider("option", 'value'),
				  constructionProfile: 'c640',
				  constructionOptions: constructionOptions
				  }
			})
			  .done(function( msg ) {
			      if (seqNumber === xhrCount) {
				      $('.block-balkon-calc-price-value').countTo({from: parseInt($('.block-balkon-calc-price-value').text().replace(" ","")), to: msg.replace(" ",""), refreshInterval: 30, formatter: function (value, options) { return String(Math.round(value)).replace(/(.)(?=(\d{3})+$)/g,'$1 ');  }});
					  $('.block-balkon-calc-price-value').css('opacity',1);
					  $('.block-balkon-calc-price-loading').css('opacity',0);
			      }
	
			  });
		  },300);
    }*/

});
 