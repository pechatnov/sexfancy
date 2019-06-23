<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//menu


$menuList = array();
$lev = 0;
$lastInd = 0;
$parents = array();
foreach ($arResult as $arItem) {
    $lev = $arItem['DEPTH_LEVEL'];

    if ($arItem['IS_PARENT']) {
        $arItem['ITEMS'] = array();
    }

    if ($lev == 1) {
        $menuList[] = $arItem;
        $lastInd = count($menuList)-1;
        $parents[$lev] = &$menuList[$lastInd];
    } else {
        $parents[$lev-1]['ITEMS'][] = $arItem;
        $lastInd = count($parents[$lev-1]['ITEMS'])-1;
        $parents[$lev] = &$parents[$lev-1]['ITEMS'][$lastInd];
    }
}


$menuList = array_chunk($menuList, 5);

$arResult['MENU'] = $menuList;

$this->__component->SetResultCacheKeys(['MENU']);

CModule::IncludeModule("iblock");
$arOrder = ['SORT' => 'asc','NAME' => 'asc'];
$arFilter = Array('IBLOCK_ID' => IB_BRAND, 'ACTIVE' => 'Y');
$arSelect = Array('ID', 'NAME', 'DETAIL_PAGE_URL');
$ob = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
while($res = $ob->GetNextElement()){

    $arResult['BRANDS'][] = $res->GetFields();
}
$arResult['BRANDS'] = array_chunk($arResult['BRANDS'], 5);
