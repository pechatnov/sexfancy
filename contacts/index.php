<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Контакты интернет-магазина Sexfancy и адрес пункта самовывоза в г. Москва");
$APPLICATION->SetPageProperty("title", " Контакты интернет-магазина Sexfancy");
$APPLICATION->SetTitle("Контакты");
?>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script>
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [55.705939, 37.646597],
                    zoom: 16,
                    controls: ['zoomControl', 'typeSelector']
                }, {
                    searchControlProvider: 'yandex#search'
                }),
                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                }, {
                    iconLayout: 'default#image',
                    iconImageHref: '/local/templates/main/img/marker.png',
                    iconImageSize: [63, 57],
                    iconImageOffset: [-22, -57]
                });

            myMap.geoObjects.add(myPlacemark);


            myMap.controls.remove('geolocationControl');
            myMap.controls.remove('searchControl');
            myMap.controls.remove('trafficControl');
            myMap.controls.remove('typeSelector');
            myMap.controls.remove('fullscreenControl');
            myMap.controls.remove('rulerControl');
            myMap.behaviors.disable(['scrollZoom']);
        });
    </script>

    <div class="text_block">
        <p>
            По всем интересующим вопросам Вы можете обращаться в форму обратной связи, на электронную почту <a href="mailto:<?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/areas/mail.php');?>"><?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/areas/mail.php');?></a>, по телефону <a href="tel:<?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/areas/phone.php');?>"><?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/areas/phone.php');?></a>.
        </p>
        <p>
            Пункт самовывоза находится по адресу: г. Москва, ул. Автозаводская, дом 16, корп 2, стр 8 (склад компании "Поставщик Счастья").
        </p>
    </div>
    <div class="contacts_page">
        <div class="requisites">
            <table>
                <tbody>
                <tr class="title">
                    <td colspan="2">Юридическая информация</td>
                </tr>
                <tr>
                    <td>Название</td>
                    <td>ИП Печатнова Наталья Александровна</td>
                </tr>
                <tr>
                    <td>ОГРНИП</td>
                    <td>319366800014362</td>
                </tr>
                <tr>
                    <td>ИНН</td>
                    <td>360601075984</td>
                </tr>
                <tr class="title">
                    <td colspan="2">Банковские реквизиты</td>
                </tr>
                <tr>
                    <td>Банк</td>
                    <td>Центрально-Черноземный Банк ПАО СБЕРБАНК</td>
                </tr>
                <tr>
                    <td>БИК</td>
                    <td>042007681</td>
                </tr>
                <tr>
                    <td>К/С</td>
                    <td>30101810600000000681</td>
                </tr>
                <tr>
                    <td>Р/С</td>
                    <td>40802810813000025643</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div id="map" class="map"></div>
    </div>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>