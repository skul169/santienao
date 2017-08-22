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
        /////vcbrate
        /// biendo_tren
        ///biendo_duoi


        $buy_rate = Input::get('biendo_tren', 0);
        $sell_rate = Input::get('biendo_duoi', 0);
        $usd_vnd_rate = Input::get('vcbrate', 0);

        $setting = Model_Setting::find('first');
        if ($buy_rate > 0) {
            $setting->buy_rate = $buy_rate;
        }

        if (isset($sell_rate)) {
            $setting->sell_rate = $sell_rate;
        }

        if ($usd_vnd_rate > 0) {
            $setting->usd_vnd_rate = $usd_vnd_rate;
        }

        $setting->save();

        return $this->response(['success' => true]);
    }

}