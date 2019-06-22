<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    array(
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "/catalog/",
        /*"SECTION_PAGE_URL" => "SECTION_CODE_PATH#/",
        "DETAIL_PAGE_URL" => "SECTION_CODE_PATH##ELEMENT_CODE#-#ELEMENT_ID#",*/
        /*"SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#",*/
        "SECTION_PAGE_URL" => "#SECTION_ID#/",
        "DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#.html",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => IB_PROD,
        "DEPTH_LEVEL" => "4",
        "CACHE_TYPE" => "Y",
        "CACHE_TIME" => "36000000"
    ),
    false,
    array(
        "ACTIVE_COMPONENT" => "Y"
    )
);



$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>