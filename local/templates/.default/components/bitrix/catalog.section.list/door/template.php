<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>




<div class="catalog_section">
	<h2>Каталог</h2>
	<div class="block">
		<?foreach ($arResult['SECTIONS'] as $arSection){?>
			<?
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>
			<div class="item" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a href="<?=$arSection['SECTION_PAGE_URL']?>">
					<img src="<?=$arSection['IMG']['src']?>" alt="<?=$arSection['NAME']?>">
					<span><?=$arSection['NAME']?></span>
				</a>
			</div>
		<?}?>
		<div class="item">
			<a href="/sale/">
				<img src="<?=SITE_TEMPLATE_PATH?>/img/cat_sale.jpg" alt="Скидки">
				<span>Скидки</span>
			</a>
		</div>
		<div class="item">
			<a href="/brands/">
				<img src="<?=SITE_TEMPLATE_PATH?>/img/cat_sale.jpg" alt="Бренды">
				<span>Бренды</span>
			</a>
		</div>
	</div>
</div>