<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Есть ли что-то более желаемое, чем купить высококлассную секс-игрушку по более нижкой цене? На этой странице представлены игрушки для взрослых по сниженной цене. Торопитесь, время действия акции ограничено!");
$APPLICATION->SetPageProperty("keywords", "секс-товары со скидкой, акция, распродажа");
$APPLICATION->SetPageProperty("title", "Скидки на интимные игрушки высокого качества в сексшопе Sexfancy");
$APPLICATION->SetTitle("Скидки");
?>

<?
use Bitrix\Main\Loader;
use Bitrix\Main\SystemException;
class AllProductDiscount{
    /**
     * @return XML_ID|array
     * @throws SystemException
     * @throws \Bitrix\Main\LoaderException
     */
    public static function getFull($arrFilter = array(), $arSelect = array()){
        if(!Loader::includeModule('sale')) throw new SystemException('Не подключен модуль Sale');

        $items = [];

        //Все товары со скидкой!!!
        // Группы пользователей
        global $USER;
        $arUserGroups = $USER->GetUserGroupArray();
        if (!is_array($arUserGroups)) $arUserGroups = array($arUserGroups);
        // Достаем старым методом только ID скидок привязанных к группам пользователей по ограничениям
        $actionsNotTemp = \CSaleDiscount::GetList(array("ID" => "ASC"),array("USER_GROUPS" => $arUserGroups),false,false,array("ID"));
        while($actionNot = $actionsNotTemp->fetch()){
            $actionIds[] = $actionNot['ID'];
        }
        $actionIds=array_unique($actionIds); sort($actionIds);

        //Удаление скидок для доставок
        foreach($actionIds as $k => $sale){
            if($sale == 28 || $sale == 26 || $sale == 24){
                unset($actionIds[$k]);
            }
        }

        // Подготавливаем необходимые переменные для разборчивости кода
        global $DB;
        $conditionLogic = array('Equal'=>'=','Not'=>'!','Great'=>'>','Less'=>'<','EqGr'=>'>=','EqLs'=>'<=');
        $arSelect = array_merge(array("ID","IBLOCK_ID","XML_ID"),$arSelect);
        $city='MSK';
        // Теперь достаем новым методом скидки с условиями. P.S. Старым методом этого делать не нужно из-за очень высокой нагрузки (уже тестировал)
        $actions = \Bitrix\Sale\Internals\DiscountTable::getList(array(
            'select' => array("ID","ACTIONS_LIST"),
            'filter' => array("ACTIVE"=>"Y","USE_COUPONS"=>"N","DISCOUNT_TYPE"=>"P","LID"=>SITE_ID,
                "ID"=>$actionIds,
                array(
                    "LOGIC" => "OR",
                    array(
                        "<=ACTIVE_FROM"=>$DB->FormatDate(date("Y-m-d H:i:s"),"YYYY-MM-DD HH:MI:SS",\CSite::GetDateFormat("FULL")),
                        ">=ACTIVE_TO"=>$DB->FormatDate(date("Y-m-d H:i:s"),"YYYY-MM-DD HH:MI:SS",\CSite::GetDateFormat("FULL"))
                    ),
                    array(
                        "=ACTIVE_FROM"=>false,
                        ">=ACTIVE_TO"=>$DB->FormatDate(date("Y-m-d H:i:s"),"YYYY-MM-DD HH:MI:SS",\CSite::GetDateFormat("FULL"))
                    ),
                    array(
                        "<=ACTIVE_FROM"=>$DB->FormatDate(date("Y-m-d H:i:s"),"YYYY-MM-DD HH:MI:SS",\CSite::GetDateFormat("FULL")),
                        "=ACTIVE_TO"=>false
                    ),
                    array(
                        "=ACTIVE_FROM"=>false,
                        "=ACTIVE_TO"=>false
                    ),
                ))
        ));
        // Перебираем каждую скидку и подготавливаем условия фильтрации для CIBlockElement::GetList
        while($arrAction = $actions->fetch()){
            $arrActions[$arrAction['ID']] = $arrAction;
        }
        foreach($arrActions as $actionId => $action){
            $arPredFilter = array_merge(array("ACTIVE_DATE"=>"Y", "CAN_BUY"=>"Y", 'INCLUDE_SUBSECTIONS' => 'Y'),$arrFilter); //Набор предустановленных параметров
            $arFilter = $arPredFilter; //Основной фильтр
            $dopArFilter = $arPredFilter; //Фильтр для доп. запроса
            $dopArFilter["=XML_ID"] = array(); //Пустое значения для первой отработки array_merge
            //Магия генерации фильтра
            foreach($action['ACTIONS_LIST']['CHILDREN'] as $condition){
                foreach($condition['CHILDREN'] as $keyConditionSub=>$conditionSub){
                    $cs=$conditionSub['DATA']['value']; //Значение условия
                    $cls=$conditionLogic[$conditionSub['DATA']['logic']]; //Оператор условия
                    //$arFilter["LOGIC"]=$conditionSub['DATA']['All']?:'AND';
                    $CLASS_ID = explode(':',$conditionSub['CLASS_ID']);

                    if($CLASS_ID[0]=='ActSaleSubGrp') {
                        foreach($conditionSub['CHILDREN'] as $keyConditionSubElem=>$conditionSubElem){
                            $cse=$conditionSubElem['DATA']['value']; //Значение условия
                            $clse=$conditionLogic[$conditionSubElem['DATA']['logic']]; //Оператор условия
                            //$arFilter["LOGIC"]=$conditionSubElem['DATA']['All']?:'AND';
                            $CLASS_ID_EL = explode(':',$conditionSubElem['CLASS_ID']);

                            if($CLASS_ID_EL[0]=='CondIBProp') {
                                $arFilter["IBLOCK_ID"]=$CLASS_ID_EL[1];
                                $arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]]=array_merge((array)$arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]],(array)$cse);
                                $arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]]=array_unique($arFilter[$clse."PROPERTY_".$CLASS_ID_EL[2]]);
                            }elseif($CLASS_ID_EL[0]=='CondIBName') {
                                $arFilter[$clse."NAME"]=array_merge((array)$arFilter[$clse."NAME"],(array)$cse);
                                $arFilter[$clse."NAME"]=array_unique($arFilter[$clse."NAME"]);
                            }elseif($CLASS_ID_EL[0]=='CondIBElement') {
                                $arFilter[$clse."ID"]=array_merge((array)$arFilter[$clse."ID"],(array)$cse);
                                $arFilter[$clse."ID"]=array_unique($arFilter[$clse."ID"]);
                            }elseif($CLASS_ID_EL[0]=='CondIBTags') {
                                $arFilter[$clse."TAGS"]=array_merge((array)$arFilter[$clse."TAGS"],(array)$cse);
                                $arFilter[$clse."TAGS"]=array_unique($arFilter[$clse."TAGS"]);
                            }elseif($CLASS_ID_EL[0]=='CondIBSection') {
                                $arFilter[$clse."SECTION_ID"]=array_merge((array)$arFilter[$clse."SECTION_ID"],(array)$cse);
                                $arFilter[$clse."SECTION_ID"]=array_unique($arFilter[$clse."SECTION_ID"]);
                            }elseif($CLASS_ID_EL[0]=='CondIBXmlID') {
                                $arFilter[$clse."XML_ID"]=array_merge((array)$arFilter[$clse."XML_ID"],(array)$cse);
                                $arFilter[$clse."XML_ID"]=array_unique($arFilter[$clse."XML_ID"]);
                            }elseif($CLASS_ID_EL[0]=='CondBsktAppliedDiscount') { //Условие: Были применены скидки (Y/N)
                                foreach($arrActions as $tempAction){
                                    if(($tempAction['SORT']<$action['SORT']&&$tempAction['PRIORITY']>$action['PRIORITY']&&$cse=='N')||($tempAction['SORT']>$action['SORT']&&$tempAction['PRIORITY']<$action['PRIORITY']&&$cse=='Y')){
                                        $arFilter=false;
                                        break 4;
                                    }
                                }
                            }
                        }
                    }elseif($CLASS_ID[0]=='CondIBProp') {
                        $arFilter["IBLOCK_ID"]=$CLASS_ID[1];
                        $arFilter[$cls."PROPERTY_".$CLASS_ID[2]]=array_merge((array)$arFilter[$cls."PROPERTY_".$CLASS_ID[2]],(array)$cs);
                        $arFilter[$cls."PROPERTY_".$CLASS_ID[2]]=array_unique($arFilter[$cls."PROPERTY_".$CLASS_ID[2]]);
                    }elseif($CLASS_ID[0]=='CondIBName') {
                        $arFilter[$cls."NAME"]=array_merge((array)$arFilter[$cls."NAME"],(array)$cs);
                        $arFilter[$cls."NAME"]=array_unique($arFilter[$cls."NAME"]);
                    }elseif($CLASS_ID[0]=='CondIBElement') {
                        $arFilter[$cls."ID"]=array_merge((array)$arFilter[$cls."ID"],(array)$cs);
                        $arFilter[$cls."ID"]=array_unique($arFilter[$cls."ID"]);
                    }elseif($CLASS_ID[0]=='CondIBTags') {
                        $arFilter[$cls."TAGS"]=array_merge((array)$arFilter[$cls."TAGS"],(array)$cs);
                        $arFilter[$cls."TAGS"]=array_unique($arFilter[$cls."TAGS"]);
                    }elseif($CLASS_ID[0]=='CondIBSection') {
                        $arFilter[$cls."SECTION_ID"]=array_merge((array)$arFilter[$cls."SECTION_ID"],(array)$cs);
                        $arFilter[$cls."SECTION_ID"]=array_unique($arFilter[$cls."SECTION_ID"]);
                    }elseif($CLASS_ID[0]=='CondIBXmlID') {
                        $arFilter[$cls."XML_ID"]=array_merge((array)$arFilter[$cls."XML_ID"],(array)$cs);
                        $arFilter[$cls."XML_ID"]=array_unique($arFilter[$cls."XML_ID"]);
                    }elseif($CLASS_ID[0]=='CondBsktAppliedDiscount') { //Условие: Были применены скидки (Y/N)
                        foreach($arrActions as $tempAction){
                            if(($tempAction['SORT']<$action['SORT']&&$tempAction['PRIORITY']>$action['PRIORITY']&&$cs=='N')||($tempAction['SORT']>$action['SORT']&&$tempAction['PRIORITY']<$action['PRIORITY']&&$cs=='Y')){
                                $arFilter=false;
                                break 3;
                            }
                        }
                    }
                }
            }


            if($arFilter){
                $ob = \CIBlockElement::GetList(array(), $arFilter, false, false, ['ID']);
                while($res = $ob->GetNext()){
                    $items[] = $res["ID"];
                }
            }
        }


        return $items;
    }
}

$saleID = AllProductDiscount::getFull();
if(empty($saleID)){
    $saleID = false;
}
$GLOBALS['arrFilter'] = ['ID' => $saleID];
//$GLOBALS['arrFilter'] = ['ID' => false];
//$GLOBALS['arrFilter'] = [];
?>

    <div class="catalog full_w">
        <?
        if (!$_SESSION['CATALOG_SORT']) {

            $_SESSION['CATALOG_SORT']['TYPE'] = 'catalog_PRICE_1';
            $_SESSION['CATALOG_SORT']['VAL'] = 'asc';
        }
        ?>
        <? $APPLICATION->IncludeComponent(
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
		"PAGE_ELEMENT_COUNT" => "100",
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
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
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
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
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
); ?>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>