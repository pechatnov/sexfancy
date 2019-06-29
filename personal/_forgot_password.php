<?
define ("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->AddChainItem("Запрос пароля");
$APPLICATION->SetTitle("Запрос пароля");
?>

<?$APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd", "forgot_password", Array(
	
	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>