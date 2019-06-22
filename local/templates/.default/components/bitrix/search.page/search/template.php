<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>


<?
$items = array();
foreach($arResult["SEARCH"] as $arItem){

	$items[] = $arItem['ITEM_ID'];
}
$GLOBALS['arrFilter'] = array('ID' => $items);
?>




<div class="search_page">
	<form action="" method="get">
	<?if($arParams["USE_SUGGEST"] === "Y"):
		if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
		{
			$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
			$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
			$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
		}
		?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:search.suggest.input",
			"",
			array(
				"NAME" => "q",
				"VALUE" => $arResult["REQUEST"]["~QUERY"],
				"INPUT_SIZE" => 40,
				"DROPDOWN_SIZE" => 10,
				"FILTER_MD5" => $arResult["FILTER_MD5"],
			),
			$component, array("HIDE_ICONS" => "Y")
		);?>
	<?else:?>
		<input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" placeholder="Поиск по сайту">
	<?endif;?>
		<input type="submit" value="Поиск">
		<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
	<?if($arParams["SHOW_WHEN"]):?>
		<script>
		var switch_search_params = function()
		{
			var sp = document.getElementById('search_params');
			var flag;
			var i;

			if(sp.style.display == 'none')
			{
				flag = false;
				sp.style.display = 'block'
			}
			else
			{
				flag = true;
				sp.style.display = 'none';
			}

			var from = document.getElementsByName('from');
			for(i = 0; i < from.length; i++)
				if(from[i].type.toLowerCase() == 'text')
					from[i].disabled = flag;

			var to = document.getElementsByName('to');
			for(i = 0; i < to.length; i++)
				if(to[i].type.toLowerCase() == 'text')
					to[i].disabled = flag;

			return false;
		}
		</script>
		<a class="search-page-params" href="#" onclick="return switch_search_params()"><?echo GetMessage('CT_BSP_ADDITIONAL_PARAMS')?></a>
		<div id="search_params" style="display:<?echo $arResult["REQUEST"]["FROM"] || $arResult["REQUEST"]["TO"]? 'block': 'none'?>">
			<?$APPLICATION->IncludeComponent(
				'bitrix:main.calendar',
				'',
				array(
					'SHOW_INPUT' => 'Y',
					'INPUT_NAME' => 'from',
					'INPUT_VALUE' => $arResult["REQUEST"]["~FROM"],
					'INPUT_NAME_FINISH' => 'to',
					'INPUT_VALUE_FINISH' =>$arResult["REQUEST"]["~TO"],
					'INPUT_ADDITIONAL_ATTR' => 'size="10"',
				),
				null,
				array('HIDE_ICONS' => 'Y')
			);?>
		</div>
	<?endif?>
	</form>

	<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
		?>
		<p><?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?></p>
		<?
	endif;?>

	<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
	<?elseif($arResult["ERROR_CODE"]!=0):?>
		<div class="search_result">
			<div class="note">Результатов не найдено.</div>
		</div>
	<?elseif(count($arResult["SEARCH"])>0):?>
		<div class="catalog full_w">
			<?
			if(!$_SESSION['CATALOG_SORT']){

				$_SESSION['CATALOG_SORT']['TYPE'] = 'catalog_PRICE_1';
				$_SESSION['CATALOG_SORT']['VAL'] = 'asc';
			}
			?>
			<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"list", 
	array(
		"COMPONENT_TEMPLATE" => "list",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => IB_PROD,
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "Y",
		"CUSTOM_FILTER" => "",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"ELEMENT_SORT_FIELD" => $_SESSION["CATALOG_SORT"]["TYPE"],
		"ELEMENT_SORT_FIELD2" => "name",
		"ELEMENT_SORT_ORDER" => $_SESSION["CATALOG_SORT"]["VAL"],
		"ELEMENT_SORT_ORDER2" => "asc",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "desc",
		"OFFERS_SORT_FIELD2" => "name",
		"OFFERS_SORT_ORDER2" => "asc",
		"PAGE_ELEMENT_COUNT" => "40",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "img1",
			2 => "",
		),
		"PROPERTY_CODE_MOBILE" => "",
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"BACKGROUND_IMAGE" => "-",
		"TEMPLATE_THEME" => "blue",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"ENLARGE_PRODUCT" => "STRICT",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"SHOW_SLIDER" => "N",
		"PRODUCT_DISPLAY_MODE" => "N",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"SHOW_FROM_SECTION" => "N",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "N",
		"SEF_RULE" => "#SECTION_CODE_PATH#",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_CODE_PATH" => $_REQUEST["SECTION_CODE_PATH"],
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "N",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "N",
		"META_DESCRIPTION" => "-",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRICE_CODE" => array(
			0 => "price",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"OFFERS_CART_PROPERTIES" => "",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"PAGER_TEMPLATE" => "modern",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "N",
		"LOAD_ON_SCROLL" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N"
	),
	false
);?>
		</div>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"];?>
	<?else:?>
		<div class="search_result">
			<div class="note">Результатов не найдено.</div>
		</div>
	<?endif;?>
</div>