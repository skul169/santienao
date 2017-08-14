<?php

class Model_Sell extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'coin_type',
        'coin_number',
        'bank_number',
        'money',
        'created_at',
        'updated_at',
    );

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
        $query_string = "SELECT count(id) as total FROM sells WHERE created_at > DATE_SUB(NOW(), INTERVAL 24 HOUR)";
        $query = DB::query($query_string);
        $result = $query->execute()->as_array();
        return $result[0]['total'];
    }
}
