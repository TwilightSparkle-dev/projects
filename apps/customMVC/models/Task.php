<?php

/**
 * Класс Task - модель для работы с задачами
 */
class Task
{

    public static function updateHeadContent($content)
    {
        Db::getConnection();

        $result = R::findOrCreate('headercontent', [
            'lang' => $content['lang']
        ]);


        $result->content_1 = $content['content_1'];
        $result->content_2 = $content['content_2'];
        $result->content_3 = $content['content_3'];
        $result->content_4 = $content['content_4'];
        $result->content_5 = $content['content_5'];
        $result->content_6 = $content['content_6'];
        $result->content_7 = $content['content_7'];
        $result->content_8 = $content['content_8'];


        $result->popup_1 = $content['popup_1'];
        $result->popup_2 = $content['popup_2'];
        $result->popup_3 = $content['popup_3'];
        $result->popup_4 = $content['popup_4'];
        $result->popup_5 = $content['popup_5'];
        $result->popup_6 = $content['popup_6'];
        $result->popup_7 = $content['popup_7'];
        $result->popup_8 = $content['popup_8'];
        $result->popup_9 = $content['popup_9'];
        $result->popup_10 = $content['popup_10'];
        $result->popup_11 = $content['popup_11'];
        $result->popup_12 = $content['popup_12'];
        $result->popup_13 = $content['popup_13'];
        $result->popup_14 = $content['popup_14'];
        $result->popup_15 = $content['popup_15'];
        $result->popup_16 = $content['popup_16'];
        $result->popup_17 = $content['popup_17'];
        $result->popup_18 = $content['popup_18'];
        $result->popup_19 = $content['popup_19'];
        $result->popup_20 = $content['popup_20'];
        $result->popup_21 = $content['popup_21'];
        $result->popup_22 = $content['popup_22'];

        R::store($result);

        return true;
    }

    public static function getHeaderContentInfo($param)
    {
        Db::getConnection();

        $result = R::findLike('headercontent', [
            'lang' => [$param['lang']]
        ]);

        $out = array();
        foreach ($result as $row) {

            $out['content_1'] = $row['content_1'];
            $out['content_2'] = $row['content_2'];
            $out['content_3'] = $row['content_3'];
            $out['content_4'] = $row['content_4'];
            $out['content_5'] = $row['content_5'];
            $out['content_6'] = $row['content_6'];
            $out['content_7'] = $row['content_7'];
            $out['content_8'] = $row['content_8'];


            $out['popup_1'] = $row['popup_1'];
            $out['popup_2'] = $row['popup_2'];
            $out['popup_3'] = $row['popup_3'];
            $out['popup_4'] = $row['popup_4'];
            $out['popup_5'] = $row['popup_5'];
            $out['popup_6'] = $row['popup_6'];
            $out['popup_7'] = $row['popup_7'];
            $out['popup_8'] = $row['popup_8'];
            $out['popup_9'] = $row['popup_9'];
            $out['popup_10'] = $row['popup_10'];
            $out['popup_11'] = $row['popup_11'];
            $out['popup_12'] = $row['popup_12'];
            $out['popup_13'] = $row['popup_13'];
            $out['popup_14'] = $row['popup_14'];
            $out['popup_15'] = $row['popup_15'];
            $out['popup_16'] = $row['popup_16'];
            $out['popup_17'] = $row['popup_17'];
            $out['popup_18'] = $row['popup_18'];
            $out['popup_19'] = $row['popup_19'];
            $out['popup_20'] = $row['popup_20'];
            $out['popup_21'] = $row['popup_21'];
            $out['popup_22'] = $row['popup_22'];

        }

        return $out;
    }


