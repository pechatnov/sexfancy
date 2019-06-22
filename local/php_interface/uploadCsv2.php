<?
$_SERVER["DOCUMENT_ROOT"] = '/var/www/u0593169/data/www/sexfancy.ru';
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


//$file_name['items'] = 'http://feed.p5s.ru/data/5c99d55d6b4162.02698244';
$file_name['sku'] = 'http://feed.p5s.ru/data/5c99d55d6b4162.02698244?stock';
//$file_name['price'] = 'http://feed.p5s.ru/data/5c99d55d6b4162.02698244?stockPrice';
//$file_name['bitrix_colors'] = 'http://feed.p5s.ru/data/5c99d55d6b4162.02698244?colors';


foreach($file_name as $name => $path){

    file_put_contents($_SERVER["DOCUMENT_ROOT"].'/upload/'.$name.'.csv', file_get_contents($path));
    echo 'File '.$name.' upload.<br>';
}