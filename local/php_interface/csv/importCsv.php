<?
//$import = new ImportCsv;
//$file = $_SERVER["DOCUMENT_ROOT"]."/upload/items.csv";";
//$import->csvItems($file);

//csvItems
//csvSku
//csvCount

//[0] => prodid
//[1] => vendor_id
//[2] => vendor_code
//[3] => name
//[4] => description
//[5] => img1
//[6] => img2
//[7] => img3
//[8] => img4
//[9] => img5
//[10] => img6
//[11] => img7
//[12] => img8
//[13] => img9
//[14] => img10
//[15] => batteries
//[16] => pack
//[17] => material
//[18] => length
//[19] => diameter
//[20] => collection
//[21] => categories_1
//[22] => categories_2
//[23] => categories_3
//[24] => bestseller
//[25] => new
//[26] => function
//[27] => addfunction
//[28] => vibration
//[29] => volume
//[30] => modelyear
//[31] => infoprice
//[32] => img_status

//[0] => prodid
//[1] => sku
//[2] => barcode
//[3] => name
//[4] => qty
//[5] => shippingdate
//[6] => weight
//[7] => color
//[8] => size
//[9] => currency
//[10] => price
//[11] => basewholeprice
//[12] => p5s_stock
//[13] => SuperSale
//[14] => StopPromo

//[0] => prodid
//[1] => sku
//[2] => qty
//[3] => shippingdate
//[4] => currency
//[5] => price
//[6] => basewholeprice
//[7] => p5s_stock
//[8] => SuperSale
//[9] => StopPromo

set_time_limit(0);

class ImportCsv
{
    //Получение привязки к разделам у товара
    public function getItemSection($id)
    {
        $sections = [];
        $ob = CIBlockElement::GetElementGroups($id, true, ['ID', 'NAME']);
        while($res = $ob->Fetch()){

            $sections[$res['NAME']] = $res['ID'];
        }

        return $sections;
    }

    //Проверка хеша для товаров
    public function isEditHashItems($id, $hash)
    {

        $filter = ['IBLOCK_ID' => IB_PROD, 'ID' => $id];
        $select = ['PROPERTY_HASH'];
        $ob = CIBlockElement::getList(false, $filter, false, false, $select);
        $res = $ob->Fetch();

        if($res['PROPERTY_HASH_VALUE'] !== $hash){

            return 'edit';
        }else{
            return false;
        }
    }

    //Проверка хеша для торговых предложений
    public function isEditHashSku($id, $hash)
    {

        $filter = ['IBLOCK_ID' => IB_SKU, 'ID' => $id];
        $select = ['PROPERTY_HASH'];
        $ob = CIBlockElement::getList(false, $filter, false, false, $select);
        $res = $ob->Fetch();

        if($res['PROPERTY_HASH_VALUE'] !== $hash){

            return 'edit';
        }else{
            return false;
        }
    }

    //Проверка хеша для торговых предложений (только цены и количество)
    public function isEditHashSkuCount($id, $hash)
    {

        $filter = ['IBLOCK_ID' => IB_SKU, 'ID' => $id];
        $select = ['PROPERTY_HASH_COUNT'];
        $ob = CIBlockElement::getList(false, $filter, false, false, $select);
        $res = $ob->Fetch();

        if($res['PROPERTY_HASH_COUNT_VALUE'] !== $hash){

            return 'edit';
        }else{
            return false;
        }
    }

    //Получение списка разделов
    public function getSectionID()
    {
        $sectionsID = [];
        $filter = ['IBLOCK_ID' => IB_PROD];
        $select = ['IBLOCK_ID','ID','NAME','DEPTH_LEVEL'];
        $order = ['DEPTH_LEVEL'=>'ASC','SORT'=>'ASC'];
        $ob = CIBlockSection::GetList($order, $filter, false, $select);
        while($res = $ob->Fetch()) {
            $sectionsID[$res['ID']] = $res['NAME'];
        }

        return $sectionsID;
    }

