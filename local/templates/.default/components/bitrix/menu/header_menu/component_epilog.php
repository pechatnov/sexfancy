<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?$this->__template->SetViewTarget('menu_320');?>
<?if (!empty($arResult['MENU'])):?>
    <div class="wrap">

        <div class="item catalog">
            <span>
                <a class="main" href="/catalog/">Каталог</a>
                <i class="main_arr"></i>
            </span>
            <div class="sub_block">
                <?foreach($arResult['MENU'] as $col){?>

                    <?foreach($col as $arItem){?>

                        <div class="sub_item">
                            <span><a href="<?=$arItem['LINK']?>"><?=$arItem['TEXT']?></a></span>
                        </div>
                    <?}?>
                <?}?>
            </div>
        </div>
        <div class="item sale">
            <span><a class="main" href="/sale/">Скидки</a></span>
        </div>
        <div class="item brands">
            <span>
                <a class="main" href="/brands/">Бренды</a>
                <i class="main_arr"></i>
            </span>
            <div class="sub_block">
                <?foreach($arResult['BRANDS'] as $col){?>

                    <?foreach($col as $arItem){?>

                        <div class="sub_item">
                            <span><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></span>
                        </div>
                    <?}?>
                <?}?>
            </div>
        </div>
        <div class="item info">
            <span>
                <a class="main" href="/help/">Информация</a>
                <i class="main_arr"></i>
            </span>
            <div class="sub_block">
                <div class="sub_item">
                    <span><a href="/payment-shipping/">Оплата и доставка</a></span>
                    <span><a href="/how-order/">Как заказать</a></span>
                    <span><a href="/privacy-policy/">Конфиденциальность</a></span>
                    <span><a href="/conditions-return/">Условия возврата</a></span>
                    <span><a href="/article/">Статьи</a></span>
                    <span><a href="/contacts/">Контакты</a></span>
                </div>
            </div>
        </div>
    </div>
<?endif?>
<?$this->__template->EndViewTarget();?>