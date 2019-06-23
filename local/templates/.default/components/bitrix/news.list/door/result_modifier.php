<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();




foreach($arResult["ITEMS"] as $key => $arItem){

    $arResult["ITEMS"][$key]['IMG'] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]['ID'], array('width'=>277, 'height'=>256), BX_RESIZE_IMAGE_EXACT, true);
}