<?php

class Model_Sell extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'coin_type',
        'coin_number',
        'bank_number',
        'money',
    );
}
