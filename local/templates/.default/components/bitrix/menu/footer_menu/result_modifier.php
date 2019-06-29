<?
$menu = array_chunk($arResult, 3);

$menu_320 = array_chunk($arResult, 2);
foreach($menu_320 as $col){
    foreach($col as $key => $arItem) {

        $arResult['MENU_320'][$key][] = $arItem;
    }
}

$arResult['MENU'] = $menu;