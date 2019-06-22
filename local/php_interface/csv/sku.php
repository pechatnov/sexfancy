<?
require($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/csv/importCsv.php");
// /local/php_interface/csv/sku.php


$import = new ImportCsv;
$file = $_SERVER["DOCUMENT_ROOT"]."/upload/sku.csv";
echo $import->csvSku($file);