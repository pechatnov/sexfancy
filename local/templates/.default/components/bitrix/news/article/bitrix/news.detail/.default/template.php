<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<?if($arResult['IMG']['src']){?>
	<div class="poster mini">
		<img src="<?=$arResult['IMG']['src']?>" alt="<?=$arResult['NAME']?>">
		<img src="<?=$arResult['IMG_320']['src']?>" alt="<?=$arResult['NAME']?>">
	</div>
<?}?>

<?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/breadcrumb.php');?>

<div class="article_detail">
	<div class="list_artic">
		<div class="title">Все статьи<span class="ic_show">+</span><span class="ic_hide">-</span><span class="cursor_wrap"></span></div>
		<div class="block">
			<?foreach($arResult['SECTIONS'] as $arSection){?>
				<a <?if($arSection['DETAIL_PAGE_URL'] == $arResult['DETAIL_PAGE_URL']){?>class="active"<?}?> href="<?=$arSection['DETAIL_PAGE_URL']?>">
					<?=$arSection['NAME']?>
				</a>
			<?}?>
		</div>
	</div>

	<div class="text_artic">
		<h1><?=$arResult['NAME']?></h1>

		<?=$arResult['~DETAIL_TEXT']?>

		<?if($arResult['PROPERTIES']['BTN_NAME']['VALUE'] && $arResult['PROPERTIES']['URL']['VALUE']){?>
			<div class="go_to_shop">
				<a href="<?=$arResult['PROPERTIES']['URL']['VALUE']?>"><?=$arResult['PROPERTIES']['BTN_NAME']['VALUE']?></a>
			</div>
		<?}?>

	</div>
	<div class="clearfix"></div>
</div>