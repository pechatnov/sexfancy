<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>




    <div class="poster error404">
        <a href="/">
            <img src="<?=SITE_TEMPLATE_PATH?>/img/404.jpg" alt="404">
        </a>
        <div class="error_404">
            <span class="numb">404</span>
            <span class="dsc">Страница не найдена</span>
            <a class="err" href="/">На главную</a>
        </div>
    </div>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>