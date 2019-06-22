<?
use Bitrix\Main\Page\Asset;



Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/bootstrap.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/js/fancy/jquery.fancybox.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/jquery-ui.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/jquery.mCustomScrollbar.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/fonts.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/style.css');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/prefixfree.min.js');


Asset::getInstance()->addString("<!--[if lt IE 9]>");
Asset::getInstance()->addString("<script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>");
Asset::getInstance()->addString("<script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>");
Asset::getInstance()->addString("<![endif]-->");


Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.min_1.11.0.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.mask.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery-ui.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.ui.touch-punch.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/bootstrap.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/bootstrap-select.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/jquery.mCustomScrollbar.concat.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/fancy/jquery.fancybox.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/slick.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/script.js');



if(!$USER->IsAdmin()){
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/onAjaxSuccess.js');
}
?>