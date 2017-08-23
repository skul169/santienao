<?php
class Controller_Ajax extends Controller_Rest {
    public function get_check_bank_account()
    {
        $bank_account = Input::get('bank_account', 'AAA');
        $result = file_get_contents('https://santienao.com/api/v1/bank_accounts/' . $bank_account);
        $result = json_decode($result);
        return $this->response(array(
            'state'	=> $result->state,
            'account_name' => $result->account_name
        ));
    }

    public function get_check_status_buy() {
        $order_id = Input::get('id', 0);
        $order = Model_Buy::find($order_id);
        if ($order) {
            $status = $order->status;
        } else {
            $status = 0;
        }

        return $this->response(['status'	=> $status]);
    }

    public function get_check_status_sell() {
        $order_id = Input::get('id', 0);
        $order = Model_Sell::find($order_id);
        if ($order) {
            $status = $order->status;
        } else {
            $status = 0;
        }

        return $this->response(['status'	=> $status]);
    }

    public function get_get_price() {
        $price = Service_Transaction::get_price_eth();
        $price['sell'] = number_format(floor($price['sell']));
        $price['buy'] = number_format(floor($price['buy']));
        return $this->response(['price'	=> $price]);
    }
}