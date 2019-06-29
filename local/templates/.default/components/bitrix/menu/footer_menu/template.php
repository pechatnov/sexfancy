<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<div class="menu">
		<!--<div class="title">Меню</div>-->
		<nav itemscope itemtype="http://schema.org/SiteNavigationElement">
			<div class="block">
				<?foreach($arResult['MENU'] as $col){?>
					<div class="col_item">
						<?foreach($col as $arItem){?>
							<span><a itemprop="url" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></span>
						<?}?>
					</div>
				<?}?>
			</div>
			<div class="block_320">
				<?foreach($arResult['MENU_320'] as $col){?>
					<div class="item">
						<?foreach($col as $arItem){?>
							<span><a itemprop="url" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></span>
						<?}?>
					</div>
				<?}?>
			</div>
		</nav>
	</div>
<?endif?>