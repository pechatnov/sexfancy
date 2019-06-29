<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if (!empty($arResult)):?>

	<div class="menu">
		<div class="title">Меню<span class="ic_show"></span><span class="cursor_wrap"></span></div>
		<div class="block">
			<?foreach($arResult['MENU'] as $arItem){?>
				<div class="item <?if($arItem["SELECTED"]) echo 'cur_dir active';?>">
					<span>
						<a class="main" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
					</span>
				</div>
			<?}?>
		</div>
	</div>
	<script>
		$('aside .menu .title span').on('click', function(){


			$(this).parents('.menu').toggleClass('active');
			$(this).parents('.menu').children('.block').slideToggle();
		});
		$('aside .filter_title span').on('click', function(){


			$(this).parents('.filter').toggleClass('active');
			$(this).parents('.filter').children('form').slideToggle();
		});
		$('aside .menu .item i').on('click', function(){


			$(this).parents('.item').toggleClass('active');
		});
	</script>
<?endif?>