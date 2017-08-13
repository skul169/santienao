<?php

class Model_Coin extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'name',
        'description',
        'buy',
        'sell',
    );
}
