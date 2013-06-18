<h1>Importing empty values</h1>
<p>For the module operation need to override the _saveProducts.
Which is located:
/app/code/core/Mage/ImportExport/Model/Import/Entity/Product.php

replaced:

$rowData      = $this->_productTypeModels[$productType]->prepareAttributesForSave($rowData);

to:

                $rowDataBefore = $rowData;
                $rowData      = $this->_productTypeModels[$productType]->prepareAttributesForSave($rowData);
                $rowData = new Varien_Object($rowData);
                Mage::dispatchEvent('prepare_attributes_empty_value', array('before' => $rowDataBefore, 'after' =>  $rowData));
                $rowData = $rowData->getData();

</p>
