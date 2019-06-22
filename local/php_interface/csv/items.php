<?
require($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/csv/importCsv.php");
// /local/php_interface/csv/items.php


$import = new ImportCsv;
$file = $_SERVER["DOCUMENT_ROOT"]."/upload/items.csv";
echo $import->csvItems($file);