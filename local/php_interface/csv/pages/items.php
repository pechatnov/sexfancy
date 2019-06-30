<?
//$_SERVER["DOCUMENT_ROOT"] = '/var/www/u0593169/data/www/sexfancy.ru';
///local/php_interface/csv/pages/items.php
$_SERVER["DOCUMENT_ROOT"] = '/home/s/sexfancy/public_html';
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");

require($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/csv/importCsv.php");

$import = new ImportCsv;
$file = $_SERVER["DOCUMENT_ROOT"]."/upload/items.csv";
echo $import->csvItems($file);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");