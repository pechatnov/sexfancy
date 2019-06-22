<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if($_POST){

    $option['asc'] = 'desc';
    $option['desc'] = 'asc';

    $_POST['VAL'] = $option[$_POST['VAL']];

    $_SESSION['CATALOG_SORT']['TYPE'] = $_POST['TYPE'];
    $_SESSION['CATALOG_SORT']['VAL'] = $_POST['VAL'];
}