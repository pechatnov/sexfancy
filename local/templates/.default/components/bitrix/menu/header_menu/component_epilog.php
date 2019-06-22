<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?$this->__template->SetViewTarget('menu_320');?>
<?if (!empty($arResult['MENU'])):?>
    <div class="wrap">
        <?foreach($arResult['MENU'] as $arItem){?>
            <div class="item<?if($arItem["SELECTED"]) echo ' active';?>">
                    <span>
                        <a class="main<?if($arItem["SELECTED"]) echo ' active';?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                        <?if($arItem["ITEMS"]){?><i class="main_arr"></i><?}?>
                    </span>
                <?if($arItem["ITEMS"]){?>

                    <div class="sub_block">
                        <?foreach($arItem["ITEMS"] as $col){?>
                            <?foreach($col as $sub_item){?>

                                <div class="sub_item<?if($sub_item["SELECTED"]) echo ' active';?>">
                                        <span>
                                            <a <?if($sub_item["SELECTED"]){?>class="active"<?}?> href="<?=$sub_item["LINK"]?>"><?=$sub_item["TEXT"]?></a>
                                            <?if($sub_item["ITEMS"]){?><i class="sub_arr"></i><?}?>
                                        </span>
                                    <?if($sub_item["ITEMS"]){?>

                                        <div class="sub_sub_block">
                                            <?foreach($sub_item["ITEMS"] as $sub_sub_item){?>
                                                <span><a <?if($sub_sub_item["SELECTED"]){?>class="active"<?}?> href="<?=$sub_sub_item["LINK"]?>"><?=$sub_sub_item["TEXT"]?></a></span>
                                            <?}?>
                                        </div>
                                    <?}?>
                                </div>
                            <?}?>
                        <?}?>
                    </div>
                <?}?>
            </div>
        <?}?>
        <div class="item">
            <span><a class="main" href="/sale/">Скидки</a></span>
        </div>
    </div>
<?endif?>
<?$this->__template->EndViewTarget();?>