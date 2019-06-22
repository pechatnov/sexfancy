<header>
    <div class="hat">
        <div class="inner">
            <div class="logo">
                <a href="/"></a>
            </div>
            <? $APPLICATION->IncludeComponent("bitrix:search.form", "search", Array(), false); ?>
            <div class="menu_320">
                <a id="btn_320" class="btn_320" href="#"><span></span><span></span><span></span></a>
                <div id="close_area_320" class="close_area_320"></div>

                <div class="block">
                    <div id="ic_close" class="ic_close"></div>
                    <? if ($USER->IsAuthorized()) { ?>
                        <div class="lk active">
                            <a class="main" href="/personal/"></a>
                        </div>
                    <? } else { ?>
                        <div class="lk">
                            <a class="main" href="/auth/"></a>
                        </div>
                    <? } ?>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:sale.basket.basket",
                        "basket_header",
                        array(
                            "COMPONENT_TEMPLATE" => "basket_header",
                            "COLUMNS_LIST" => array(
                                0 => "NAME",
                                1 => "PROPS",
                                2 => "DELETE",
                                3 => "PRICE",
                                4 => "QUANTITY",
                                5 => "SUM",
                                6 => "PROPERTY_brend",
                            ),
                            "TEMPLATE_THEME" => "",
                            "PATH_TO_ORDER" => "/personal/order.php",
                            "HIDE_COUPON" => "Y",
                            "PRICE_VAT_SHOW_VALUE" => "N",
                            "USE_PREPAYMENT" => "N",
                            "QUANTITY_FLOAT" => "N",
                            "CORRECT_RATIO" => "N",
                            "AUTO_CALCULATION" => "Y",
                            "SET_TITLE" => "N",
                            "ACTION_VARIABLE" => "basketAction",
                            "OFFERS_PROPS" => array(),
                            "USE_GIFTS" => "N",
                            "USE_ENHANCED_ECOMMERCE" => "N",
                            "AJAX_MODE" => "Y",
                            "COLUMNS_LIST_EXT" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "DISCOUNT",
                                2 => "DELETE",
                                3 => "DELAY",
                                4 => "TYPE",
                                5 => "SUM",
                            ),
                            "COMPATIBLE_MODE" => "Y",
                            "ADDITIONAL_PICT_PROP_1" => "-",
                            "ADDITIONAL_PICT_PROP_2" => "-",
                            "BASKET_IMAGES_SCALING" => "adaptive"
                        ),
                        false
                    ); ?>
                    <?$APPLICATION->ShowViewContent('menu_320');?>
                </div>
            </div>
        </div>
    </div>
    <? $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"header_menu", 
	array(
		"COMPONENT_TEMPLATE" => "header_menu",
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
); ?>
</header>