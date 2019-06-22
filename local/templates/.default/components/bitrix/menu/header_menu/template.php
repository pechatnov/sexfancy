<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if (!empty($arResult['MENU'])):?>
	<div class="menu">
		<nav itemscope itemtype="http://schema.org/SiteNavigationElement">
			<a id="btn_1000" class="btn_1000" href="#"><span></span><span></span><span></span></a>
			<div class="block">
				<?foreach($arResult['MENU'] as $key => $arItem){?>
					<?
					$colDiv = false;
					if($key == 1 || $key == 3) $colDiv = true;
					?>

					<div class="item">
						<a class="main" itemprop="url" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
						<?if($arItem["ITEMS"]){?>

							<div class="sub_block">
								<?foreach($arItem["ITEMS"] as $col){?>

									<?if($colDiv){?><div class="col"><?}?>

									<?foreach($col as $key_sub_item => $sub_item){?>

										<?
										$colDivClose = false;
										if($arItem["TEXT"] == 'Игрушки' && ($key_sub_item == 1 || $key_sub_item == 2 || $key_sub_item == 3 || $key_sub_item == 4)){
											$colDivClose = true;
										}
										?>

										<?if(!$colDiv && !$colDivClose){?><div class="col"><?}?>
										<?if($arItem["TEXT"] == 'Игрушки' && ($key_sub_item == 1 || $key_sub_item == 3)){?><div class="col"><?}?>

										<div class="sub_item">
											<span><a href="<?=$sub_item["LINK"]?>"><?=$sub_item["TEXT"]?></a></span>

											<?if($sub_item['ITEMS']){?>
												<?foreach($sub_item['ITEMS'] as $sub_sub_item){?>
													<div class="sub_sub_item">
														<span><a href="<?=$sub_sub_item["LINK"]?>"><?=$sub_sub_item["TEXT"]?></a></span>
													</div>
												<?}?>
											<?}?>
										</div>

										<?if(!$colDiv && !$colDivClose){?></div><?}?>
										<?if($arItem["TEXT"] == 'Игрушки' && ($key_sub_item == 2 || $key_sub_item == 4)){?></div><?}?>

									<?}?>

									<?if($colDiv){?></div><?}?>
								<?}?>
							</div>
						<?}?>
					</div>
				<?}?>
				<div class="item">
					<a class="main" itemprop="url" href="/sale/">Скидки</a>
				</div>
			</div>
		</nav>
	</div>
<?endif?>