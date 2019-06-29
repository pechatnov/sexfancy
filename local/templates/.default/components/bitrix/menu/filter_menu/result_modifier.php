<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arOrder = ['SORT' => 'asc','NAME' => 'asc'];
$arFilter = Array('IBLOCK_ID' => IB_PROD, 'DEPTH_LEVEL' => 1, 'ACTIVE' => 'Y');
$arSelect = Array('ID', 'NAME', 'DEPTH_LEVEL', 'SECTION_PAGE_URL');
$ob = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect, false);
while($res = $ob->GetNextElement()){

    $arResult['MENU'][] = $res->GetFields();
}