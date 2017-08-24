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
        $buy_rate = Input::get('biendo_tren', 0);
        $sell_rate = Input::get('biendo_duoi', 0);
        $usd_vnd_rate = Input::get('vcbrate', 0);

        $setting = Model_Setting::find('first');
        if (isset($buy_rate)) {
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

    public function get_update_eth_address() {
        $eth_address = Input::get('eth_address', '0000');
        $setting = Model_Setting::find('first');
        $setting->eth_account_address = $eth_address;
        $setting->save();
        return $this->response(['success' => true]);
    }

    public function get_update_vcb_account() {
        $vcb_id = Input::get('vcb_account_id', '0000');
        $result = file_get_contents('https://santienao.com/api/v1/bank_accounts/' . $vcb_id);
        $result = json_decode($result);
        if ($result->state != 'error' && isset($result->account_name)) {
            $setting = Model_Setting::find('first');
            $setting->vcb_account_id = $vcb_id;
            $setting->vcb_account_name = $result->account_name;
            $setting->save();
            return $this->response(['success' => true, 'account_name' => $result->account_name]);
        } else {
            return $this->response(['success' => false, 'message' => 'Thông tin account ID không chính xác!']);
        }
    }

    public function get_update_funds() {
        $total_buy = Input::get('total_buy', '1');
        $total_sell = Input::get('total_sell', '1');
        $total_buy_24 = Input::get('total_buy_24', '1');
        $total_sell_24 = Input::get('total_sell_24', '1');
        $setting = Model_Setting::find('first');
        $setting->total_buy = $total_buy;
        $setting->total_sell = $total_sell;
        $setting->total_buy_24 = $total_buy_24;
        $setting->total_sell_24 = $total_sell_24;
        $setting->save();
        return $this->response(['success' => true]);
    }

}