    //Получение списка товаров
    public function getItemsID()
    {
        $itemsID = [];
        $filter = ['IBLOCK_ID' => IB_PROD];
        $select = ['IBLOCK_ID', 'ID', 'NAME', 'PROPERTY_PRODID', 'IBLOCK_SECTION_ID'];
        $ob = CIBlockElement::getList(false, $filter, false, false, $select);
        while($res = $ob->Fetch()){
            $itemsID[$res['PROPERTY_PRODID_VALUE']] = $res['ID'];
        }

        return $itemsID;
    }

    //Получение списка торговых предложений
    public function getSkuID()
    {
        $skuID = [];
        $filter = ['IBLOCK_ID' => IB_SKU];
        $select = ['IBLOCK_ID', 'ID', 'NAME', 'PROPERTY_SKU'];
        $ob = CIBlockElement::getList(false, $filter, false, false, $select);
        while($res = $ob->Fetch()){
            $skuID[$res['PROPERTY_SKU_VALUE']] = $res['ID'];
        }

        return $skuID;
    }

    //Сборка свойств товаров
    public function buildPropItems($data, $hash)
    {
        $prop = [];
        $prop['prodid'] = $data[0];
        $prop['vendor_id'] = $data[1];
        $prop['vendor_code'] = $data[2];
        $prop['batteries'] = $data[15];
        $prop['pack'] = $data[16];
        $prop['material'] = $data[17];
        $prop['length'] = $data[18];
        $prop['diameter'] = $data[19];
        $prop['collection'] = $data[20];
        $prop['bestseller'] = $data[24];
        $prop['new'] = $data[25];
        $prop['function'] = $data[26];
        $prop['addfunction'] = $data[27];
        $prop['vibration'] = $data[28];
        $prop['volume'] = $data[29];
        $prop['modelyear'] = $data[30];

        $prop['img1'] = CFile::MakeFileArray($data[5]);
        $prop['img2'] = CFile::MakeFileArray($data[6]);
        $prop['img3'] = CFile::MakeFileArray($data[7]);
        $prop['img4'] = CFile::MakeFileArray($data[8]);
        $prop['img5'] = CFile::MakeFileArray($data[9]);
        $prop['img6'] = CFile::MakeFileArray($data[10]);
        $prop['img7'] = CFile::MakeFileArray($data[11]);
        $prop['img8'] = CFile::MakeFileArray($data[12]);
        $prop['img9'] = CFile::MakeFileArray($data[13]);
        $prop['img10'] = CFile::MakeFileArray($data[14]);

        $prop['hash'] = $hash;

        return $prop;
    }

    //Сборка свойств торговых предложений
    public function buildPropSku($data, $hash, $itemsID)
    {
        $prop = [];
        $prop['CML2_LINK'] = $itemsID[$data[0]];
        $prop['prodid'] = $data[0];
        $prop['sku'] = $data[1];
        $prop['color'] = $data[7];
        $prop['size'] = $data[8];
        $prop['hash'] = $hash;

        return $prop;
    }

