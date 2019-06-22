<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();



$itemsId = [];
foreach($arResult['BASKET'] as $arItem){
    $itemsId[] = $arItem['PARENT']['ID'];
}

$filter = ['IBLOCK_ID' => IB_PROD, 'ID' => $itemsId];
$select = ['ID', 'NAME', 'PROPERTY_img1'];

$ob = CIBlockElement::GetList(false, $filter, false, false, $select);
while($res = $ob->GetNext()){

    $img = CFile::ResizeImageGet($res['PROPERTY_IMG1_VALUE'], array('width'=>70, 'height'=>70), BX_RESIZE_IMAGE_PROPORTIONAL, true);;
    $arResult['IMG'][$res['ID']] = $img['src'];
}