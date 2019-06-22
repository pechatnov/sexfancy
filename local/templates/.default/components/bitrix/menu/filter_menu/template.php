<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?if (!empty($arResult)):?>

	<div class="menu">
		<div class="title">
			<?=$arResult['TEXT']?>
			<span class="ic_show"></span>
			<span class="cursor_wrap"></span>
		</div>
		<div class="block">
			<?foreach($arResult['ITEMS'] as $arItem){?>
				<div class="item <?if($arItem["SELECTED"]) echo 'cur_dir active';?>">
					<span>
						<a class="main" href="<?=$arItem['LINK']?>"><?=$arItem['TEXT']?></a>
						<?if($arItem['ITEMS']){?><i></i><?}?>
					</span>
					<?if($arItem['ITEMS']){?>
						<div class="sub_block"">
							<?foreach($arItem['ITEMS'] as $arSubItem){?>
								<span class="<?if($arSubItem["SELECTED"]) echo 'active';?>">
									<a href="<?=$arSubItem['LINK']?>"><?=$arSubItem['TEXT']?></a>
								</span>
							<?}?>
						</div>
					<?}?>
				</div>
			<?}?>
		</div>
	</div>
<?endif?>