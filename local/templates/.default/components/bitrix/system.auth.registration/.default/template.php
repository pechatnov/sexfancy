<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->AddChainItem('Регистрация');
?>

<div class="registr">
	<?if($arParams["~AUTH_RESULT"]){?>
		<div class="sent">
			<?
			ShowMessage($arParams["~AUTH_RESULT"]);
			?>
		</div>
	<?}?>

	<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y" && is_array($arParams["AUTH_RESULT"]) &&  $arParams["AUTH_RESULT"]["TYPE"] === "OK"):?>
		<div class="sent"><?echo GetMessage("AUTH_EMAIL_SENT")?></div>
	<?else:?>

	<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
		<div class="sent"><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></div>
	<?endif?>
	<form class="lk_reg" method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" enctype="multipart/form-data">
			<?
			if (strlen($arResult["BACKURL"]) > 0)
			{
				?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
				<?
			}
			?>
			<input type="hidden" name="AUTH_FORM" value="Y" />
			<input type="hidden" name="TYPE" value="REGISTRATION" />


			<div class="inner">
				<div class="item">
					<span>Имя</span>
					<input type="text" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>" class="bx-auth-input" />
				</div>
				<div class="item">
					<span>Фамилия</span>
					<input type="text" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>" class="bx-auth-input" />
				</div>
				<div class="item">
					<span><span class="star">*</span>Логин (минимум 3 символа)</span>
					<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" class="bx-auth-input" />
				</div>
				<div class="item">
					<span><span class="star">*</span>Пароль</span>
					<input type="password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" class="bx-auth-input" autocomplete="off" />
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
				<div class="item">
					<span><span class="star">*</span>Подтверждение пароля</span>
					<input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="bx-auth-input" autocomplete="off" />
				</div>
				<div class="item">
					<span><span class="star"><?if($arResult["EMAIL_REQUIRED"]){?>*<?}?></span>E-Mail</span>
					<input type="text" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>" class="bx-auth-input" />
				</div>
				<div class="item">

					<?// ********************* User properties ***************************************************?>
					<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
						<tr><td colspan="2"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></td></tr>
						<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
							<tr><td><?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;
									?><?=$arUserField["EDIT_FORM_LABEL"]?>:</td><td>
									<?$APPLICATION->IncludeComponent(
										"bitrix:system.field.edit",
										$arUserField["USER_TYPE"]["USER_TYPE_ID"],
										array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "bform"), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
						<?endforeach;?>
					<?endif;?>
					<?// ******************** /User properties ***************************************************

					/* CAPTCHA */
					if ($arResult["USE_CAPTCHA"] == "Y")
					{
						?>
						<span><span class="star">*</span>Введите слово на картинке</span>
						<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA">
						<input type="text" name="captcha_word" maxlength="50" value="">
						<?
					}
					/* CAPTCHA */
					?>
					<?$APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "",
						array(
							"ID" => COption::getOptionString("main", "new_user_agreement", ""),
							"IS_CHECKED" => "Y",
							"AUTO_SAVE" => "N",
							"IS_LOADED" => "Y",
							"ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
							"ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
							"INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
							"REPLACE" => array(
								"button_caption" => GetMessage("AUTH_REGISTER"),
								"fields" => array(
									rtrim(GetMessage("AUTH_NAME"), ":"),
									rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
									rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
									rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
									rtrim(GetMessage("AUTH_EMAIL"), ":"),
								)
							),
						)
					);?>
				</div>
			</div>

			<div class="reg_btn">
				<input style="display: none;" type="submit" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" />
				<a href="#">Регистрация</a>
				<div class="clearfix"></div>
			</div>
			<div class="descr_container">
				<p>Пароль должен быть не менее 6 символов длиной.</p>
				<p><span>*</span>Обязательные поля.</p>
				<a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow">Авторизация</a>
			</div>

		</form>

		<script type="text/javascript">
		document.bform.USER_NAME.focus();
		</script>

<?endif?>
</div>