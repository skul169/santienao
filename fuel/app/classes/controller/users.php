<?php

class Controller_Users extends Controller_Template {

	public $template = 'template_user';

	// Dang nhap
	public function action_login() {
		if (Auth::check()) {
			Response::redirect('welcome/hello');
		}

		if (Input::method() == 'POST') {
			if (Auth::login(Input::post('email'), Input::post('password'))) {
				Session::set_flash('success', 'Bạn đăng nhập thành công!');
				Response::redirect('/');
			} else {
				Session::set_flash('error', 'Đăng nhập lỗi, vui lòng thử lại!');
			}
		}
		$this->template->title = 'Login';
		$this->template->content = View::forge('users/login');
		// return Response::forge(Presenter::forge('users/login'));
	}

	// Dang xuat
	public function action_logout() {
		Auth::logout();
		Session::set_flash('success', 'Bạn vừa đăng xuất!');
		Response::redirect('/login');
	}

	// Dang ky user
	public function action_register() {
		if (Auth::check()) {
			Response::redirect('/');
		}
		// echo Uri::base(false);
		if (Input::method() == 'POST') {
			$data['username'] = Input::post('username');
			$data['email'] = Input::post('email');
			try {
				// $val->add_field('username', 'Your username', 'required');
				$create_process = Auth::create_user(Input::post('username'), Input::post('password'), Input::post('email'));

				if ($create_process) {
					Session::set_flash('success', 'Đăng ký thành công!');
					Response::redirect('/login');
				} else {
					Session::set_flash('error', 'Đăng ký không thành công, vui lòng thử lại!');
				}
			} catch (Exception $exc) {
				Session::set_flash('error', $exc->getMessage());
			}
			$this->template->content = View::forge('users/register', $data);
		} else {
			$this->template->content = View::forge('users/register');
		}
		$this->template->title = 'Register';
	}

	public function action_activation() {
		\Package::load('email');
		$email_data = array();
		$url = Uri::base(false);
		//echo Config::get('base_url'). "user/activate/". $user['hash'];
		$email = Email::forge();
		$email->from('vivu.vivu11@gmail.com', 'ETH');
		// $email->to(Input::post('email'), Input::post('username'));
		$email->to('d.0909660093@gmail.com', '123');
		$email->subject('Register');

		$email_data['name'] = "Chào " . Input::post('username'). ", " ."<br><br>" ;
		$email_data['title'] = "Chào mừng bạn đến với ETH" ."<br>";
		$email_data['link'] = '<a href="'. $url . "users/activate/".'">Vui lòng click vào liên kết để hoàn tất đăng ký!</a>';

		$email->html_body(\View::forge('users/activation', array('email_data' => $email_data)));
		$email->send();

		$response->body(json_encode(array(
		'status' => 'ok',
		)));
	}
}