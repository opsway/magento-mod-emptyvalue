<?php

class ECP_ImportEmptyValue_Model_Multiselect_Values
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'special_price',
                'label' => 'Special Price',
            ),
            array(
                'value' => 'special_date',
                'label' => 'Special Price From/To Date (Depends on Special Price)',
            )
        );
    }
}