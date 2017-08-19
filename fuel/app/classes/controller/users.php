<?php

class Controller_Users extends Controller_Template {

	public $template = 'template_user';

	// Dang nhap
	public function action_login() {
		if (Auth::check()) {
			Response::redirect('/');
		}

		if (Input::method() == 'POST') {
			$user = \Model\Auth_User::find_by_email(Input::post('email'));
			if (Auth::login(Input::post('email'), Input::post('password')) && $user['group'] == 123) {
				Session::set_flash('success', 'Bạn đăng nhập thành công!');
				Response::redirect('/');
			} else {
				echo "<script> alert('Đăng nhập lỗi hoặc tài khoản chưa kích hoạt, vui lòng thử lại!'); </script>";
				// ('error', 'Đăng nhập lỗi hoặc tài khoản chưa kích hoạt, vui lòng thử lại!');
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
		// Session::set_flash('array', array('varA', 'varB', 'varC' => array('val1', 'val2')));
		// $val = Validation::forge();

		// $val->add_callable('MyRules');

		// $val->add_callable(new MyRules());

		
		// echo Uri::base(false);
		if (Input::method() == 'POST') {
			$data['username'] = Input::post('username');
			$data['email'] = Input::post('email');
			// $val->add('username', 'Your username', array(), array('trim', 'strip_tags', 'required', 'is_upper'))->add_rule('unique', 'users.username');
			// $val->add('email', 'Your email', array(), array('trim', 'strip_tags', 'required', 'is_upper'))->add_rule('unique', 'users.email');
			
			// $user = \Model\Auth_User::find_by_email(Input::post('email'));
			// $user = \Model\Auth_User::find_by_email('test@gmail.com');
			// print_r($user);
			try {
				// $val->add_field('username', 'Your username', 'required');
				$create_process = Auth::create_user(Input::post('username'), Input::post('password'), Input::post('email'));

				if ($create_process) {
					Session::set_flash('success', 'Đăng ký thành công!');
					
					//send mail
					\Package::load('email');
					$email_data = array();
					$url = Uri::base(false);
					//echo Config::get('base_url'). "user/activate/". $user['hash'];
					$email = Email::forge();
					$email->from('vivu.vivu11@gmail.com', 'ETH');
					// $email->to(Input::post('email'), Input::post('username'));
					$email->to(Input::post('email'), Input::post('username'));
					$email->subject('Register');
					$email_data['name'] = "Chào " . Input::post('username'). ", ";
					$email_data['title'] = "Bạn vừa đăng ký tài khoản trên ETH. Vui lòng click vào liên kết dưới đây để hoàn tất đăng ký!";
					$email_data['link'] = $url . "users/activation/" . Input::post('email');
					$email->html_body(\View::forge('users/activation', array('email_data' => $email_data)));
					$email->send();
					echo "<script> alert('Email kích hoạt tài khoản vừa được gửi đến email đăng ký của bạn, vui lòng kiểm tra hộp thư đến, hoặc thư spam để kích hoạt tài khoản!'); </script>";

					Response::redirect('/login');
				} else {
					// Session::set_flash('error', 'Đăng ký không thành công, vui lòng thử lại!');
					echo "<script> alert('Đăng ký không thành công, email hoặc tên người dùng đã tồn tại!'); </script>";
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

	public function action_activation($email = '') {
		// \Package::load('email');
		// $email_data = array();
		// $url = Uri::base(false);
		// //echo Config::get('base_url'). "user/activate/". $user['hash'];
		// $email = Email::forge();
		// $email->from('vivu.vivu11@gmail.com', 'ETH');
		// // $email->to(Input::post('email'), Input::post('username'));
		// $email->to('d.0909660093@gmail.com', '123');
		// $email->subject('Register');

		// $email_data['name'] = "Chào " . Input::post('username'). ", ";
		// $email_data['title'] = "Bạn vừa đăng ký tài khoản trên ETH. Vui lòng click vào liên kết dưới đây để hoàn tất đăng ký!";
		// $email_data['link'] = $url . "users/activate/";

		// $email->html_body(\View::forge('users/activation', array('email_data' => $email_data)));
		// $email->send();

		$user = \Model\Auth_User::find_by_email($email);
		print_r($user);
		$user->group = 123;
		$user->save();
		// echo $user;



		// Response::body(json_encode(array(
		// 'status' => 'ok',
		// )));
	}
}