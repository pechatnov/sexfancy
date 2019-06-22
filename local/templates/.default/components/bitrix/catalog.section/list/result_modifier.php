<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();



//my

foreach($arResult['ITEMS'] as $key => $arItem){

    $arResult['ITEMS'][$key]['IMG'] = CFile::ResizeImageGet($arItem["PROPERTIES"]["img1"]['VALUE'], array('width'=>190, 'height'=>210), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}



$canonical = 'https://'.$_SERVER['HTTP_HOST'].$arResult['SECTION_PAGE_URL'];

$this->SetViewTarget('canonical');
?><link rel="canonical" href="<?=$canonical?>"><?
$this->EndViewTarget();