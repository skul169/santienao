<?php
/**
 * Created by PhpStorm.
 * User: truon
 * Date: 8/15/2017
 * Time: 2:56 PM
 */
class Controller_Api extends Controller_Rest {
    public function get_buy_orders() {
        $buy = Model_Buy::find('all', array(
            'where' => array(
                array('status', '!=', 3),
                array('status', '!=', 4),
            )));

        return $this->response($buy);
    }

    public function get_sell_orders() {
        $sell = Model_Sell::find('all', array(
            'where' => array(
                array('status', '!=', 3),
                array('status', '!=', 4),
            )));

        return $this->response($sell);
    }

    public function post_update_buy() {
        $buy = Model_Buy::find(Input::post('order_id'));
        $buy->status = Input::post('status', 99);
        $buy->save();
        return $this->response(['success' => true]);
    }

    public function post_update_sell() {
        $sell = Model_Sell::find(Input::post('order_id'));
        $sell->status = Input::post('status', 99);
        $sell->save();
        return $this->response(['success' => true]);
    }


}