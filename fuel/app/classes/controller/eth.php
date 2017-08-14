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
	    $coin = Model_Coin::find('all');
	    $view = View::forge('eth/sell');
	    $view->coin = $coin;

        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->content = $view;
//		return Response::forge($view);
	}

    public function post_sell()
    {
        $sell_model = new Model_Sell();
        $sell_model->coin_type = 2;
        $sell_model->coin_number = Input::post('quantity');
        $sell_model->bank_number = Input::post('accountNumber');

        $coin = Model_Coin::find($sell_model->coin_type);
        $sell_model->money = $coin->sell * $sell_model->coin_number;
        $sell_model->save();

        $view = View::forge('eth/after_sell');
        $view->coin_number = $sell_model->coin_number;
        $coin = Model_Coin::find('all');
        $view->coin = $coin;

        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->content = $view;
    }

    public function get_buy() {
        $coin = Model_Coin::find('all');
        $view = View::forge('eth/buy');
        $view->coin = $coin;

        $count = Service_Transaction::count_all();
        $this->template->count = $count;
        $this->template->content = $view;
    }

    public function post_buy()
    {
        $sell_model = new Model_Buy();
        $sell_model->coin_type = 2;
        $sell_model->coin_number = Input::post('quantity');
        $sell_model->coin_address = Input::post('accountNumber');

        $coin = Model_Coin::find($sell_model->coin_type);
        $sell_model->money = $coin->buy * $sell_model->coin_number;
        $sell_model->save();

        $view = View::forge('eth/after_buy');
        $view->coin_number = $sell_model->coin_number;
        $view->money = $sell_model->money;
        $coin = Model_Coin::find('all');
        $view->coin = $coin;

        $count = Service_Transaction::count_all();
        $this->template->count = $count;

        $this->template->content = $view;
    }

}
