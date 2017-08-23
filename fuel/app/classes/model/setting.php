<?php

class Model_Setting extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'usd_vnd_rate',
        'buy_rate',
        'sell_rate',
        'eth_account_address',
        'vcb_account_id',
        'vcb_account_name',
        'total_buy',
        'total_sell',
        'total_buy_24',
        'total_sell_24',
    );
}
