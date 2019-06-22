<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"sidebar_lk", 
	array(
		"COMPONENT_TEMPLATE" => "sidebar_lk",
		"ROOT_MENU_TYPE" => "lk",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>