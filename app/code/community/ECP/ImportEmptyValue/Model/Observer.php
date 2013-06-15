<?php

/**
 * Importing empty values
 *
 * @author    Evgeniy Shvec <evshv@smile.fr>
 */


class ECP_ImportEmptyValue_Model_Observer
{

    /**
     * Adding an empty attribute if it is empty in the csv file and selected in settings
     *
     * @param $observer
     * @return array
     */
    public function prepare_attributes_empty_value($rowData)
    {

        $rowDataBefore = $rowData->getBefore();
        $rowDataAfter = $rowData->getAfter();
        $attributes = explode(',', Mage::getStoreConfig('import_settings/attributes/emptyvalue'));
        $active = Mage::getStoreConfig('import_settings/attributes/active');

        if ($attributes && $active) {
            foreach ($attributes as $attribute) {
                if (array_key_exists($attribute, $rowDataBefore)) {
                    if (!isset($rowDataBefore[$attribute]) && !strlen($rowDataBefore[$attribute])) {

                        switch ($attribute) {
                            case 'special_price':
                                $rowDataAfter[$attribute] = null;
                                $rowDataAfter['special_from_date'] = null;
                                $rowDataAfter['special_to_date'] = null;
                                break;

                            default:
                                $rowDataAfter[$attribute] = null;
                        }

                    }
                }
            }
        }

        $rowData = $rowDataAfter;
        return $rowData;
    }
}

?>