<?php
class Service_Transaction {
    public static function count_all() {
        $ary_return = [];
        $ary_return['buy'] = Model_Buy::count();
        $ary_return['buy24'] = Model_Buy::count_24h();
        $ary_return['sell'] = Model_Sell::count();
        $ary_return['sell24'] = Model_Sell::count_24h();

        return $ary_return;
    }

    public static function get_price_eth() {
        // $file = file_get_contents('https://api.coinbase.com/v2/exchange-rates?currency=ETH');
        // $result = json_decode($file);
        // $price_usd = $result->data->rates->USD;

        // $setting = Model_Setting::find('first');
        // $price['spot'] = $price_usd * $setting->usd_vnd_rate;
        // $price['buy'] = ($price['spot'] * $setting->buy_rate / 100) + $price['spot'];
        // $price['sell'] = $price['spot'] - ($price['spot'] * $setting->sell_rate / 100);
        $setting = Model_Setting::find('first');
        $price['buy'] = $setting->buy_rate;
        $price['sell'] = $setting->sell_rate;
        return $price;
    }

    public static function get_price_eth_in_usd() {
        $file = file_get_contents('https://api.coinbase.com/v2/exchange-rates?currency=ETH');
        $result = json_decode($file);
        return $result->data->rates->USD;
    }
}