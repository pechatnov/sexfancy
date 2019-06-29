<?
function TestAgent(){


    echo 'TestAgent';

    return "TestAgent();";
}

function CsvUpload($name){
    $file = 'http://stripmag.ru/datafeed/'.$name.'.csv';
    file_put_contents($_SERVER["DOCUMENT_ROOT"].'/upload/'.$name.'.csv', file_get_contents($file));
}

function CsvSku(){
    $name = 'bitrix_stock';
    CsvUpload($name);
    return "CsvSku();";
}

function CsvItems(){
    $name = 'bitrix';
    CsvUpload($name);
    return "CsvItems();";
}

function CsvColors(){
    $name = 'bitrix_colors';
    CsvUpload($name);
    return "CsvColors();";
}

function CsvSkuPrice1(){
    $name = 'bitrix_stock_price';
    CsvUpload($name);
    return "CsvSkuPrice1();";
}

function CsvSkuPrice2(){
    $name = 'bitrix_stock_price';
    CsvUpload($name);
    return "CsvSkuPrice2();";
}

function CsvSkuPrice3(){
    $name = 'bitrix_stock_price';
    CsvUpload($name);
    return "CsvSkuPrice3();";
}