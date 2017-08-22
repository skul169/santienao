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
class Controller_Static extends Controller_Template
{
    public $template = 'template';
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function get_term()
	{
        $view = View::forge('static/term');
        $this->template->content = $view;
	}

    /**
     * @return string
     */
    public function get_manual()
    {
        $view = View::forge('static/manual');
        $this->template->content = $view;
    }

    public function get_news()
    {
        $view = View::forge('static/news');
        $this->template->content = $view;
    }
}
