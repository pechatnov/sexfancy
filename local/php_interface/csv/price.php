<?
require($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/csv/importCsv.php");
// /local/php_interface/csv/price.php


$import = new ImportCsv;
$file = $_SERVER["DOCUMENT_ROOT"]."/upload/price.csv";
echo $import->csvPrice($file);