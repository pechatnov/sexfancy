<?
$newItems = array();
$arOrder = ["RAND" => "ASC"];
$arFilter = ['IBLOCK_ID' => IB_PROD, 'PROPERTY_BESTSELLER' => 1, 'SECTION_ACTIVE' => 'Y', 'CATALOG_AVAILABLE' => 'Y', 'ACTIVE' => 'Y'];
$arSelect = ['ID'];
$res = CIBlockElement::GetList($arOrder, $arFilter, false, ["nTopCount" => 7], $arSelect);
while($ob = $res->GetNextElement())
{
    if(is_object($ob)){
        $arFields = $ob->GetFields();
        $newItems[] = $arFields['ID'];
    }
}

if($newItems){

    $GLOBALS['arrFilter'] = array('ID' => $newItems);
}
else{
    $GLOBALS['arrFilter'] = array('ID' => false);
}
?>
<?if($newItems && $GLOBALS['arrFilter']['ID']){?>
    <div class="popul">
        <h2>Бестселлеры</h2>
        <?include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/inc/templ/slider.php");?>
    </div>
<?}?>