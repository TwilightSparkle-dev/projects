$(document).ready(function () {

    $('.admin-language-content').click(function () {
        var lang = $(this).attr('data-lang');


        $.post('/admin/task/home/content/get',
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
                    $('#content_9').val($data.content_9);

                    $('#content_10').val($data.content_10);
                    $('#content_11').val($data.content_11);
                    $('#content_12').val($data.content_12);
                    $('#content_13').val($data.content_13);
                    $('#content_14').val($data.content_14);
                    $('#content_15').val($data.content_15);
                    $('#content_16').val($data.content_16);
                    $('#content_17').val($data.content_17);
                    $('#content_18').val($data.content_18);
                    $('#content_19').val($data.content_19);
                    $('#content_20').val($data.content_20);
                    $('#content_21').val($data.content_21);
                    $('#content_22').val($data.content_22);
                    $('#content_23').val($data.content_23);
                    $('#content_24').val($data.content_24);
                    $('#content_25').val($data.content_25);
                    $('#content_26').val($data.content_26);
                    $('#content_27').val($data.content_27);
                    $('#content_28').val($data.content_28);
                    $('#content_29').val($data.content_29);
                    $('#content_30').val($data.content_30);
                    $('#content_31').val($data.content_31);
                    $('#content_32').val($data.content_32);
                    $('#content_33').val($data.content_33);
                    $('#content_34').val($data.content_34);
                    $('#content_35').val($data.content_35);
                    $('#content_36').val($data.content_36);
                    $('#content_37').val($data.content_37);
                    $('#content_38').val($data.content_38);
                    $('#content_39').val($data.content_39);
                    $('#content_40').val($data.content_40);
                    $('#content_41').val($data.content_41);
                    $('#content_42').val($data.content_42);
                    $('#content_43').val($data.content_43);
                    $('#content_44').val($data.content_44);
                    $('#content_45').val($data.content_45);
                    $('#content_46').val($data.content_46);
                    $('#content_47').val($data.content_47);
                    $('#content_48').val($data.content_48);
                    $('#content_49').val($data.content_49);
                    $('#content_50').val($data.content_50);
                    $('#content_51').val($data.content_51);
                    $('#content_52').val($data.content_52);
                    $('#content_53').val($data.content_53);
                    $('#content_54').val($data.content_54);
                    $('#content_55').val($data.content_55);
                    $('#content_56').val($data.content_56);
                    $('#content_57').val($data.content_57);
                    $('#content_58').val($data.content_58);
                    $('#content_59').val($data.content_59);
                    $('#content_60').val($data.content_60);
                    $('#content_61').val($data.content_61);
                    $('#content_62').val($data.content_62);
                    $('#content_63').val($data.content_63);
                    $('#content_64').val($data.content_64);
                    $('#content_65').val($data.content_65);
                    $('#content_66').val($data.content_66);
                    $('#content_67').val($data.content_67);
                    $('#content_68').val($data.content_68);
                    $('#content_69').val($data.content_69);
                    $('#content_70').val($data.content_70);
                    $('#content_71').val($data.content_71);
                    $('#content_72').val($data.content_72);
                    $('#content_73').val($data.content_73);
                    $('#content_74').val($data.content_74);
                    $('#content_75').val($data.content_75);
                    $('#content_76').val($data.content_76);
                    $('#content_77').val($data.content_77);
                    $('#content_78').val($data.content_78);
                    $('#content_79').val($data.content_79);
                    $('#content_80').val($data.content_80);
                    $('#content_81').val($data.content_81);
                    $('#content_82').val($data.content_82);
                    $('#content_83').val($data.content_83);
                    $('#content_84').val($data.content_84);
                    $('#content_85').val($data.content_85);
                    $('#content_86').val($data.content_86);
                    $('#content_87').val($data.content_87);
                    $('#content_88').val($data.content_88);
                    $('#content_89').val($data.content_89);
                    $('#content_90').val($data.content_90);
                    $('#content_91').val($data.content_91);
                    $('#content_92').val($data.content_92);
                    $('#content_93').val($data.content_93);
                    $('#content_94').val($data.content_94);
                    $('#content_95').val($data.content_95);
                    $('#content_96').val($data.content_96);
                    $('#content_97').val($data.content_97);
                    $('#content_98').val($data.content_98);
                    $('#content_99').val($data.content_99);
                    $('#content_100').val($data.content_100);
                    $('#content_101').val($data.content_101);
                    $('#content_102').val($data.content_102);


                } else {

                }
            });
        return false;


    });


    $('#home_content_save').click(function () {

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
            content_9 = $('#content_9').val(),
            content_10 = $('#content_10').val(),
            content_11 = $('#content_11').val(),
            content_12 = $('#content_12').val(),
            content_13 = $('#content_13').val(),
            content_14 = $('#content_14').val(),
            content_15 = $('#content_15').val(),
            content_16 = $('#content_16').val(),
            content_17 = $('#content_17').val(),
            content_18 = $('#content_18').val(),
            content_19 = $('#content_19').val(),
            content_20 = $('#content_20').val(),
            content_21 = $('#content_21').val(),
            content_22 = $('#content_22').val(),
            content_23 = $('#content_23').val(),
            content_24 = $('#content_24').val(),
            content_25 = $('#content_25').val(),
            content_26 = $('#content_26').val(),
            content_27 = $('#content_27').val(),
            content_28 = $('#content_28').val(),
            content_29 = $('#content_29').val(),
            content_30 = $('#content_30').val(),
            content_31 = $('#content_31').val(),
            content_32 = $('#content_32').val(),
            content_33 = $('#content_33').val(),
            content_34 = $('#content_34').val(),
            content_35 = $('#content_35').val(),
            content_36 = $('#content_36').val(),
            content_37 = $('#content_37').val(),
            content_38 = $('#content_38').val(),
            content_39 = $('#content_39').val(),
            content_40 = $('#content_40').val(),
            content_41 = $('#content_41').val(),
            content_42 = $('#content_42').val(),
            content_43 = $('#content_43').val(),
            content_44 = $('#content_44').val(),
            content_45 = $('#content_45').val(),
            content_46 = $('#content_46').val(),
            content_47 = $('#content_47').val(),
            content_48 = $('#content_48').val(),
            content_49 = $('#content_49').val(),
            content_50 = $('#content_50').val(),
            content_51 = $('#content_51').val(),
            content_52 = $('#content_52').val(),
            content_53 = $('#content_53').val(),
            content_54 = $('#content_54').val(),
            content_55 = $('#content_55').val(),
            content_56 = $('#content_56').val(),
            content_57 = $('#content_57').val(),
            content_58 = $('#content_58').val(),
            content_59 = $('#content_59').val(),
            content_60 = $('#content_60').val(),
            content_61 = $('#content_61').val(),
            content_62 = $('#content_62').val(),
            content_63 = $('#content_63').val(),
            content_64 = $('#content_64').val(),
            content_65 = $('#content_65').val(),
            content_66 = $('#content_66').val(),
            content_67 = $('#content_67').val(),
            content_68 = $('#content_68').val(),
            content_69 = $('#content_69').val(),
            content_70 = $('#content_70').val(),
            content_71 = $('#content_71').val(),
            content_72 = $('#content_72').val(),
            content_73 = $('#content_73').val(),
            content_74 = $('#content_74').val(),
            content_75 = $('#content_75').val(),
            content_76 = $('#content_76').val(),
            content_77 = $('#content_77').val(),
            content_78 = $('#content_78').val(),
            content_79 = $('#content_79').val(),
            content_80 = $('#content_80').val(),
            content_81 = $('#content_81').val(),
            content_82 = $('#content_82').val(),
            content_83 = $('#content_83').val(),
            content_84 = $('#content_84').val(),
            content_85 = $('#content_85').val(),
            content_86 = $('#content_86').val(),
            content_87 = $('#content_87').val(),
            content_88 = $('#content_88').val(),
            content_89 = $('#content_89').val(),
            content_90 = $('#content_90').val(),
            content_91 = $('#content_91').val(),
            content_92 = $('#content_92').val(),
            content_93 = $('#content_93').val(),
            content_94 = $('#content_94').val(),
            content_95 = $('#content_95').val(),
            content_96 = $('#content_96').val(),
            content_97 = $('#content_97').val(),
            content_98 = $('#content_98').val(),
            content_99 = $('#content_99').val(),
            content_100 = $('#content_100').val(),
            content_101 = $('#content_101').val(),
            content_102 = $('#content_102').val();


        $.post('/admin/task/home/multilangcontent',
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
                content_9: content_9,

                content_10: content_10,
                content_11: content_11,
                content_12: content_12,
                content_13: content_13,
                content_14: content_14,
                content_15: content_15,
                content_16: content_16,
                content_17: content_17,
                content_18: content_18,
                content_19: content_19,
                content_20: content_20,
                content_21: content_21,
                content_22: content_22,
                content_23: content_23,
                content_24: content_24,
                content_25: content_25,
                content_26: content_26,
                content_27: content_27,
                content_28: content_28,
                content_29: content_29,
                content_30: content_30,
                content_31: content_31,
                content_32: content_32,
                content_33: content_33,
                content_34: content_34,
                content_35: content_35,
                content_36: content_36,
                content_37: content_37,
                content_38: content_38,
                content_39: content_39,
                content_40: content_40,
                content_41: content_41,
                content_42: content_42,
                content_43: content_43,
                content_44: content_44,
                content_45: content_45,
                content_46: content_46,
                content_47: content_47,
                content_48: content_48,
                content_49: content_49,
                content_50: content_50,
                content_51: content_51,
                content_52: content_52,
                content_53: content_53,
                content_54: content_54,
                content_55: content_55,
                content_56: content_56,
                content_57: content_57,
                content_58: content_58,
                content_59: content_59,
                content_60: content_60,
                content_61: content_61,
                content_62: content_62,
                content_63: content_63,
                content_64: content_64,
                content_65: content_65,
                content_66: content_66,
                content_67: content_67,
                content_68: content_68,
                content_69: content_69,
                content_70: content_70,
                content_71: content_71,
                content_72: content_72,
                content_73: content_73,
                content_74: content_74,
                content_75: content_75,
                content_76: content_76,
                content_77: content_77,
                content_78: content_78,
                content_79: content_79,
                content_80: content_80,
                content_81: content_81,
                content_82: content_82,
                content_83: content_83,
                content_84: content_84,
                content_85: content_85,
                content_86: content_86,
                content_87: content_87,
                content_88: content_88,
                content_89: content_89,
                content_90: content_90,
                content_91: content_91,
                content_92: content_92,
                content_93: content_93,
                content_94: content_94,
                content_95: content_95,
                content_96: content_96,
                content_97: content_97,
                content_98: content_98,
                content_99: content_99,
                content_100: content_100,
                content_101: content_101,
                content_102: content_102

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

