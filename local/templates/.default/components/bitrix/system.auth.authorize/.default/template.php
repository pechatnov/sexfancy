<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$APPLICATION->AddChainItem('Авторизация');
?>




<div class="registr">
	<?if($arParams["~AUTH_RESULT"] || $arResult['ERROR_MESSAGE']){?>
		<div class="sent">
			<?
			ShowMessage($arParams["~AUTH_RESULT"]);
			ShowMessage($arResult['ERROR_MESSAGE']);
			?>
		</div>
	<?}?>
	<?if($arResult["AUTH_SERVICES"]):?>
		<div class="title_auth"><?echo GetMessage("AUTH_TITLE")?></div>
	<?endif?>
	<div class="note_auth"><?=GetMessage("AUTH_PLEASE_AUTH")?></div>

	<form class="lk_reg" name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
		<?if (strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>
		<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>

		<div class="inner">
			<div class="item">
				<span>Логин</span>
				<input type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>">
			</div>
			<div class="item">
				<span>Пароль</span>
				<input type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off">
			</div>
			<?if($arResult["SECURE_AUTH"]):?>
				<div class="item">
					<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
						<div class="bx-auth-secure-icon"></div>
					</span>
					<noscript>
						<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
							<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
						</span>
					</noscript>
					<script type="text/javascript">
						document.getElementById('bx_auth_secure').style.display = 'inline-block';
					</script>
				</div>
			<?endif?>
			<?if($arResult["CAPTCHA_CODE"]):?>
				<div class="item">
					<span><?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:</span>
					<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				</div>
				<div class="item">
					<span class="bx-auth-label"></span>
					<input class="bx-auth-input" type="text" name="captcha_word" maxlength="50" value="" size="15" />
				</div>
			<?endif;?>
		</div>
		<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
			<div class="bl_checkbox">
				<input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y">
				<label for="USER_REMEMBER">Запомнить меня на этом компьютере</label>
			</div>
		<?endif?>
		<div class="reg_btn">
			<input style="display: none" type="submit" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>">
			<a href="#">Войти</a>
			<div class="clearfix"></div>
		</div>
		<div class="descr_container">
			<?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>

				<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow">Забыли свой пароль?</a>
			<?endif?>
			<?if($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y"):?>

				<p>Если вы впервые на сайте, заполните, пожалуйста, регистрационную форму.</p>
				<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow">Зарегистрироваться</a>
			<?endif?>
		</div>
	</form>
</div>

<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>

<?//if($arResult["AUTH_SERVICES"]):?>
<?
/*$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
	array(
		"AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
		"CURRENT_SERVICE" => $arResult["CURRENT_SERVICE"],
		"AUTH_URL" => $arResult["AUTH_URL"],
		"POST" => $arResult["POST"],
		"SHOW_TITLES" => $arResult["FOR_INTRANET"]?'N':'Y',
		"FOR_SPLIT" => $arResult["FOR_INTRANET"]?'Y':'N',
		"AUTH_LINE" => $arResult["FOR_INTRANET"]?'N':'Y',
	),
	$component,
	array("HIDE_ICONS"=>"Y")
);*/
?>
<?//endif?>
