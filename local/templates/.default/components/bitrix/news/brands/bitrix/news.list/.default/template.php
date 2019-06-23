<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

	<style>
		#wrapper .main_content .catalog_section_popul .block .item a{
			display: flex;
			align-items: center;
		}
		#wrapper .main_content .catalog_section_popul .block .item a:before{
			display: none;
		}
		#wrapper .main_content .catalog_section_popul .block .item a img{
			height: auto;
		}

	</style>
<?if($arResult["ITEMS"]){?>
	<div class="catalog_section_popul">
		<div class="block">
			<?foreach($arResult["ITEMS"] as $arItem){?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
						<img src="<?=$arItem['IMG']['src']?>" alt="<?=$arItem['NAME']?>">
						<!--<span><?/*=$arItem['NAME']*/?></span>-->
					</a>
				</div>
			<?}?>
		</div>
	</div>
<?}?>