<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


//my

if($arResult['PROPERTIES']['img1']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img1']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img1']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTIES']['img2']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img2']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img2']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTIES']['img3']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img3']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img3']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTIES']['img4']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img4']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img4']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTIES']['img5']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img5']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img5']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTIES']['img6']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img6']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img6']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTIES']['img7']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img7']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img7']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTIES']['img8']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img8']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img8']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTIES']['img9']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img9']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img9']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTIES']['img10']['VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img10']['VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTIES']['img10']['VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}

foreach($arResult['OFFERS'] as $offer){

    if($offer['ITEM_PRICES'][0]['PERCENT']) {
        $arResult['PRICES_SALE'][$offer['ID']] = $offer['ITEM_PRICES'][0]['PRINT_BASE_PRICE'];
    }

    $arResult['PRICES'][$offer['ID']] = $offer['ITEM_PRICES'][0]['PRINT_PRICE'];
}

if($arResult['OFFERS'][0]['PROPERTIES']['color']['VALUE']){
    $color = array();
    $arFilter = Array('IBLOCK_ID' => IB_COLOR, 'ACTIVE' => 'Y');
    $arSelect = Array('ID', 'NAME', 'PROPERTY_CODE', 'PROPERTY_IMG');
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $color[$arFields['PROPERTY_CODE_VALUE']]['code'] = $arFields['PROPERTY_CODE_VALUE'];
        $color[$arFields['PROPERTY_CODE_VALUE']]['val'] = CFile::GetPath($arFields['PROPERTY_IMG_VALUE']);
    }



    foreach($arResult['OFFERS'] as $offer){

        $arResult['COLOR'][ $color[ $offer['PROPERTIES']['color']['VALUE'] ]['code'] ]['color_val'] = $color[ $offer['PROPERTIES']['color']['VALUE'] ]['val'];
        $arResult['COLOR'][ $color[ $offer['PROPERTIES']['color']['VALUE'] ]['code'] ]['offers'][$offer['ID']]['id'] = $offer['ID'];
    }
}

if($arResult['OFFERS'][0]['PROPERTIES']['size']['VALUE']) {
    foreach($arResult['OFFERS'] as $offer) {

        $arResult['SIZE'][$offer['ID']] = $offer['PROPERTIES']['size']['VALUE'];
    }

    foreach($arResult['COLOR'] as $color_code => $arVal){

        foreach($arVal['offers'] as $id_offer => $val){

            if($arResult['SIZE'][$id_offer])
                $arResult['COLOR'][$color_code]['offers'][$id_offer]['size_val'] = $arResult['SIZE'][$id_offer];
        }
    }
}


$canonical = 'https://'.$_SERVER['HTTP_HOST'].$arResult['DETAIL_PAGE_URL'];

$this->SetViewTarget('canonical');
?><link rel="canonical" href="<?=$canonical?>"><?
$this->EndViewTarget();