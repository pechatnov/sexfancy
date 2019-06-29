<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->AddChainItem("Заказ №".$arResult["ACCOUNT_NUMBER"]);
$APPLICATION->SetTitle("Заказ №".$arResult["ACCOUNT_NUMBER"], false);