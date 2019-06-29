<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$order = ['SORT' => 'DESC', 'NAME' => 'ASC'];
$filter = ['IBLOCK_ID' => 8, 'ACTIVE' => 'Y'];
$select = ['IBLOCK_ID', 'ID', 'NAME', 'DETAIL_PAGE_URL'];
$ob = CIBlockElement::getList($order, $filter, false, false, $select);
$ob->SetUrlTemplates($arParams['DETAIL_URL']);
while($res = $ob->GetNext()){
    $arResult['SECTIONS'][] = $res;
}

$arResult['IMG'] = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]['ID'], array('width'=>1920, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$arResult['IMG_320'] = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]['ID'], array('width'=>768, 'height'=>120), BX_RESIZE_IMAGE_PROPORTIONAL, true);