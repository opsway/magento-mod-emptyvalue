<h1>Importing empty values</h1>
<p>For the module operation need to override the _saveProducts.<br />
Which is located:<br /><br />
/app/code/core/Mage/ImportExport/Model/Import/Entity/Product.php
<br /><br />
replaced:
<br /><br />
$rowData      = $this->_productTypeModels[$productType]->prepareAttributesForSave($rowData);
<br /><br />
to:
<br /><br />
$rowDataBefore = $rowData;<br />
$rowData      = $this->_productTypeModels[$productType]->prepareAttributesForSave($rowData);<br />
$rowData = new Varien_Object($rowData);<br />
Mage::dispatchEvent('prepare_attributes_empty_value', array('before' => $rowDataBefore, 'after' =>  $rowData));<br />
$rowData = $rowData->getData();<br />
</p>