    /**
     *
     *
     *
     * HOME
     *
     *
     *
     **/
    public static function updateHomeContent($content)
    {
        Db::getConnection();

        $result = R::findOrCreate('homecontent', [
            'lang' => $content['lang']
        ]);


        $result->content_1 = $content['content_1'];
        $result->content_2 = $content['content_2'];
        $result->content_3 = $content['content_3'];
        $result->content_4 = $content['content_4'];
        $result->content_5 = $content['content_5'];
        $result->content_6 = $content['content_6'];
        $result->content_7 = $content['content_7'];
        $result->content_8 = $content['content_8'];
        $result->content_9 = $content['content_9'];

        $result->content_10 = $content['content_10'];
        $result->content_11 = $content['content_11'];
        $result->content_12 = $content['content_12'];
        $result->content_13 = $content['content_13'];
        $result->content_14 = $content['content_14'];
        $result->content_15 = $content['content_15'];
        $result->content_16 = $content['content_16'];
        $result->content_17 = $content['content_17'];
        $result->content_18 = $content['content_18'];
        $result->content_19 = $content['content_19'];
        $result->content_20 = $content['content_20'];
        $result->content_21 = $content['content_21'];
        $result->content_22 = $content['content_22'];
        $result->content_23 = $content['content_23'];
        $result->content_24 = $content['content_24'];
        $result->content_25 = $content['content_25'];
        $result->content_26 = $content['content_26'];
        $result->content_27 = $content['content_27'];
        $result->content_28 = $content['content_28'];
        $result->content_29 = $content['content_29'];
        $result->content_30 = $content['content_30'];
        $result->content_31 = $content['content_31'];
        $result->content_32 = $content['content_32'];
        $result->content_33 = $content['content_33'];
        $result->content_34 = $content['content_34'];
        $result->content_35 = $content['content_35'];
        $result->content_36 = $content['content_36'];
        $result->content_37 = $content['content_37'];
        $result->content_38 = $content['content_38'];
        $result->content_39 = $content['content_39'];
        $result->content_40 = $content['content_40'];
        $result->content_41 = $content['content_41'];
        $result->content_42 = $content['content_42'];
        $result->content_43 = $content['content_43'];
        $result->content_44 = $content['content_44'];
        $result->content_45 = $content['content_45'];
        $result->content_46 = $content['content_46'];
        $result->content_47 = $content['content_47'];
        $result->content_48 = $content['content_48'];
        $result->content_49 = $content['content_49'];
        $result->content_50 = $content['content_50'];
        $result->content_51 = $content['content_51'];
        $result->content_52 = $content['content_52'];
        $result->content_53 = $content['content_53'];
        $result->content_54 = $content['content_54'];
        $result->content_55 = $content['content_55'];
        $result->content_56 = $content['content_56'];
        $result->content_57 = $content['content_57'];
        $result->content_58 = $content['content_58'];
        $result->content_59 = $content['content_59'];
        $result->content_60 = $content['content_60'];
        $result->content_61 = $content['content_61'];
        $result->content_62 = $content['content_62'];
        $result->content_63 = $content['content_63'];
        $result->content_64 = $content['content_64'];
        $result->content_65 = $content['content_65'];
        $result->content_66 = $content['content_66'];
        $result->content_67 = $content['content_67'];
        $result->content_68 = $content['content_68'];
        $result->content_69 = $content['content_69'];
        $result->content_70 = $content['content_70'];
        $result->content_71 = $content['content_71'];
        $result->content_72 = $content['content_72'];
        $result->content_73 = $content['content_73'];
        $result->content_74 = $content['content_74'];
        $result->content_75 = $content['content_75'];
        $result->content_76 = $content['content_76'];
        $result->content_77 = $content['content_77'];
        $result->content_78 = $content['content_78'];
        $result->content_79 = $content['content_79'];
        $result->content_80 = $content['content_80'];
        $result->content_81 = $content['content_81'];
        $result->content_82 = $content['content_82'];
        $result->content_83 = $content['content_83'];
        $result->content_84 = $content['content_84'];
        $result->content_85 = $content['content_85'];
        $result->content_86 = $content['content_86'];
        $result->content_87 = $content['content_87'];
        $result->content_88 = $content['content_88'];
        $result->content_89 = $content['content_89'];
        $result->content_90 = $content['content_90'];
        $result->content_91 = $content['content_91'];
        $result->content_92 = $content['content_92'];
        $result->content_93 = $content['content_93'];
        $result->content_94 = $content['content_94'];
        $result->content_95 = $content['content_95'];
        $result->content_96 = $content['content_96'];
        $result->content_97 = $content['content_97'];
        $result->content_98 = $content['content_98'];
        $result->content_99 = $content['content_99'];

        $result->content_100 = $content['content_100'];
        $result->content_101 = $content['content_101'];
        $result->content_102 = $content['content_102'];


        R::store($result);

        return true;
    }

