<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->AddChainItem('Изменение пароля');?>


<div class="registr">


	<?
	if($arParams["~AUTH_RESULT"]){
		?>
		<div class="sent"><?ShowMessage($arParams["~AUTH_RESULT"]);?></div>
		<?
	}
	?>

	<div class="title_auth"><?=GetMessage("AUTH_CHANGE_PASSWORD")?></div>


	<form class="lk_reg" method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform">
		<?if (strlen($arResult["BACKURL"]) > 0): ?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<? endif ?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="CHANGE_PWD">

		<div class="inner">
			<div class="item">
				<span>
					<span class="star">*</span>Логин
				</span>
				<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>">
			</div>
			<div class="item">
				<span>
					<span class="star">*</span>Контрольная строка
				</span>
				<input type="text" name="USER_CHECKWORD" maxlength="50" value="<?=$arResult["USER_CHECKWORD"]?>" class="bx-auth-input" />
			</div>
			<div class="item">
				<span>
					<span class="star">*</span>Новый пароль
				</span>
				<input type="password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" class="bx-auth-input" autocomplete="off">
			</div>
			<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none"><div class="bx-auth-secure-icon"></div></span>
				<noscript>
					<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>"><div class="bx-auth-secure-icon bx-auth-secure-unlock"></div></span>
				</noscript>
				<script type="text/javascript">
					document.getElementById('bx_auth_secure').style.display = 'inline-block';
				</script>
			<?endif?>
			<div class="item">
				<span>
					<span class="star">*</span>Подтверждение пароля
				</span>
				<input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="bx-auth-input" autocomplete="off">
			</div>
			<?if($arResult["USE_CAPTCHA"]):?>
				<div class="item">
					<span><span class="star">*</span>Введите слово на картинке</span>
					<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA" width="180" height="40">
					<input type="text" name="captcha_word" maxlength="50" value="">
				</div>
			<?endif?>
		</div>
		<div class="reg_btn">
			<input style="display: none" type="submit" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>" />
			<a href="#">Изменить пароль</a>
			<div class="clearfix"></div>
		</div>
		<div class="descr_container">
			<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
			<p><span>*</span><?=GetMessage("AUTH_REQ")?></p>
			<a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a>
		</div>
	</form>

	<script type="text/javascript">
		document.bform.USER_LOGIN.focus();
	</script>
</div>