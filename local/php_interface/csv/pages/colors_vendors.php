<?
//$_SERVER["DOCUMENT_ROOT"] = '/var/www/u0593169/data/www/sexfancy.ru';

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");


CCatalogImport::PreGenerateImport(4);
CCatalogImport::PreGenerateImport(14);


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");