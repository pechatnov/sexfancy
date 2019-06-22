<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$dir = $APPLICATION->GetCurDir();
$path =  explode('/', $dir);

$arFilter = Array('IBLOCK_ID' => IB_PROD, 'DEPTH_LEVEL' => 1, 'CODE' => $path[2], 'ACTIVE' => 'Y');
$arSelect = Array('ID', 'NAME');
$res = CIBlockSection::GetList(array(), $arFilter, false, $arSelect, false);
$ob = $res->GetNextElement();
if(is_object($ob)){

    $arFields = $ob->GetFields();
    $arResult['SECTION'] = $arFields['NAME'];
}





$menuList = array();
$lev = 0;
$lastInd = 0;
$parents = array();
foreach ($arResult as $arItem) {
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





foreach($menuList as $section){

    if($section['TEXT'] == $arResult['SECTION'])
        $arResult = $section;
}