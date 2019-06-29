<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="personal_area">
	<?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/menu_lk.php');?>
	<div class="cont_lk">
		<div class="profiles_page_two">

			<a class="go_back" href="<?=$arResult["URL_TO_LIST"]?>"><?=GetMessage("SALE_RECORDS_LIST")?></a>

			<?if(strlen($arResult["ERROR_MESSAGE"])<=0):?>
				<form class="lk_reg" method="post" action="<?=POST_FORM_ACTION_URI?>">



					<input type="hidden" name="CANCEL" value="Y">
					<?=bitrix_sessid_post()?>
					<input type="hidden" name="ID" value="<?=$arResult["ID"]?>">

					<?=GetMessage("SALE_CANCEL_ORDER1") ?>

					<a href="<?=$arResult["URL_TO_DETAIL"]?>"><?=GetMessage("SALE_CANCEL_ORDER2")?> #<?=$arResult["ACCOUNT_NUMBER"]?></a>?
					<?= GetMessage("SALE_CANCEL_ORDER3") ?>
					<?= GetMessage("SALE_CANCEL_ORDER4") ?>:

					<div class="item">
						<textarea name="REASON_CANCELED"></textarea>
					</div>

					<div class="buttons_s">
						<input style="display: none" type="submit" name="action" value="<?=GetMessage("SALE_CANCEL_ORDER_BTN") ?>">
						<a id="cancel_order_btn" href="#"><?=GetMessage("SALE_CANCEL_ORDER_BTN") ?></a>
					</div>


				</form>
			<?else:?>
				<?=ShowError($arResult["ERROR_MESSAGE"]);?>
			<?endif;?>

		</div>
	</div>
	<div class="clearfix"></div>
</div>