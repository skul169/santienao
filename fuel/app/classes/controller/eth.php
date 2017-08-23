<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Eth extends Controller_Template
{
    public $template = 'template';
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function get_sell()
	{
        $view = View::forge('eth/sell');
        $price = Service_Transaction::get_price_eth();
        $view->price = floor($price['sell']);

        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->setting = Model_Setting::find('first');
        $this->template->content = $view;
//		return Response::forge($view);
	}

    public function post_sell()
    {
        $sell_model = new Model_Sell();
        $sell_model->transaction_id = uniqid();
        $sell_model->coin_number = Input::post('quantity');
        $sell_model->bank_number = Input::post('accountNumber');
        $sell_model->status = 0;

        $price = Service_Transaction::get_price_eth();
        $sell_model->money = $price['sell'] * $sell_model->coin_number;
        $sell_model->save();

        $view = View::forge('eth/after_sell');
        $view->coin_number = $sell_model->coin_number;
        $view->id = $sell_model->id;
        $view->transaction_id = $sell_model->transaction_id;
        $view->bank_number = $sell_model->bank_number;
        $view->bank_acc_name = Input::post('accountName');
        $view->money = $sell_model->money;
        $view->price = floor($price['sell']);
        $view->transaction_time = $sell_model->created_at;
        $view->setting = Model_Setting::find('first');

        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->setting = Model_Setting::find('first');
        $this->template->content = $view;
    }

    public function get_buy() {
        $view = View::forge('eth/buy');
        $price = Service_Transaction::get_price_eth();
        $view->price = floor($price['buy']);

        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->setting = Model_Setting::find('first');
        $this->template->content = $view;
    }

    public function post_buy()
    {
        $buy_model = new Model_Buy();
        $buy_model->coin_number = Input::post('quantity');
        $buy_model->coin_address = Input::post('accountNumber');
        $buy_model->status = 0;
        $buy_model->transaction_id = uniqid();

        $price = Service_Transaction::get_price_eth();
        $buy_model->money = $price['buy'] * $buy_model->coin_number;
        $buy_model->save();

        $view = View::forge('eth/after_buy');
        $view->coin_number = $buy_model->coin_number;
        $view->money = $buy_model->money;
        $view->transaction_id = $buy_model->transaction_id;
        $view->coin_address = $buy_model->coin_address;
        $view->id = $buy_model->id;
        $view->price = floor($price['buy']);
        $view->transaction_time = $buy_model->created_at;
        $view->setting = Model_Setting::find('first');

        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->setting = Model_Setting::find('first');

        $this->template->content = $view;
    }

}
