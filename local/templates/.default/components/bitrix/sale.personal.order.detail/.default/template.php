<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

if ($arParams['GUEST_MODE'] !== 'Y')
{
	Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/script.js");
	Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/style.css");
}
$this->addExternalCss("/bitrix/css/main/bootstrap.css");

CJSCore::Init(array('clipboard', 'fx'));

$APPLICATION->SetTitle("");

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach ($arResult['ERRORS']['FATAL'] as $error)
	{
		ShowError($error);
	}

	$component = $this->__component;

	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}
}
else
{
	if (!empty($arResult['ERRORS']['NONFATAL']))
	{
		foreach ($arResult['ERRORS']['NONFATAL'] as $error)
		{
			ShowError($error);
		}
	}
	?>
	<div class="personal_area">
		<?include($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/inc/templ/menu_lk.php');?>
		<div class="cont_lk">
			<div class="list_orders_detail">
				<!--<h2 class="sale-order-detail-title-element">
					<?/*= Loc::getMessage('SPOD_LIST_MY_ORDER', array(
						'#ACCOUNT_NUMBER#' => htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"]),
						'#DATE_ORDER_CREATE#' => $arResult["DATE_INSERT_FORMATED"]
					)) */?>
				</h2>-->
				<a class="go_back" href="<?= htmlspecialcharsbx($arResult["URL_TO_LIST"]) ?>">
					<?= Loc::getMessage('SPOD_RETURN_LIST_ORDERS') ?>
				</a>
				<div class="big_block">
					<div class="title">
						<?= Loc::getMessage('SPOD_SUB_ORDER_TITLE', array(
							"#ACCOUNT_NUMBER#"=> htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"]),
							"#DATE_ORDER_CREATE#"=> $arResult["DATE_INSERT_FORMATED"]
						))?>
						<?= count($arResult['BASKET']);?>
						<?
						$count = count($arResult['BASKET']) % 10;
						if ($count == '1')
						{
							echo Loc::getMessage('SPOD_TPL_GOOD');
						}
						elseif ($count >= '2' && $count <= '4')
						{
							echo Loc::getMessage('SPOD_TPL_TWO_GOODS');
						}
						else
						{
							echo Loc::getMessage('SPOD_TPL_GOODS');
						}
						?>
						<?=Loc::getMessage('SPOD_TPL_SUMOF')?>
						<?=$arResult["PRICE_FORMATED"]?>
					</div>

					<div class="block">
						<div class="sub_block">

							<div class="title"><?= Loc::getMessage('SPOD_LIST_ORDER_INFO') ?></div>

							<table class="info">
								<thead>
								<tr>
									<td>
										<?
										$userName = $arResult["USER_NAME"];
										if (strlen($userName) || strlen($arResult['FIO']))
										{
											echo Loc::getMessage('SPOD_LIST_FIO').':';
										}
										else
										{
											echo Loc::getMessage('SPOD_LOGIN').':';
										}
										?>
									</td>
									<td>
										<?= Loc::getMessage('SPOD_LIST_CURRENT_STATUS', array(
											'#DATE_ORDER_CREATE#' => $arResult["DATE_INSERT_FORMATED"]
										)) ?>
									</td>
									<td>
										<?= Loc::getMessage('SPOD_ORDER_PRICE')?>:
									</td>
									<td></td>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										<?
										if (strlen($userName))
										{
											echo htmlspecialcharsbx($userName);
										}
										elseif (strlen($arResult['FIO']))
										{
											echo htmlspecialcharsbx($arResult['FIO']);
										}
										else
										{
											echo htmlspecialcharsbx($arResult["USER"]['LOGIN']);
										}
										?>
									</td>
									<td>
										<?
										if ($arResult['CANCELED'] !== 'Y')
										{
											echo htmlspecialcharsbx($arResult["STATUS"]["NAME"]);
										}
										else
										{
											echo Loc::getMessage('SPOD_ORDER_CANCELED');
										}
										?>
									</td>
									<td>
										<?= $arResult["PRICE_FORMATED"]?>
									</td>
									<td>
										<?
										if ($arParams['GUEST_MODE'] !== 'Y'){
											?>
											<a href="<?=$arResult["URL_TO_COPY"]?>">
												<?= Loc::getMessage('SPOD_ORDER_REPEAT') ?>
											</a>
											<?
											if ($arResult["CAN_CANCEL"] === "Y")
											{
												?>

												<a href="/personal/order/?ID=<?=$arResult["ACCOUNT_NUMBER"]?>&CANCEL=Y">
													<?= Loc::getMessage('SPOD_ORDER_CANCEL') ?>
												</a>
												<?
											}
										}
										?>
									</td>
								</tr>
								</tbody>
							</table>
						</div>

						<div class="sub_block">
							<div class="title"><?= Loc::getMessage('SPOD_ORDER_BASKET')?></div>
							<table class="goods">
								<thead>
									<tr>
										<th><?= Loc::getMessage('SPOD_NAME')?></th>
										<th><?= Loc::getMessage('SPOD_PRICE')?></th>
										<th><?= Loc::getMessage('SPOD_QUANTITY')?></th>
										<th><?= Loc::getMessage('SPOD_ORDER_PRICE')?></th>
									</tr>
								</thead>
								<tbody>
									<?
									foreach ($arResult['BASKET'] as $basketItem)
									{
										?>
										<tr>
											<td>
												<img src="<?=$arResult['IMG'][$basketItem['PARENT']['ID']]?>">
												<span><?=htmlspecialcharsbx($basketItem['NAME'])?></span>
											</td>
											<td><?=$basketItem['BASE_PRICE_FORMATED']?></td>
											<td><?=$basketItem['QUANTITY']?>&nbsp;
												<?
												if (strlen($basketItem['MEASURE_NAME']))
												{
													echo htmlspecialcharsbx($basketItem['MEASURE_NAME']);
												}
												else
												{
													echo Loc::getMessage('SPOD_DEFAULT_MEASURE');
												}
												?></td>
											<td><?=$basketItem['FORMATED_SUM']?></td>
										</tr>
										<?
									}
									?>
								</tbody>
							</table>
							<div class="total">

								<div class="item">
									<span><?= Loc::getMessage('SPOD_DELIVERY')?>:</span>
									<span class="bold"><?= $arResult["PRICE_DELIVERY_FORMATED"] ?></span>
								</div>
								<div class="item">
									<span><?= Loc::getMessage('SPOD_SUMMARY')?>:</span>
									<span class="bold"><?=$arResult['PRICE_FORMATED']?></span>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<?
	$javascriptParams = array(
		"url" => CUtil::JSEscape($this->__component->GetPath().'/ajax.php'),
		"templateFolder" => CUtil::JSEscape($templateFolder),
		"templateName" => $this->__component->GetTemplateName(),
		"paymentList" => $paymentData
	);
	$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
	?>
	<script>
		BX.Sale.PersonalOrderComponent.PersonalOrderDetail.init(<?=$javascriptParams?>);
	</script>
<?
}
?>

