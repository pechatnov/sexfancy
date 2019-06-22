<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';



$strReturn .= '<div id="navigation" class="pagination_top" itemscope="" itemtype="https://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{

		$strReturn .= '
		<span class="item_breadcrumb" itemscope="" itemprop="itemListElement" itemtype="https://schema.org/ListItem">
			<a id="bx_breadcrumb_'.$index.'" href="'.$arResult[$index]["LINK"].'" itemprop="item" title="'.$title.'">
				<span itemprop="name">'.$title.'</span>
				<meta itemprop="position" content="'.($index + 1).'" />
			</a>
		</span>';
	}
	else
	{
		$strReturn .= '
		<span class="item_breadcrumb" itemscope="" itemprop="itemListElement" itemtype="https://schema.org/ListItem">
			<a href="'.$APPLICATION->GetCurPage().'" itemprop="item" title="'.$title.'" onclick="return false">
				<span itemprop="name">'.$title.'</span>
				<meta itemprop="position" content="'.($index + 1).'" />
			</a>
		</span>';
	}
}

$strReturn .= '</div>';

return $strReturn;
