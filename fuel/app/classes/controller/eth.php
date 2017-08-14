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
        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->content = $view;
//		return Response::forge($view);
	}

    public function post_sell()
    {
        $sell_model = new Model_Sell();
        $sell_model->coin_number = Input::post('quantity');
        $sell_model->bank_number = Input::post('accountNumber');

        $price = Service_Transaction::get_price_eth();
        $sell_model->money = $price['sell'] * $sell_model->coin_number;
        $sell_model->save();

        $view = View::forge('eth/after_sell');
        $view->coin_number = $sell_model->coin_number;

        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->content = $view;
    }

    public function get_buy() {
        $view = View::forge('eth/buy');

        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->content = $view;
    }

    public function post_buy()
    {
        $sell_model = new Model_Buy();
        $sell_model->coin_number = Input::post('quantity');
        $sell_model->coin_address = Input::post('accountNumber');

        $price = Service_Transaction::get_price_eth();
        $sell_model->money = $price['buy'] * $sell_model->coin_number;
        $sell_model->save();

        $view = View::forge('eth/after_buy');
        $view->coin_number = $sell_model->coin_number;
        $view->money = $sell_model->money;

        $count = Service_Transaction::count_all();
        $this->template->count = $count;

        $this->template->content = $view;
    }

}
