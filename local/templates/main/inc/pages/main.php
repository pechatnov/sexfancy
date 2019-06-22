<div class="poster">
    <div class="block">
        <div>
            <div class="item">
                <a href="/catalog/param/">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/top_foto_1200.jpg" alt="bdsm">
                </a>
            </div>
        </div>
        <div>
            <div class="item">
                <a href="/catalog/param/">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/vibrator_top.jpg" alt="vibrators">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="catalog_section">
    <h2>Каталог</h2>
    <div class="block">
        <div class="item">
            <a href="/catalog/zhenshchinam/">
                <img src="/upload/resize_cache/iblock/8cb/386_257_2/8cb6e47d42cf5ce414d3efff2241846f.jpeg" alt="Женщинам">
                <span>Женщинам</span>
            </a>
        </div>
        <div class="item">
            <a href="/catalog/muzhchinam/">
                <img src="/upload/resize_cache/iblock/b97/386_257_2/b97d0f0fcb48f8d3e83721b939da1b62.jpeg" alt="Мужчинам">
                <span>Мужчинам</span>
            </a>
        </div>
        <div class="item">
            <a href="/catalog/vse-dlya-seksa/">
                <img src="/upload/resize_cache/iblock/ba6/386_257_2/ba685cfc6f9811c7ae36173be8aff8a1.jpeg" alt="Все для секса">
                <span>Все для секса</span>
            </a>
        </div>
        <div class="item">
            <a href="/catalog/eroticheskaya-odezhda/">
                <img src="/upload/iblock/c5f/c5feeb9a8d7a31bcadb86c11aff9ccfb.jpeg" alt="Эротическая одежда">
                <span>Эротическая одежда</span>
            </a>
        </div>
        <div class="item">
            <a href="/catalog/param/">
                <img src="/upload/iblock/56b/56b1e389b812e7884c11c4306c33dbdc.jpeg" alt="Парам">
                <span>Парам</span>
            </a>
        </div>
        <div class="item">
            <a href="/catalog/sale/">
                <img src="/upload/resize_cache/iblock/a08/386_257_2/a08619bd20c7365416a53cd9b670a6aa.jpeg" alt="Sale">
                <span>Sale</span>
            </a>
        </div>
    </div>
</div>
<div class="advantage">
    <h2>Наши преимущества</h2>
    <div class="block">
        <div class="item">
            <div class="img">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/adv_location.svg" alt="">
            </div>
            <span><b>Бесплатная доставка </b> по РФ от 3999 руб.</span>
        </div>
        <div class="item">
            <div class="img">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/adv_money.svg" alt="">
            </div>
            <span>Оплата при получении</span>
        </div>
        <div class="item">
            <div class="img">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/adv_vibrator.svg" alt="">
            </div>
            <span>Более 18 000 товаров</span>
        </div>
        <div class="item">
            <div class="img">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/adv_confed.svg" alt="">
            </div>
            <span>Гарантия конфидециальности</span>
        </div>
    </div>
</div>
<?
$pops = array();
$arFilter = Array('IBLOCK_ID' => IB_POP, 'ACTIVE' => 'Y');
$arSelect = Array('ID', 'NAME', 'CODE', 'PROPERTY_POP');
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $pops[] = $arFields;
}
if($pops){

	$GLOBALS['arrFilter'] = array('ID' => $pops[0]['PROPERTY_POP_VALUE']);
}
else{
	$GLOBALS['arrFilter'] = array('ID' => false);
}
?>
<?if($pops){?>
<div class="popul">
	<h2>Популярное</h2>
	<?include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/inc/templ/slider.php");?>
</div>
<?}?>

<div class="about_us">
    <h2>О нас</h2>
    <p>
        Рады приветствовать Вас в нашем интернет-магазине для взрослых <a href="/">Sexfancy.ru</a>. Мы поможем
        реализовать ваши сексуальные фантазии и и испытать незабываемые ощущения.
        Огромное количество секс-товаров, представленных в нашем каталоге, способно
        удовлетворить потребности каждого покупателя. В ассортименте представлены вибраторы,
        фаллоимитаторы, страпоны, мастурбаторы, помпы для груди / клитора / пениса,
        БДСМ-атрибутика, сексуальное белье, костюмы для ролевых игр, анальные игрушки,
        смазки и множество других интересных «штучек». В сексшопе <a href="/">Sexfancy.ru</a> представлены
        товары разных ценовых категорий, здесь вы сможете найти как недорогие секс-игрушки,
        так и девайсы от именитых брендов.
    </p>
    <p>
        Акции и скидки, проводимые на ту или иную категорию товаров, позволяют приобрести
        желаемое устройство по более привлекательной цене. Так как снижение прайса на такие
        товары носит временный характер, мы рекомендуем <a href="#">подписаться</a> на новостную рассылку,
        чтобы вовремя узнавать о скидках и акциях.
    </p>
    <p>
        Не знаете какую смазку выбрать? Не можете разобраться как работает устройство?
        Воспользуйтесь кнопкой обратной связи внизу каждой страницы — и мы ответим на
        интересующие Вас вопросы.
    </p>
    <p>
        Указанные на сайте цены окончательные, дополнительно оплачивается только доставка —
        300 руб по всей России, если сумма заказа менее 5000 руб. (*Самовывоз из пункта выдачи
        в г. Москва бесплатно). По территории страны доставка осуществляется курьерами CDEK
        и через постоматы PickPoint. В Москве доступен пункт самовывоза и курьерская доставка.
        Конфиденциальность в интернет-сексшопе <a href="/">Sexfancy.ru</a> стоит в приоритете. Поэтому мы не
        размещаем на упаковке заказа никаких компрометирующих отметок, будь то логотип,
        название магазина, информация о содержимом и тому подобное.
        Узнать что-то новое и получить полезную информацию о секс-веяниях, игрушках и прочее
        можно в разделе <a href="#">Статьи</a>.
    </p>
    <p>Приятных покупок!</p>
</div>
<div class="brands">
    <h2>Наши бренды</h2>
    <div class="block">
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/avanua.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/coquette.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/cosmir.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/doc_johnson.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/erolanta.gif" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/erotic.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/eska.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/flirtON.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/hustler.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/idel_group.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/impoy.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/laboratory.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/le_frivove.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/avanua.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/lelo.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/love_toy.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/mens_max.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/mif.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/orion.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/parfum_prestizh.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/pico_bond.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/pipedream.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/pjur.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/seven.png" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/shirly.png" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/sitabella.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/spring.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/sundress.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/swiss_navy.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/topco_sales.png" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/toyfa.jpg" alt="avanua"></div></div>
        <div><div class="item"><img src="<?=SITE_TEMPLATE_PATH?>/img/brands/we_vibe.jpg" alt="pico_bond"></div></div>
    </div>
</div>

