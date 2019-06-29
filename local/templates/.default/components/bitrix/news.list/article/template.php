<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>



<div class="article">
	<h2>Узнавайте новое</h2>
	<div class="block">
		<?foreach($arResult["ITEMS"] as $arItem){?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div>
				<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
						<img class="lazy" data-original="<?=$arItem['IMG']['src']?>" alt="<?=$arItem['NAME']?>">
						<span><?=$arItem['NAME']?></span>
					</a>
				</div>
			</div>
		<?}?>
	</div>
</div>