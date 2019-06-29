<?
/*$newItems = array();
$arOrder = ["RAND" => "ASC"];
$arFilter = ['IBLOCK_ID' => IB_PROD, 'PROPERTY_BESTSELLER' => 1, 'SECTION_ACTIVE' => 'Y', 'CATALOG_AVAILABLE' => 'Y', 'ACTIVE' => 'Y'];
$arSelect = ['ID'];
$ob = CIBlockElement::GetList($arOrder, $arFilter, false, ["nTopCount" => 7], $arSelect);
if(is_object($ob)){
    while($res = $ob->Fetch())
    {
        */?><!--<pre><?/*print_r($res)*/?></pre>--><?/*
        $newItems[] = $res['ID'];
    }
}*/


/*if($newItems){

    $GLOBALS['arrFilter'] = array('ID' => $newItems);
}
else{
    $GLOBALS['arrFilter'] = array('ID' => false, 'PROPERTY_BESTSELLER' => 1, 'SECTION_ACTIVE' => 'Y', 'CATALOG_AVAILABLE' => 'Y', 'ACTIVE' => 'Y');
}*/
$GLOBALS['arrFilter'] = array('IBLOCK_ID' => IB_PROD, 'PROPERTY_BESTSELLER' => 1, 'SECTION_ACTIVE' => 'Y', 'CATALOG_AVAILABLE' => 'Y', 'ACTIVE' => 'Y');
?>
<?if($GLOBALS['arrFilter']){?>
    <div class="popul">
        <h2>Бестселлеры</h2>
        <?include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/inc/templ/slider.php");?>
    </div>
<?}?>