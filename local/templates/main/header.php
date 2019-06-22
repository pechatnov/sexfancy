<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $USER;
/*if (!$USER->IsAdmin()){
    include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/errors.php');die();
}*/

global $APPLICATION;
$curPage = $APPLICATION->GetCurPage(true);
$dir = $APPLICATION->GetCurDir();
$path =  explode('/', $dir);

if($path[1] == 'article'){
    $article_detail = preg_match("/.html/", $curPage);
}else{
    $article_detail = false;
}
if($path[1] == 'catalog'){
    $catalog = true;
    $catalog_detail = preg_match("/.html/", $curPage);
}else{
    $catalog = false;
    $catalog_detail = false;
}
$canonical = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$noindex = false;
if($path[1] == 'personal' || $path[1] == 'auth'){
    $noindex = true;
}
?>
<!DOCTYPE HTML>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="e55b347c208f69ed">
    <meta name="google-site-verification" content="YR6efDl4Z6exQXYam2vB9IwC59tFDjxJgr2ZeIkcyRc">
    <?if($noindex){?><meta name="robots" content="noindex, nofollow"><?}?>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle()?></title>

    <?if($catalog){
        $APPLICATION->ShowViewContent('canonical');
    }else{?>
        <link rel="canonical" href="<?=$canonical?>">
    <?}?>

    <?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/assets.php');?>
    <?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/favicon.php');?>
    <?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/counters.php');?>
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<div id="wrapper">
    <?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/header.php');?>
    <div class="main_content">
        <div id="buffer"></div>
        <?
        if(!($curPage == '/index.php' || ERROR_404 == 'Y' || $article_detail)){
            if($path[1] == 'catalog'){
                echo '<div class="catalog_breadcrumb">';
            }
            include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/breadcrumb.php');
            if($path[1] == 'catalog'){
                echo '</div>';
            }
        }
        ?>
        <?if(!($curPage == '/index.php' || $article_detail || $path[1] == 'catalog')){?>
            <h1 id="pagetitle"><?$APPLICATION->ShowTitle(false)?></h1>
        <?}?>
        