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
				Response::redirect('welcome/hello');
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
			Response::redirect('welcome/hello');
		}
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
}