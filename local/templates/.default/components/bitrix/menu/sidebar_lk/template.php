<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<div class="sidebar_lk">
		<div class="title">Меню<span class="ic_show">+</span><span class="ic_hide">-</span><span class="cursor_wrap"></span></div>
		<div class="block">
			<?foreach($arResult as $arItem){?>
				<a <?if($arItem["SELECTED"]){?>class="active"<?}?> href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
			<?}?>
		</div>
	</div>
<?endif?>