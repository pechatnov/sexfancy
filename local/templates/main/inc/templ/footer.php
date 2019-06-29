<footer>
    <div class="inner">
        <div class="logo"><a href="/"></a></div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:sender.subscribe",
            "subscribe",
            array(
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CONFIRMATION" => "N",
                "HIDE_MAILINGS" => "N",
                "SET_TITLE" => "N",
                "SHOW_HIDDEN" => "N",
                "USER_CONSENT" => "N",
                "USER_CONSENT_ID" => "0",
                "USER_CONSENT_IS_CHECKED" => "N",
                "USER_CONSENT_IS_LOADED" => "N",
                "USE_PERSONALIZATION" => "N",
                "COMPONENT_TEMPLATE" => "subscribe"
            ),
            false
        );?>
        <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"footer_menu", 
	array(
		"COMPONENT_TEMPLATE" => "footer_menu",
		"ROOT_MENU_TYPE" => "footer",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
        <div class="contacts">
            <div class="block">
                <span>
                    <a href="tel:<?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/areas/phone.php');?>" class="phone">
                        <?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/areas/phone.php');?>
                    </a>
                </span>
                <span>
                    <a href="mailto:<?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/areas/mail.php');?>" class="mail">
                        <?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/areas/mail.php');?>
                    </a>
                </span>
            </div>
        </div>
        <div class="note"><span>18+</span>На сайте представлены товары для взрослых</div>
        <div class="copy">© <?=date('Y')?> SEXFANCY</div>
        <div class="social">
          <!--  <div class="title">Соцсети:</div>-->
            <div class="block">
                <a class="vk" target="_blank" href="https://vk.com/sexfancy"></a>
                <a class="inst" target="_blank" href="https://www.instagram.com/sexfancyshop"></a>
                <a class="teleg" target="_blank" href="https://telega.at/sexfancy"></a>
            </div>
        </div>
    </div>
</footer>
<?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/cookie_info.php');?>
<div id="win8_wrapper">
    <div class="windows8">
        <div class="wBall" id="wBall_1">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_2">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_3">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_4">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_5">
            <div class="wInnerBall"></div>
        </div>
    </div>
</div>
<script data-skip-moving="true">
    (function(w,d,u){
        var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://cdn.bitrix24.ru/b6781271/crm/site_button/loader_2_fytgf8.js');
</script>