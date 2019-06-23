<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if (!empty($arResult['MENU'])):?>
	<div class="menu">
		<nav itemscope itemtype="http://schema.org/SiteNavigationElement">
			<a id="btn_1000" class="btn_1000" href="#"><span></span><span></span><span></span></a>
			<div class="block">
				<div class="item catalog">
					<a class="main" itemprop="url" href="/catalog/">Каталог</a>
					<div class="sub_block">

						<?foreach($arResult['MENU'] as $col){?>

							<div class="col">

								<div class="sub_item">

									<?foreach($col as $arItem){?>

										<div class="sub_sub_item">
											<span><a itemprop="url" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></span>
										</div>

									<?}?>
								</div>
							</div>
						<?}?>
					</div>
				</div>
				<div class="item sale">
					<a class="main" itemprop="url" href="/sale/">Скидки</a>
				</div>
				<div class="item brands">
					<a class="main" itemprop="url" href="/brands/">Бренды</a>
					<div class="sub_block">

						<?foreach($arResult['BRANDS'] as $col){?>

							<div class="col">

								<div class="sub_item">

									<?foreach($col as $arItem){?>

										<div class="sub_sub_item">
											<span><a itemprop="url" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></span>
										</div>

									<?}?>
								</div>
							</div>
						<?}?>
					</div>
				</div>
				<div class="item info">
					<a class="main" href="/help/">Информация</a>
					<div class="sub_block">
						<div class="col">
							<div class="sub_item">
								<div class="sub_sub_item">
									<span><a href="/payment-shipping/">Оплата и доставка</a></span>
								</div>
								<div class="sub_sub_item">
									<span><a href="/how-order/">Как заказать</a></span>
								</div>
								<div class="sub_sub_item">
									<span><a href="/privacy-policy/">Конфиденциальность</a></span>
								</div>
								<div class="sub_sub_item">
									<span><a href="/conditions-return/">Условия возврата</a></span>
								</div>
								<div class="sub_sub_item">
									<span><a href="/article/">Статьи</a></span>
								</div>
								<div class="sub_sub_item">
									<span><a href="/contacts/">Контакты</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
<?endif?>