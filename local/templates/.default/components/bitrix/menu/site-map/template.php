<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>




<?if (!empty($arResult)):?>


	<div class="site_map">
		<?foreach($arResult as $arItem){?>
			<div class="item">
				<span><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></span>
				<?if($arItem['ITEMS']){?>
					<div class="block">
						<?foreach($arItem['ITEMS'] as $arItem2){?>
							<div class="item">
								<span><a href="<?=$arItem2["LINK"]?>"><?=$arItem2["TEXT"]?></a></span>
								<?if($arItem2['ITEMS']){?>
									<div class="block">
										<?foreach($arItem2['ITEMS'] as $arItem3){?>
											<div class="item hidden_child">
												<span><a href="<?=$arItem3["LINK"]?>"><?=$arItem3["TEXT"]?><?if($arItem3['ITEMS']){?><i></i><?}?></a></span>
												<?if($arItem3['ITEMS']){?>
													<div style="display: none" class="block">
														<?foreach($arItem3['ITEMS'] as $arItem4){?>
															<span><a href="<?=$arItem4["LINK"]?>"><?=$arItem4["TEXT"]?></a></span>
														<?}?>
													</div>
												<?}?>
											</div>
										<?}?>
									</div>
								<?}?>
							</div>
						<?}?>
					</div>
				<?}?>
			</div>
		<?}?>
	</div>


<?endif?>
