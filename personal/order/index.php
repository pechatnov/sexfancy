<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->AddChainItem("Личный кабинет", '/personal/');
$APPLICATION->AddChainItem("Мои заказы", '/personal/order/');
$APPLICATION->SetTitle("Мои заказы");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order", 
	".default", 
	array(
		"SEF_MODE" => "N",
		"SEF_FOLDER" => "/personal/order/",
		"ORDERS_PER_PAGE" => "10",
		"PATH_TO_PAYMENT" => "/personal/order/payment/",
		"PATH_TO_BASKET" => "/personal/cart/",
		"SET_TITLE" => "N",
		"SAVE_IN_SESSION" => "N",
		"NAV_TEMPLATE" => "modern",
		"SHOW_ACCOUNT_NUMBER" => "Y",
		"ALLOW_INNER" => "N",
		"ONLY_INNER_FULL" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_HIDE_USER_INFO" => array(
			0 => "EMAIL",
			1 => "PERSON_TYPE_NAME",
		),
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"PATH_TO_CATALOG" => "/catalog/",
		"CUSTOM_SELECT_PROPS" => array(
		),
		"HISTORIC_STATUSES" => array(
			0 => "F",
		),
		"RESTRICT_CHANGE_PAYSYSTEM" => array(
			0 => "0",
		),
		"REFRESH_PRICES" => "N",
		"ORDER_DEFAULT_SORT" => "STATUS",
		"STATUS_COLOR_N" => "green",
		"STATUS_COLOR_F" => "gray",
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>