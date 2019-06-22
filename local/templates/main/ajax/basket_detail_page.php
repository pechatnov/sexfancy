<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");



//print_arr($_POST);

if(!$_POST['color'] || !$_POST['size']){

    $id_sku = $_POST['id_scu_1'];
}
else{

    $arFilter = Array('IBLOCK_ID' => IB_SKU, 'PROPERTY_CML2_LINK' => $_POST['id_product'], 'PROPERTY_COLOR' => $_POST['color'], 'PROPERTY_SIZE' => $_POST['size'], 'ACTIVE' => 'Y');
    $arSelect = Array('ID', 'NAME', 'PROPERTY_IMG1');
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    $ob = $res->GetNextElement();
    $arFields = $ob->GetFields();

    $id_sku = $arFields['ID'];
}


Add2BasketByProductID(
    $id_sku,
    1,
    false
);
?>
    <div class="window basket_win">
        <h3>Товар добавлен в корзину</h3>
        <div class="btn_block">
            <a class="cont" href="#">Продолжить покупки</a>
            <a class="move_cart" href="/personal/cart/">Перейти в корзину</a>
        </div>
    </div>
<?





?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>