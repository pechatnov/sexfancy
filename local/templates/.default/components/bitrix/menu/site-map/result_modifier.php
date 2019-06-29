<?
//menu
$articles = [];
$filter = ['IBLOCK_ID' => IB_ART, 'ID' => $this->arParams['PROP_CODE']];
$select = ['IBLOCK_ID', 'ID', 'NAME', 'DETAIL_PAGE_URL'];
$ob = CIBlockElement::getList(false, $filter, false, false, $select);
$i = 0;
while($res = $ob->GetNext()){
    $articles[$i]['TEXT'] = $res['NAME'];
    $articles[$i]['LINK'] = $res['DETAIL_PAGE_URL'];
    $i++;
}


$catalog = array();
$others = array();
$i = 1;

foreach ($arResult as $arItem) {

    if($arItem['LINK'] == '/catalog/' || $arItem['DEPTH_LEVEL'] > 1){
        $catalog[] = $arItem;
    }
    if($arItem['LINK'] != '/catalog/' && $arItem['DEPTH_LEVEL'] === 1){
        $others[$i] = $arItem;
        $i++;
    }
}

foreach($others as $key => $arItem){

    if($arItem['LINK'] == '/article/' && $arItem['DEPTH_LEVEL'] === 1){

        $others[$key]['ITEMS'] = $articles;
    }
}

$catalog = array_values($catalog);


$menuList = array();
$lev = 0;
$lastInd = 0;
$parents = array();
foreach ($catalog as $arItem) {
    $lev = $arItem['DEPTH_LEVEL'];

    if ($arItem['IS_PARENT']) {
        $arItem['ITEMS'] = array();
    }

    if ($lev == 1) {
        $menuList[] = $arItem;
        $lastInd = count($menuList)-1;
        $parents[$lev] = &$menuList[$lastInd];
    } else {
        $parents[$lev-1]['ITEMS'][] = $arItem;
        $lastInd = count($parents[$lev-1]['ITEMS'])-1;
        $parents[$lev] = &$parents[$lev-1]['ITEMS'][$lastInd];
    }
}


$arResult = array_merge($menuList + $others);