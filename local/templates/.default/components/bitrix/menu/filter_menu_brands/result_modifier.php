<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arOrder = ['SORT' => 'asc','NAME' => 'asc'];
$arFilter = Array('IBLOCK_ID' => IB_BRAND, 'ACTIVE' => 'Y');
$arSelect = Array('ID', 'NAME', 'DETAIL_PAGE_URL');
$ob = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
while($res = $ob->GetNextElement()){

    $arResult['MENU'][] = $res->GetFields();
}