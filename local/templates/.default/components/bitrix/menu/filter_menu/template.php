<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if (!empty($arResult['MENU'])):?>

	<div class="menu">
		<div class="title">Меню<span class="ic_show"></span><span class="cursor_wrap"></span></div>
		<div class="block">
			<?foreach($arResult['MENU'] as $arItem){?>
				<div class="item <?if($arItem["SELECTED"]) echo 'cur_dir active';?>">
					<span>
						<a class="main" href="<?=$arItem['SECTION_PAGE_URL']?>"><?=$arItem['NAME']?></a>
					</span>
				</div>
			<?}?>
		</div>
	</div>
<?endif?>