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

	public function action_activation($email = 'd.0909660093@gmail.com', $username = 'admin') {
		//send mail
		\Package::load('email');
		$email_data = array();
		$url = Uri::base(false);
		$email = Email::forge();
		$email->from('eth@eth.com', 'ETH');
		$email->to($email, $username);
		$email->subject('Register');
		$email_data['name'] = "Chào " . $username. ", ";
		$email_data['title'] = "Bạn vừa đăng ký tài khoản trên ETH. Vui lòng click vào liên kết dưới đây để hoàn tất đăng ký!";
		$email_data['link'] = $url . "users/active/" . $email;
		$email->html_body(\View::forge('users/activation', array('email_data' => $email_data)));
		$email->send();
		echo "<script> alert('Email kích hoạt tài khoản vừa được gửi đến email đăng ký của bạn, vui lòng kiểm tra hộp thư đến, hoặc thư spam để kích hoạt tài khoản!'); </script>";
	}

	// Dang ky user
	public function action_register() {
		if (Auth::check()) {
			Response::redirect('/');
		}
		if (Input::method() == 'POST') {
			$data['username'] = Input::post('username');
			$data['email'] = Input::post('email');
			try {
				$create_process = Auth::create_user(Input::post('username'), Input::post('password'), Input::post('email'));
				if ($create_process) {
					// Goi ham send mail
					$this->activation(Input::post('email'), Input::post('username'));
					Session::set_flash('success', 'Đăng ký thành công!');

					Response::redirect('/login');
				} else {
					Session::set_flash('error', 'Đăng ký không thành công, vui lòng thử lại!');
				}
			} catch (Exception $exc) {
				echo "<script> alert('Đăng ký không thành công, email hoặc tên người dùng đã tồn tại!'); </script>";
				Session::set_flash('error', $exc->getMessage());
			}
			$this->template->content = View::forge('users/register', $data);
		} else {
			$this->template->content = View::forge('users/register');
		}
		$this->template->title = 'Register';
	}

	public function action_active($email = '') {
		$user = \Model\Auth_User::find_by_email($email);
		// print_r($user);
		$user->group = 123;
		$user->save();
		Response::redirect('/login');
	}
}