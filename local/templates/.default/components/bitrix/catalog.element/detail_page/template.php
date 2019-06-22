<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;
$this->setFrameMode(true);
?>
<div class="return_btn"><a href="<?=$arResult['SECTION']['SECTION_PAGE_URL']?>">&larr; Вернуться в раздел</a></div>
<div class="detail_page">
	<?$i = 1;?>
	<div class="photo_block">
		<div class="mini_img">
			<div class="block">
				<?foreach($arResult['IMG']['MINI'] as $img){?>
					<div>
						<div class="item"><img src="<?=$img['src']?>" alt="<?=$arResult['NAME'].'-Фото'.$i;$i++;?>"></div>
					</div>
				<?}?>
			</div>
		</div>
		<div class="big_img">
			<?if($arResult['OFFERS'][0]['ITEM_PRICES'][0]['PERCENT'] || $arResult['PROPERTIES']['new']['VALUE']){?>
				<div class="icons">
					<?if($arResult['OFFERS'][0]['ITEM_PRICES'][0]['PERCENT']){?>
						<span class="sale">-<?=$arResult['OFFERS'][0]['ITEM_PRICES'][0]['PERCENT']?>%</span>
					<?}?>
					<?if($arResult['PROPERTIES']['new']['VALUE']){?>
						<span class="new">NEW</span>
					<?}?>
				</div>
			<?}?>
			<div class="block">
				<?foreach($arResult['IMG']['BIG'] as $img){?>
					<div>
						<div class="item"><img src="<?=$img['src']?>" alt="<?=$arResult['NAME'].'-Фото'.$i;$i++;?>"></div>
					</div>
				<?}?>
			</div>
		</div>
	</div>
	<div class="descr_block">
		<input class="id_product" type="hidden" value="<?=$arResult['ID']?>">
		<input class="id_scu_1" type="hidden" value="<?=$arResult['OFFERS'][0]['ID']?>">
		<h1 id="pagetitle"><?=$arResult['NAME']?></h1>
		<div class="vendor_code">Артикул: <?=$arResult['PROPERTIES']['vendor_code']['VALUE']?>, ID: <?=$arResult['ID']?></div>

		<?
		$avail = 'Товар в наличии';
		if($arResult['PRODUCT']['AVAILABLE'] == 'N'){
			$avail = 'Нет в наличии';
		}
		?>
		<div class="in_stock"><?=$avail?></div>

		<div class="price">
			<?if($arResult['PRICES_SALE']){?>
				<?$arKeys = array_keys($arResult['PRICES_SALE']);?>
				<?foreach($arResult['PRICES_SALE'] as $offerId => $price){?>
					<span offerId="<?=$offerId?>" class="sale<?if($offerId === $arKeys[0]){?> active<?}?>">
						<?=$price?>
					</span>
				<?}?>
			<?}?>

			<?$arKeys = array_keys($arResult['PRICES']);?>
			<?foreach($arResult['PRICES'] as $offerId => $price){?>
				<span offerId="<?=$offerId?>" <?if($offerId === $arKeys[0]){?>class="active"<?}?>>
					<?=$price?>
				</span>
			<?}?>
		</div>

		<div class="description">
			<?
			if($arResult['PROPERTIES']['UNI_DESCR']['~VALUE']['TEXT']){
				echo $arResult['PROPERTIES']['UNI_DESCR']['~VALUE']['TEXT'];
			}else{
				echo $arResult['~DETAIL_TEXT'];
			}
			?>
			<?if(
				$arResult['PROPERTIES']['vendor_code']['VALUE'] &&
				(
					$arResult['PROPERTIES']['batteries']['VALUE'] ||
					$arResult['PROPERTIES']['pack']['VALUE'] ||
					$arResult['PROPERTIES']['material']['VALUE'] ||
					$arResult['PROPERTIES']['diameter']['VALUE'] ||
					$arResult['PROPERTIES']['length']['VALUE'] ||
					$arResult['PROPERTIES']['function']['VALUE'] ||
					$arResult['PROPERTIES']['addfunction']['VALUE'] ||
					$arResult['PROPERTIES']['vibration']['VALUE']
				)
			){?>
				<div class="parametrs">
					<div class="title">Параметры</div>
					<div class="block">
						<?if($arResult['PROPERTIES']['vendor_code']['VALUE']){?>
							<div class="item">
								<span>Артикул:</span>
								<span></span>
								<span><?=$arResult['PROPERTIES']['vendor_code']['VALUE']?></span>
							</div>
						<?}?>
						<?if($arResult['PROPERTIES']['batteries']['VALUE']){?>
							<div class="item">
								<span>Батарейки</span>
								<span></span>
								<span><?=$arResult['PROPERTIES']['batteries']['VALUE']?></span>
							</div>
						<?}?>
						<?if($arResult['PROPERTIES']['pack']['VALUE']){?>
							<div class="item">
								<span>Упаковка</span>
								<span></span>
								<span><?=$arResult['PROPERTIES']['pack']['VALUE']?></span>
							</div>
						<?}?>
						<?if($arResult['PROPERTIES']['material']['VALUE']){?>
							<div class="item">
								<span>Материал</span>
								<span></span>
								<span><?=$arResult['PROPERTIES']['material']['VALUE']?></span>
							</div>
						<?}?>
						<?if($arResult['PROPERTIES']['diameter']['VALUE']){?>
							<div class="item">
								<span>Диаметр</span>
								<span></span>
								<span><?=$arResult['PROPERTIES']['diameter']['VALUE']?></span>
							</div>
						<?}?>
						<?if($arResult['PROPERTIES']['length']['VALUE']){?>
							<div class="item">
								<span>Длина</span>
								<span></span>
								<span><?=$arResult['PROPERTIES']['length']['VALUE']?></span>
							</div>
						<?}?>
						<?if($arResult['PROPERTIES']['function']['VALUE']){?>
							<div class="item">
								<span>Функция</span>
								<span></span>
								<span><?=$arResult['PROPERTIES']['function']['VALUE']?></span>
							</div>
						<?}?>
						<?if($arResult['PROPERTIES']['addfunction']['VALUE']){?>
							<div class="item">
								<span>Доп. функция</span>
								<span></span>
								<span><?=$arResult['PROPERTIES']['addfunction']['VALUE']?></span>
							</div>
						<?}?>
						<?if($arResult['PROPERTIES']['vibration']['VALUE']){?>
							<div class="item">
								<span>Вибрация</span>
								<span>&nbsp;</span>
								<span>Есть</span>
							</div>
						<?}?>
					</div>
				</div>
			<?}?>
		</div>
		<?if($arResult['COLOR']){?>
			<div class="colors">
				<?foreach($arResult['COLOR'] as $code => $color){?>

					<a href="<?=$code?>" <?if($color === reset($arResult['COLOR'])){?>class="active"<?}?>>

						<span class="color"><img src="<?=$color['color_val']?>" alt="<?=$code?>"></span>
					</a>
				<?}?>
			</div>
		<?}?>
		<?if($arResult['SIZE']){?>
			<?foreach($arResult['COLOR'] as $code => $color){?>
				<div color_code="<?=$code?>" class="sizes <?if($color === reset($arResult['COLOR'])) echo 'active';?>">
					<?foreach($color['offers'] as $val){?>
						<a href="<?=$val['size_val']?>" class="<?if($val === reset($color['offers'])) echo 'active';?>"><?=$val['size_val']?></a>
					<?}?>
					<span id="table_size">Таблица размеров</span>
				</div>
			<?}?>
		<?}?>
		<?if($arResult['PRODUCT']['AVAILABLE'] == 'Y'){?>
			<div class="buy">
				<a href="#">В корзину</a>
			</div>
		<?}?>
	</div>
</div>
<?
if($arResult['PROPERTIES']['WITH_BUY']['VALUE']){

	$GLOBALS['arrFilter'] = array('ID' => $arResult['PROPERTIES']['WITH_BUY']['VALUE']);
	?>
	<div class="popul">
		<h2>С этим товаром покупают</h2>
		<?include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/inc/templ/slider.php");?>
	</div>
	<?
}
?>

<script>
	$('html, body').animate({
		scrollTop: $('#wrapper').offset().top
	}, 0);
</script>