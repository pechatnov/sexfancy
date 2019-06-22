<?
//$_SERVER["DOCUMENT_ROOT"] = '/var/www/u0593169/data/www/sexfancy.ru';

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");


require($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/csv/importCsv.php");

$import = new ImportCsv;
$file = $_SERVER["DOCUMENT_ROOT"]."/upload/sku.csv";
echo $import->csvSku($file);


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");