<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");



$arFilter = Array('IBLOCK_ID' => IB_SKU, 'PROPERTY_CML2_LINK' => $_POST['id_product'], 'PROPERTY_COLOR' => $_POST['color'], 'PROPERTY_SIZE' => $_POST['size'], 'ACTIVE' => 'Y');
$arSelect = Array('ID', 'NAME');
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNextElement();
$arFields = $ob->GetFields();

echo $arFields['ID'];



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>