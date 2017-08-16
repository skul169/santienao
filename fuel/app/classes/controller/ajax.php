<?php
class Controller_Ajax extends Controller_Rest {
    public function get_check_bank_account()
    {
        $bank_account = Input::get('bank_account', 'AAA');
        $result = file_get_contents('https://santienao.com/api/v1/bank_accounts/' . $bank_account);
        $result = json_decode($result);
        return $this->response(array(
            'state'	=> $result->state,
        ));
    }
}