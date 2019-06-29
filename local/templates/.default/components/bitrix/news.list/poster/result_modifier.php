<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();




foreach($arResult["ITEMS"] as $key => $arItem){

    $arResult["ITEMS"][$key]['IMG'] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]['ID'], array('width'=>1200, 'height'=>475), BX_RESIZE_IMAGE_EXACT, true);
    //$arResult["ITEMS"][$key]['IMG_768'] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]['ID'], array('width'=>768, 'height'=>285), BX_RESIZE_IMAGE_EXACT, true);
    $arResult["ITEMS"][$key]['IMG_320'] = CFile::ResizeImageGet($arItem['PROPERTIES']["MOB_IMG"]['VALUE'], array('width'=>370, 'height'=>285), BX_RESIZE_IMAGE_EXACT, true);
}