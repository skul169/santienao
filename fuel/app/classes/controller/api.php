<?php
/**
 * Created by PhpStorm.
 * User: truon
 * Date: 8/15/2017
 * Time: 2:56 PM
 */
class Controller_Api extends Controller_Rest {
    public function get_buy_orders() {
        $buy = Model_Buy::find('all');
        /**
        , array(
        'where' => array(
        array('status', '!=', 3),
        array('status', '!=', 4),
        )
        )
         */

        return $this->response($buy);
    }

    public function get_sell_orders() {
        $sell = Model_Sell::find('all');
        /*
        , array(
            'where' => array(
                array('status', '!=', 3),
                array('status', '!=', 4),
            ))
         */

        return $this->response($sell);
    }

    public function get_update_buy() {
        $buy = Model_Buy::find(Input::get('order_id'));
        if ($buy) {
            $buy->status = Input::get('status', 99);
            $buy->save();
            return $this->response(['success' => true]);
        } else {
            return $this->response(['success' => false]);
        }

    }

    public function get_update_sell() {
        $sell = Model_Sell::find(Input::get('order_id'));
        if ($sell) {
            $sell->status = Input::get('status', 99);
            $sell->save();
            return $this->response(['success' => true]);
        } else {
            return $this->response(['success' => false]);
        }

    }

    public function get_price_usd() {
        $price = Service_Transaction::get_price_eth_in_usd();
        return $this->response(['price' => $price]);
    }

    public function get_update_price_in_vnd() {
        $buy = Input::get('buy', 0);
        $sell = Input::get('sell', 0);

        $setting = Model_Setting::find('first');
        if ($buy > 0) {
            $setting->buy_rate = $buy;
        }

        if ($sell > 0) {
            $setting->sell_rate = $sell;
        }

        $setting->save();

        return $this->response(['success' => true]);
    }

}