    public static function getHomeContentInfo($param)
    {
        Db::getConnection();

        $result = R::findLike('homecontent', [
            'lang' => [$param['lang']]
        ]);

        $out = array();
        foreach ($result as $row) {

            $out['content_1'] = $row['content_1'];
            $out['content_2'] = $row['content_2'];
            $out['content_3'] = $row['content_3'];
            $out['content_4'] = $row['content_4'];
            $out['content_5'] = $row['content_5'];
            $out['content_6'] = $row['content_6'];
            $out['content_7'] = $row['content_7'];
            $out['content_8'] = $row['content_8'];
            $out['content_9'] = $row['content_9'];

            $out['content_10'] = $row['content_10'];
            $out['content_11'] = $row['content_11'];
            $out['content_12'] = $row['content_12'];
            $out['content_13'] = $row['content_13'];
            $out['content_14'] = $row['content_14'];
            $out['content_15'] = $row['content_15'];
            $out['content_16'] = $row['content_16'];
            $out['content_17'] = $row['content_17'];
            $out['content_18'] = $row['content_18'];
            $out['content_19'] = $row['content_19'];
            $out['content_20'] = $row['content_20'];
            $out['content_21'] = $row['content_21'];
            $out['content_22'] = $row['content_22'];
            $out['content_23'] = $row['content_23'];
            $out['content_24'] = $row['content_24'];
            $out['content_25'] = $row['content_25'];
            $out['content_26'] = $row['content_26'];
            $out['content_27'] = $row['content_27'];
            $out['content_28'] = $row['content_28'];
            $out['content_29'] = $row['content_29'];
            $out['content_30'] = $row['content_30'];
            $out['content_31'] = $row['content_31'];
            $out['content_32'] = $row['content_32'];
            $out['content_33'] = $row['content_33'];
            $out['content_34'] = $row['content_34'];
            $out['content_35'] = $row['content_35'];
            $out['content_36'] = $row['content_36'];
            $out['content_37'] = $row['content_37'];
            $out['content_38'] = $row['content_38'];
            $out['content_39'] = $row['content_39'];
            $out['content_40'] = $row['content_40'];
            $out['content_41'] = $row['content_41'];
            $out['content_42'] = $row['content_42'];
            $out['content_43'] = $row['content_43'];
            $out['content_44'] = $row['content_44'];
            $out['content_45'] = $row['content_45'];
            $out['content_46'] = $row['content_46'];
            $out['content_47'] = $row['content_47'];
            $out['content_48'] = $row['content_48'];
            $out['content_49'] = $row['content_49'];
            $out['content_50'] = $row['content_50'];
            $out['content_51'] = $row['content_51'];
            $out['content_52'] = $row['content_52'];
            $out['content_53'] = $row['content_53'];
            $out['content_54'] = $row['content_54'];
            $out['content_55'] = $row['content_55'];
            $out['content_56'] = $row['content_56'];
            $out['content_57'] = $row['content_57'];
            $out['content_58'] = $row['content_58'];
            $out['content_59'] = $row['content_59'];
            $out['content_60'] = $row['content_60'];
            $out['content_61'] = $row['content_61'];
            $out['content_62'] = $row['content_62'];
            $out['content_63'] = $row['content_63'];
            $out['content_64'] = $row['content_64'];
            $out['content_65'] = $row['content_65'];
            $out['content_66'] = $row['content_66'];
            $out['content_67'] = $row['content_67'];
            $out['content_68'] = $row['content_68'];
            $out['content_69'] = $row['content_69'];
            $out['content_70'] = $row['content_70'];
            $out['content_71'] = $row['content_71'];
            $out['content_72'] = $row['content_72'];
            $out['content_73'] = $row['content_73'];
            $out['content_74'] = $row['content_74'];
            $out['content_75'] = $row['content_75'];
            $out['content_76'] = $row['content_76'];
            $out['content_77'] = $row['content_77'];
            $out['content_78'] = $row['content_78'];
            $out['content_79'] = $row['content_79'];
            $out['content_80'] = $row['content_80'];
            $out['content_81'] = $row['content_81'];
            $out['content_82'] = $row['content_82'];
            $out['content_83'] = $row['content_83'];
            $out['content_84'] = $row['content_84'];
            $out['content_85'] = $row['content_85'];
            $out['content_86'] = $row['content_86'];
            $out['content_87'] = $row['content_87'];
            $out['content_88'] = $row['content_88'];
            $out['content_89'] = $row['content_89'];
            $out['content_90'] = $row['content_90'];
            $out['content_91'] = $row['content_91'];
            $out['content_92'] = $row['content_92'];
            $out['content_93'] = $row['content_93'];
            $out['content_94'] = $row['content_94'];
            $out['content_95'] = $row['content_95'];
            $out['content_96'] = $row['content_96'];
            $out['content_97'] = $row['content_97'];
            $out['content_98'] = $row['content_98'];
            $out['content_99'] = $row['content_99'];

            $out['content_100'] = $row['content_100'];
            $out['content_101'] = $row['content_101'];
            $out['content_102'] = $row['content_102'];


        }

        return $out;
    }


    public static function getPageListAdmin()
    {
        Db::getConnection();

        $result = R::findAll('page');

        return $result;
    }

    public static function createPage($options)
    {
        Db::getConnection();

        $result = R::dispense('page');

        $result->ruName = $options['ru_name'];
        $result->enName = $options['en_name'];
        $result->ukName = $options['uk_name'];
        $result->link = $options['link'];
        $result->status = $options['status'];

        R::store($result);

        return $result;
    }
}