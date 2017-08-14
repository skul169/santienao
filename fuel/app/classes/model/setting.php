<?php

class Model_Setting extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'usd_vnd_rate',
        'buy_rate',
        'sell_rate',
    );
}
