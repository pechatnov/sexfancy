<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->SetTitle('Личные данные');

use Bitrix\Main\Localization\Loc;

?>
<div class="personal_area">
	<?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/menu_lk.php');?>
	<div class="cont_lk">
		<div class="personal_data">
			<div class="sent">
				<?
				ShowError($arResult["strProfileError"]);
				if ($arResult['DATA_SAVED'] == 'Y')
				{
					ShowNote(Loc::getMessage('PROFILE_DATA_SAVED'));
				}
				?>
			</div>
			<form class="lk_reg" method="post" name="form1" action="<?=$APPLICATION->GetCurUri()?>" enctype="multipart/form-data" role="form">
				<?=$arResult["BX_SESSION_CHECK"]?>
				<input type="hidden" name="lang" value="<?=LANG?>" />
				<input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
				<input type="hidden" name="LOGIN" value="<?=$arResult["arUser"]["LOGIN"]?>" />
				<div class="inner" id="user_div_reg">
					<?
					if (!in_array(LANGUAGE_ID,array('ru', 'ua')))
					{
						?>
						<div class="item">
							<span><?=Loc::getMessage('main_profile_title')?></span>
							<input type="text" name="TITLE" maxlength="50" id="main-profile-title" value="<?=$arResult["arUser"]["TITLE"]?>" />
						</div>
						<?
					}
					?>
					<div class="item">
						<span><?=Loc::getMessage('NAME')?></span>
						<input type="text" name="NAME" maxlength="50" id="main-profile-name" value="<?=$arResult["arUser"]["NAME"]?>" />
					</div>
					<div class="item">
						<span><?=Loc::getMessage('LAST_NAME')?></span>
						<input type="text" name="LAST_NAME" maxlength="50" id="main-profile-last-name" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
					</div>
					<div class="item">
						<span><?=Loc::getMessage('SECOND_NAME')?></span>
						<input type="text" name="SECOND_NAME" maxlength="50" id="main-profile-second-name" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
					</div>
					<div class="item">
						<span><?=Loc::getMessage('EMAIL')?></span>
						<input type="text" name="EMAIL" maxlength="50" id="main-profile-email" value="<?=$arResult["arUser"]["EMAIL"]?>" />
					</div>
					<?
					if($arResult["arUser"]["EXTERNAL_AUTH_ID"] == '')
					{
						?>
						<div class="txt"><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></div>
						<div class="item">
							<span><?=Loc::getMessage('NEW_PASSWORD_REQ')?></span>
							<input type="password" name="NEW_PASSWORD" maxlength="50" id="main-profile-password" value="" autocomplete="off"/>
						</div>
						<div class="item">
							<span><?=Loc::getMessage('NEW_PASSWORD_CONFIRM')?></span>
							<input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" id="main-profile-password-confirm" autocomplete="off" />
						</div>
						<?
					}
					?>
				</div>
				<div class="buttons_s">
					<input style="display: none;" type="submit" name="save" value="<?=(($arResult["ID"]>0) ? Loc::getMessage("MAIN_SAVE") : Loc::getMessage("MAIN_ADD"))?>">
					<!--<input style="display: none;" type="submit"  name="reset" value="<?/*echo GetMessage("MAIN_RESET")*/?>">-->
					<a name="save" href="#"><?=(($arResult["ID"]>0) ? Loc::getMessage("MAIN_SAVE") : Loc::getMessage("MAIN_ADD"))?></a>
					<!--<a name="reset" href="#"><?/*echo GetMessage("MAIN_RESET")*/?></a>-->
				</div>
			</form>
		</div>
	</div>
	<div class="clearfix"></div>
</div>