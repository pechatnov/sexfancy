<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="basket">
	<a id="refresh_basket" href="<?=$_SERVER["REQUEST_URI"]?>"></a>
	<?if($arResult['basket_count']){?>
		<span><?=$arResult['basket_count']?></span>
	<?}?>
	<a class="main" href="/personal/cart/"></a>
</div>
