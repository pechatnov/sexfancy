<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$dir = $APPLICATION->GetCurDir();
$path =  explode('/', $dir);

$arFilter = Array('IBLOCK_ID' => IB_PROD, 'DEPTH_LEVEL' => 1, 'CODE' => $path[2], 'ACTIVE' => 'Y');
$arSelect = Array('ID', 'CODE');
$res = CIBlockSection::GetList(array(), $arFilter, false, $arSelect, false);
$ob = $res->GetNextElement();
if(is_object($ob)){

    $arFields = $ob->GetFields();
    $arResult['SECTION'] = $arFields['ID'];
}


$items = array();

foreach($arResult["ITEMS"] as $key => $arItem){

    foreach($arItem['PROPERTIES']['SECTION']['VALUE'] as $section){

        if($section == $arResult['SECTION'])
            $items[$key] = $arItem;
    }
}

$arResult["ITEMS"] = $items;




foreach($arResult["ITEMS"] as $key => $arItem){

    $arResult["ITEMS"][$key]['IMG'] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]['ID'], array('width'=>230, 'height'=>310), BX_RESIZE_IMAGE_EXACT, true);
}