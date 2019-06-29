<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<?if($arResult["ITEMS"]){?>
	<div class="brands">
		<h2>Наши бренды</h2>
		<div class="block">
			<?foreach($arResult["ITEMS"] as $arItem){?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div>
					<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
							<img class="lazy_gif" data-original="<?=$arItem['IMG']['src']?>" alt="<?=$arItem['NAME']?>">
						</a>
					</div>
				</div>
			<?}?>
		</div>
	</div>
<?}?>