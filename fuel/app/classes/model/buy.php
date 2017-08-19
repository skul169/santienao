<?php

class Model_Buy extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'transaction_id',
        'coin_number',
        'money',
        'coin_address',
        'status',
        'created_at',
        'updated_at',
    );

    const RECEIVE_VCB = 1;
    const PAY_VCB = 2;
    const RECEIVE_ETH = 3;
    const PAY_ETH = 4;

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => true,
        ),
    );

    public static function count_24h() {
        $query_string = "SELECT count(id) as total FROM buys WHERE created_at > DATE_SUB(NOW(), INTERVAL 24 HOUR)";
        $query = DB::query($query_string);
		$result = $query->execute()->as_array();
        return $result[0]['total'];
    }
}
