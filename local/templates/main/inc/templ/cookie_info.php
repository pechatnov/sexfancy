<?
if($_COOKIE["cookie_info"] != 'Y')
{
    setcookie("cookie_info", 'Y', time()+1209600);
}
?>
<div class="cookie_info <?if($_COOKIE["cookie_info"] != 'Y'){?>active<?}?>">
    <div class="btn_close"></div>
    <div class="inner">«На этом веб-сайте используются файлы cookie, которые обеспечивают работу всех функций для наиболее эффективной навигации по странице. Если вы не хотите принимать постоянные файлы cookie, пожалуйста, выберите соответствующие настройки на своем компьютере. Продолжая навигацию по сайту, вы косвенно предоставляете свое согласие на использование файлов cookie на этом веб-сайте. Более подробная информация предоставляется в нашей <a target="_blank" href="/privacy-policy/">Политике конфиденциальности</a>.»</div>
</div>



<?/*
if($_COOKIE["close_info"] != 'Y')
{
    setcookie("close_info", 'Y', time()+3600);
}
*/?><!--
<div class="cookie_info <?/*if($_COOKIE["close_info"] != 'Y'){*/?>active<?/*}*/?>">
    <div class="btn_close"></div>
    <div class="inner">Сайт работает в тестовом режиме.</div>
</div>-->