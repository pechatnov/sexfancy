<?
$_SERVER["DOCUMENT_ROOT"] = '/var/www/u0593169/data/www/sexfancy.ru';

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");

date_default_timezone_set('Europe/Moscow');
$time = new DateTime();
$day = $time->format('w');


$beginTime1 = '01:50';
$endTime1 = '02:10';
$beginTime2 = '03:50';
$endTime2 = '04:10';
$curTime = date("H:i");



//if (($day == 1 || $day == 4) && (strtotime($curTime) >= strtotime($beginTime) && strtotime($curTime) <= strtotime($endTime))) {
if (strtotime($curTime) >= strtotime($beginTime1) && strtotime($curTime) <= strtotime($endTime1)) {

    //bitrix_colors.csv
    CCatalogImport::PreGenerateImport(4);

    //items.csv
    require($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/csv/items.php");

}
elseif (strtotime($curTime) >= strtotime($beginTime2) && strtotime($curTime) <= strtotime($endTime2)) {

    //sku.csv
    require($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/csv/sku.php");
}
else {

    //count.csv
    require($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/csv/count.php");
}


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");