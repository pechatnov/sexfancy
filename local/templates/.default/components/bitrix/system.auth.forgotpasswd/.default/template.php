<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->AddChainItem('Запрос пароля');
?>


<div class="registr">
	<?if($arParams["~AUTH_RESULT"]){?>
		<div class="sent"><?ShowMessage($arParams["~AUTH_RESULT"]);?></div>
	<?}?>
	<div class="hat">Выслать контрольную строку</div>
	<p>
		Если вы забыли пароль, введите логин или E-Mail.
		Контрольная строка для смены пароля, а также ваши регистрационные
		данные, будут высланы вам по E-Mail.
	</p>
	<form class="lk_reg" name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
		<?
		if (strlen($arResult["BACKURL"]) > 0)
		{
			?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?
		}
		?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="SEND_PWD">

		<div class="inner">
			<div class="item">
				<span>E-mail</span>
				<input type="text" name="USER_EMAIL" maxlength="255" />
			</div>
			<?if($arResult["USE_CAPTCHA"]):?>
				<div class="item">
					<span><span class="star">*</span>Введите слово на картинке</span>
					<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA">
				</div>
				<div class="item">
					<span><?echo GetMessage("system_auth_captcha")?></span>
					<input type="text" name="captcha_word" maxlength="50" value="" />
				</div>
			<?endif?>
		</div>
		<div class="reg_btn">
			<input style="display: none" type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
			<a href="#">Выслать</a>
			<div class="clearfix"></div>
		</div>
		<div class="descr_container">
			<a href="<?=$arResult["AUTH_AUTH_URL"]?>">Авторизация</a>
		</div>
	</form>

	<script type="text/javascript">
		document.bform.USER_LOGIN.focus();
	</script>
</div>