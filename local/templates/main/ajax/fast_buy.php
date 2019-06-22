<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");


$arFilter = Array('IBLOCK_ID' => IB_PROD, 'ID' => $_POST['id_product'], 'ACTIVE' => 'Y');
$arSelect = Array(
    'ID',
    'NAME',
    'DETAIL_TEXT',
    'PROPERTY_VENDOR_ID',
    'PROPERTY_VENDOR_CODE',
    'PROPERTY_NEW',
    'PROPERTY_IMG1',
    'PROPERTY_IMG2',
    'PROPERTY_IMG3',
    'PROPERTY_IMG4',
    'PROPERTY_IMG5',
    'PROPERTY_IMG6',
    'PROPERTY_IMG7',
    'PROPERTY_IMG8',
    'PROPERTY_IMG9',
    'PROPERTY_IMG10',
    'PROPERTY_UNI_DESCR'
);
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
$ob = $res->GetNextElement();
$arResult = $ob->GetFields();


if($arResult['PROPERTY_IMG1_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG1_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG1_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTY_IMG2_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG2_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG2_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTY_IMG3_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG3_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG3_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTY_IMG4_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG4_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG4_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTY_IMG5_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG5_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG5_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTY_IMG6_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG6_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG6_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTY_IMG7_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG7_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG7_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTY_IMG8_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG8_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG8_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTY_IMG9_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG9_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG9_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
if($arResult['PROPERTY_IMG10_VALUE']){

    $arResult['IMG']['BIG'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG10_VALUE'], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult['IMG']['MINI'][] = CFile::ResizeImageGet($arResult['PROPERTY_IMG10_VALUE'], array('width'=>80, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
}



$arFilter_sku = Array('IBLOCK_ID' => IB_SKU, 'PROPERTY_CML2_LINK' => $_POST['id_product'], 'ACTIVE' => 'Y');
$arSelect_sku = Array('ID', 'NAME', 'PROPERTY_COLOR', 'PROPERTY_SIZE');
$res_sku = CIBlockElement::GetList(array(), $arFilter_sku, false, false, $arSelect_sku);
while($ob_sku = $res_sku->GetNextElement())
{
    $arFields_sku = $ob_sku->GetFields();
    $arResult['OFFERS'][] = $arFields_sku;
}


global $USER;
foreach($arResult['OFFERS'] as $offer){

    $price = CCatalogProduct::GetOptimalPrice($offer['ID'], 1, $USER->GetUserGroupArray());


    if($price['RESULT_PRICE']['PERCENT']) {
        $arResult['SALE_PERCENT'] = $price['RESULT_PRICE']['PERCENT'];
        $arResult['PRICES_SALE'][$offer['ID']] = number_format($price['RESULT_PRICE']['BASE_PRICE'], 0, '', ' ')." &#8381;";
    }
    $arResult['PRICES'][$offer['ID']] = number_format($price['RESULT_PRICE']['DISCOUNT_PRICE'], 0, '', ' ')." &#8381;";

}


if($arResult['OFFERS'][0]['PROPERTY_COLOR_VALUE']){
    $color = array();
    $arFilter = Array('IBLOCK_ID' => IB_COLOR, 'ACTIVE' => 'Y');
    $arSelect = Array('ID', 'NAME', 'PROPERTY_CODE', 'PROPERTY_IMG');
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $color[$arFields['PROPERTY_CODE_VALUE']]['code'] = $arFields['PROPERTY_CODE_VALUE'];
        $color[$arFields['PROPERTY_CODE_VALUE']]['val'] = CFile::GetPath($arFields['PROPERTY_IMG_VALUE']);
    }



    foreach($arResult['OFFERS'] as $offer){

        $arResult['COLOR'][ $color[ $offer['PROPERTY_COLOR_VALUE'] ]['code'] ]['color_val'] = $color[ $offer['PROPERTY_COLOR_VALUE'] ]['val'];
        $arResult['COLOR'][ $color[ $offer['PROPERTY_COLOR_VALUE'] ]['code'] ]['offers'][$offer['ID']]['id'] = $offer['ID'];
    }
}

if($arResult['OFFERS'][0]['PROPERTY_SIZE_VALUE']) {
    foreach($arResult['OFFERS'] as $offer) {

        $arResult['SIZE'][$offer['ID']] = $offer['PROPERTY_SIZE_VALUE'];
    }

    foreach($arResult['COLOR'] as $color_code => $arVal){

        foreach($arVal['offers'] as $id_offer => $val){

            if($arResult['SIZE'][$id_offer])
                $arResult['COLOR'][$color_code]['offers'][$id_offer]['size_val'] = $arResult['SIZE'][$id_offer];
        }
    }
}


?>


    <div class="fast_buy">
        <div class="photo_blk">
            <div class="mini_img">
                <div class="block">
                    <?foreach($arResult['IMG']['MINI'] as $img){?>
                        <div>
                            <div class="item"><img src="<?=$img['src']?>" alt="<?=$arResult['NAME']?>"></div>
                        </div>
                    <?}?>
                </div>
            </div>
            <div class="big_img">
                <?if($arResult['OFFERS'][0]['ITEM_PRICES'][0]['PERCENT'] || $arResult['PROPERTY_NEW_VALUE']){?>
                    <div class="icons">
                        <?if($arResult['SALE_PERCENT']){?>
                            <span class="sale">-<?=$arResult['SALE_PERCENT']?>%</span>
                        <?}?>
                        <?if($arResult['PROPERTY_NEW_VALUE']){?>
                            <span class="new">NEW</span>
                        <?}?>
                    </div>
                <?}?>
                <div class="block">
                    <?foreach($arResult['IMG']['BIG'] as $img){?>
                        <div>
                            <div class="item"><img src="<?=$img['src']?>" alt="<?=$arResult['NAME']?>"></div>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
        <div class="descr_blk">
            <input class="id_product" type="hidden" value="<?=$arResult['ID']?>">
            <input class="id_scu_1" type="hidden" value="<?=$arResult['OFFERS'][0]['ID']?>">

            <div class="name"><?=$arResult['NAME']?></div>
            <div class="article">Артикул: <?=$arResult['PROPERTY_VENDOR_CODE_VALUE']?>, ID: <?=$arResult['PROPERTY_VENDOR_ID_VALUE']?></div>
            <div class="in_stock">Товар в наличии</div>

            <div class="price">
                <?if($arResult['PRICES_SALE']){?>
                    <?$arKeys = array_keys($arResult['PRICES_SALE']);?>
                    <?foreach($arResult['PRICES_SALE'] as $offerId => $price){?>
                        <span offerId="<?=$offerId?>" class="sale<?if($offerId === $arKeys[0]){?> active<?}?>">
						<?=$price?>
					</span>
                    <?}?>
                <?}?>

                <?$arKeys = array_keys($arResult['PRICES']);?>
                <?foreach($arResult['PRICES'] as $offerId => $price){?>
                    <span offerId="<?=$offerId?>" <?if($offerId === $arKeys[0]){?>class="active"<?}?>>
					<?=$price?>
				</span>
                <?}?>
            </div>
            <div class="description">
                <?
                if($arResult['PROPERTY_UNI_DESCR_VALUE']['TEXT']){
                    echo $arResult['PROPERTY_UNI_DESCR_VALUE']['TEXT'];
                }else{
                    echo $arResult['DETAIL_TEXT'];
                }
                ?>
            </div>
            <?if($arResult['COLOR']){?>
                <div class="colors">
                    <?foreach($arResult['COLOR'] as $code => $color){?>

                        <a href="<?=$code?>" <?if($color === reset($arResult['COLOR'])){?>class="active"<?}?>>

                            <span class="color"><img src="<?=$color['color_val']?>" alt="<?=$code?>"></span>
                        </a>
                    <?}?>
                </div>
            <?}?>
            <?if($arResult['SIZE']){?>
                <?foreach($arResult['COLOR'] as $code => $color){?>
                    <div color_code="<?=$code?>" class="sizes <?if($color === reset($arResult['COLOR'])) echo 'active';?>">
                        <?foreach($color['offers'] as $val){?>
                            <a href="<?=$val['size_val']?>" class="<?if($val === reset($color['offers'])) echo 'active';?>"><?=$val['size_val']?></a>
                        <?}?>
                    </div>
                <?}?>
            <?}?>
            <div class="buy">
                <a href="#">В корзину</a>
            </div>
        </div>
    </div>
    <script>
        //pop_up fast_buy
        $('.fast_buy .big_img .block').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.fast_buy .mini_img .block',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        dots: true
                    }
                }
            ]
        });
        $('.fast_buy .mini_img .block').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.fast_buy .big_img .block',
            dots: false,
            arrows: true,
            focusOnSelect: true,
            vertical: true,
            responsive: [
                {
                    breakpoint: 999,
                    settings: {
                        vertical: false
                    }
                }
            ]
        });


        $('.fast_buy .colors a, .fast_buy .sizes a').on('click', function(e){

            e.preventDefault();

            $(this).parent().children().removeClass('active');
            $(this).addClass('active');
        });
        $('.fast_buy .colors a').on('click', function(e){

            e.preventDefault();

            var color = $(this).attr('href');

            $('.descr_blk .sizes').removeClass('active');
            $('.descr_blk .sizes[color_code = ' + color + ']').addClass('active');
        });

        $('.fast_buy .colors a, .fast_buy .sizes a').on('click', function(e){

            e.preventDefault();


            var id_product = $('.fast_buy .id_product').val();
            var color = $('.fast_buy .colors a.active').attr('href');
            var size = $('.fast_buy .sizes.active a.active').attr('href');

            $.ajax({
                type: "POST",
                url: "/local/templates/main/ajax/sku_price.php",
                data: ({
                    "id_product": id_product,
                    "color": color,
                    "size": size
                }),
                success: function (id) {
                    $('.descr_blk .price span').removeClass('active');
                    $('.descr_blk .price span[offerid = ' + id + ']').addClass('active');
                }
            });
        });
    </script>


<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>