    //Добавление, обновление товаров
    public function csvItems($file)
    {
        $sectionsID = $this->getSectionID();
        $itemsID = $this->getItemsID();
        $resNew = 0;
        $resUpdate = 0;

        if (($handle = fopen($file, "r")) !== false) {

            $row = 1;

            while (($data = fgetcsv($handle, 0, ";")) !== false) {

                if($row != "1"){

                    $itemID = $itemsID[$data[0]];
                    $hash = $data[3].';'.$data[4].';'.$data[15].';'.$data[16].';'.$data[17].';'.$data[18].';'.$data[19].';'.$data[20].';'.$data[24].';'.$data[25].';'.$data[26].';'.$data[27].';'.$data[28].';'.$data[29].';'.$data[30];

                    //Обновление товаров. Проверка хеша
                    if($itemID && $this->isEditHashItems($itemID, $hash) == 'edit'){

                        $obElement = new CIBlockElement;

                        $obElement->SetPropertyValues($itemID, IB_PROD, $data[24], 'bestseller');
                        $obElement->SetPropertyValues($itemID, IB_PROD, $data[25], 'new');
                        $obElement->SetPropertyValues($itemID, IB_PROD, $hash, 'hash');


                        $code = Cutil::translit($data[3],"ru",["replace_space"=>"-","replace_other"=>"-"]);

                        $arFields = [
                            "ACTIVE" => "Y",
                            "IBLOCK_ID" => IB_PROD,
                            "NAME" => $data[3],
                            "CODE" => $code,
                            "DETAIL_TEXT"   => $data[4],
                        ];

                        if($obElement->Update($itemID, $arFields, false, false, false)){

                            $resUpdate++;
                        }
                    }

                    //Проверка на множественную привязку раздела
                    $itemSection = $this->getItemSection($itemID);
                    if($itemID && !$itemSection[$data[22]]){

                        //$sectionsID = $this->getSectionID();////
                        $sectionID = 0;
                        foreach($sectionsID as $id => $name){

                            if($name == $data[22]){
                                $sectionID = $id;
                            }
                        }
                        $itemSection[] = $sectionID;

                        $arFields = [
                            "IBLOCK_SECTION" => $itemSection,
                        ];
                        $obElement = new CIBlockElement;
                        if($obElement->Update($itemID, $arFields, false, false, false)){

                            $resUpdate++;
                        }
                    }

                    //Создание товаров
                    if(!$itemID){

                        $prop = $this->buildPropItems($data, $hash);
                        $code = Cutil::translit($data[3],"ru",["replace_space"=>"-","replace_other"=>"-"]);

                        //$sectionsID = $this->getSectionID();////
                        $sectionID = 0;
                        foreach($sectionsID as $id => $name){

                            if($name == $data[22]){
                                $sectionID = $id;
                            }
                        }
                        //Если нет раздела - создаем привязка в ручную из-за уникальных названий
                        /*if(!$sectionID){

                            $codeSection = Cutil::translit($data[22],"ru",["replace_space"=>"-","replace_other"=>"-"]);

                            $obSection = new CIBlockSection;
                            $arFields = [
                                "ACTIVE" => 'Y',
                                "IBLOCK_ID" => IB_PROD,
                                "NAME" => $data[22],
                                "CODE" => $codeSection,
                            ];

                            $sectionID = $obSection->Add($arFields);
                        }*/

                        $arFields = [
                            "ACTIVE" => "Y",
                            "IBLOCK_ID" => IB_PROD,
                            "IBLOCK_SECTION" => $sectionID,
                            "NAME" => $data[3],
                            "CODE" => $code,
                            "DETAIL_TEXT"   => $data[4],
                            "PROPERTY_VALUES" => $prop
                        ];
                        $obElement = new CIBlockElement;
                        if($newEl = $obElement->Add($arFields, false, false, false)){

                            CCatalogProduct::Add(['ID' => $newEl, 'QUANTITY' => 0]);
                            $resNew++;
                        }
                    }

                }
                $row++;
            }
            fclose($handle);
        }

        return 'New Items - '.$resNew.'. Update Items - '.$resUpdate;
    }

