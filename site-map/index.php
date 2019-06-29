<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Карта сайта интернет-сексшопа Sexfancy");
$APPLICATION->SetPageProperty("title", "Карта сайта интернет-магазина Sexfancy");
$APPLICATION->SetTitle("Карта сайта");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"site-map", 
	array(
		"COMPONENT_TEMPLATE" => "site-map",
		"ROOT_MENU_TYPE" => "footer",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>