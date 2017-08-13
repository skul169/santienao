<?php

class Model_Buy extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'coin_type',
        'coin_number',
        'money',
        'coin_address',
    );
}
