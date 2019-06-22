<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<?
global $USER;
if ($USER->IsAdmin()){


    /*function compareCsv($file){

        $arr = [];
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, false, ';')) !== FALSE) {

                $arr[] = $data[0];
            }
            fclose($handle);
        }
        sort($arr);

        return $arr;
    }


    $bitrix = compareCsv($_SERVER["DOCUMENT_ROOT"].'/upload/bitrix.csv');
    print_arr($bitrix);

    $bitrix_stock = compareCsv($_SERVER["DOCUMENT_ROOT"].'/upload/bitrix_stock.csv');
    print_arr($bitrix_stock);


    $result = array_diff($bitrix, $bitrix_stock);
    echo count($result);*/
    /*$file_name[] = 'bitrix';
    $file_name[] = 'bitrix_stock';
    $file_name[] = 'bitrix_stock_price';
    $file_name[] = 'bitrix_vendors';
    $file_name[] = 'bitrix_colors';


    foreach($file_name as $name){
        $file = 'http://stripmag.ru/datafeed/'.$name.'.csv';

        if(file_put_contents($_SERVER["DOCUMENT_ROOT"].'/upload/'.$name.'.csv', file_get_contents($file))){
            echo $name.' - ok<br>';
        }
    }*/


//echo $_SERVER["DOCUMENT_ROOT"];


    /*$file_name['bitrix'] = 'http://feed.p5s.ru/data/5c34b0fee9b1d3.81681689';
    $file_name['bitrix_stock'] = 'http://feed.p5s.ru/data/5c34b0fee9b1d3.81681689?stock';
    $file_name['bitrix_colors'] = 'http://stripmag.ru/datafeed/bitrix_colors.csv';


    foreach($file_name as $name => $path){

        file_put_contents($_SERVER["DOCUMENT_ROOT"].'/upload/'.$name.'.csv', file_get_contents($path));
    }*/
//phpinfo();
    ?>


    <?
    /*$myCurl = curl_init();
    curl_setopt_array($myCurl, array(
        CURLOPT_URL => 'http://api.ds-platforma.ru/order.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query([
            'ApiKey' => '5c34ac7cd0e0a0.68643494',
            'TestMode' => '1',
            'RollBack' => '2',
            'order' => '126-2,733-1'
        ])
    ));
    $response = curl_exec($myCurl);
    curl_close($myCurl);

    */?><!--<pre><?/*print_r($response)*/?></pre>--><?

    /*
    1 - "Ok", Запрос выполнен успешно. Заказ размещен.
    2 - "Bad key", Проверьте корректность Вашего ApiKey.
    3 - "Bad order request", Не корректные данные в поле order.
    4 - "Order do not placed. Some items not at stock OR some problem in aID.", Заказ не размещен, Либо каких-то товаров недостаточное количество на нашем складе, либо какие-то aID не найдены в нашей системе.
    5 - "TestMode. Data was checked. Order have NOT placed.". Включен тестовый режим. Данные проверены, но заказ не размещается.

    http://api.ds-platforma.ru/get_order_data.php?ApiKey=****&orderID=*...
    */



}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>