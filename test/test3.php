<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<?
$data[22] = 'вибраторы';
$codeSection = Cutil::translit($data[22],"ru",["replace_space"=>"-","replace_other"=>"-"]);

$obSection = new CIBlockSection;
$arFields = [
    "ACTIVE" => 'Y',
    "IBLOCK_ID" => IB_PROD,
    "NAME" => $data[22],
    "CODE" => $codeSection,
];

$newSection = $obSection->Add($arFields);
if($newSection){
    echo $newSection;
}else{
    echo $obSection->LAST_ERROR;
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>