    //Добавление, обновление торговых предложений
    public function csvSku($file)
    {
        $skusID = $this->getSkuID();
        $itemsID = $this->getItemsID();
        $resNew = 0;
        $resUpdate = 0;

        if (($handle = fopen($file, "r")) !== false) {

            $row = 1;

            while (($data = fgetcsv($handle, 0, ";")) !== false) {

                if($row != "1"){
                    $skuID = $skusID[$data[1]];
                    $hash = $data[3].';'.$data[4].';'.$data[7].';'.$data[8].';'.$data[10];

                    //Обновление торговых предлжений. Проверка хеша
                    if($skuID && $this->isEditHashSku($skuID, $hash) == 'edit'){

                        $obElement = new CIBlockElement;

                        $obElement->SetPropertyValues($skuID, IB_SKU, $itemsID[$data[0]], 'CML2_LINK');
                        $obElement->SetPropertyValues($skuID, IB_SKU, $data[7], 'color');
                        $obElement->SetPropertyValues($skuID, IB_SKU, $data[8], 'size');
                        $obElement->SetPropertyValues($skuID, IB_SKU, $hash, 'hash');

                        $arFields = [
                            "IBLOCK_ID" => IB_SKU,
                            "NAME" => $data[3],
                        ];
                        if($obElement->Update($skuID, $arFields, false, false, false)){

                            $resUpdate++;

                            //Обновление количества, цены
                            CCatalogProduct::Update($skuID, ['QUANTITY' => $data[4]]);

                            $obPrice = \Bitrix\Catalog\PriceTable::getList([
                                'filter' => [
                                    'CATALOG_GROUP_ID'=>1,
                                    'PRODUCT_ID'=>$skuID
                                ]
                            ]);
                            $arPrice = $obPrice->Fetch();
                            \Bitrix\Catalog\PriceTable::update(
                                $arPrice['ID'],
                                [
                                    "PRODUCT_ID" => $skuID,
                                    "CATALOG_GROUP_ID" => 1,
                                    "PRICE" => $data[10],
                                    "CURRENCY" => $data[9],
                                ]
                            );
                        }
                    }

                    //Создание торговых предлжений
                    if(!$skuID){

                        $prop = $this->buildPropSku($data, $hash, $itemsID);

                        $arFields = [
                            "ACTIVE" => "Y",
                            "IBLOCK_ID" => IB_SKU,
                            "NAME" => $data[3],
                            "CODE" => '',
                            "PROPERTY_VALUES" => $prop
                        ];
                        $obElement = new CIBlockElement;
                        if($newEl = $obElement->Add($arFields, false, false, false)){

                            //Добавление количества, цены
                            CCatalogProduct::Add(['ID' => $newEl, 'QUANTITY' => $data[4]]);

                            \Bitrix\Catalog\Model\Price::add([
                                "PRODUCT_ID" => $newEl,
                                "CATALOG_GROUP_ID" => 1,
                                "PRICE" => $data[10],
                                "CURRENCY" => $data[9],
                            ]);

                            $resNew++;
                        }
                    }
                }
                $row++;
            }
            fclose($handle);
        }

        return 'New Sku - '.$resNew.'. Update Sku - '.$resUpdate;
    }

    //Обновление количества
    public function csvCount($file)
    {
        $skusID = $this->getSkuID();
        $resUpdate = 0;

        if (($handle = fopen($file, "r")) !== false) {

            $row = 1;

            while (($data = fgetcsv($handle, 0, ";")) !== false) {

                if($row != "1"){
                    $skuID = $skusID[$data[1]];
                    $hash = $data[2];

                    //Обновление торговых предлжений. Проверка хеша
                    if($skuID && $this->isEditHashSkuCount($skuID, $hash) == 'edit'){

                        $obElement = new CIBlockElement;
                        $obElement->SetPropertyValues($skuID, IB_SKU, $hash, 'hash_count');

                        //Обновление количества
                        CCatalogProduct::Update($skuID, ['QUANTITY' => $data[2]]);

                        $resUpdate++;
                    }
                }
                $row++;
            }
            fclose($handle);
        }

        return 'Update Count - '.$resUpdate;
    }

    //Обновление уникального описания
    /*public function uniDescr($file)
    {
        $itemsID = $this->getItemsID();
        $resUpdate = 0;

        if (($handle = fopen($file, "r")) !== false) {

            $row = 1;

            while (($data = fgetcsv($handle, 0, ";")) !== false) {

                if($row != "1"){

                    $itemID = $itemsID[$data[1]];

                    $obElement = new CIBlockElement;
                    $value = array('VALUE'=>array('TYPE'=>'html', 'TEXT'=>$data[2]));
                    $obElement->SetPropertyValues($itemID, IB_PROD, array('TYPE'=>'html', 'TEXT'=>$data[2]), 'UNI_DESCR');

                    $resUpdate++;
                }
                $row++;
            }
            fclose($handle);
        }

        return 'Update uniDescr - '.$resUpdate;
    }*/
}