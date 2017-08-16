<style type="text/css">
	.margin-o {
		margin: 0 auto;
	}
</style>

<div class="col-md-6 margin-o">
	<div class="card card-container">
		<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
		<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
		<p id="profile-name" class="profile-name-card"></p>
		<div class="panel-body">
			<?php echo Form::open('users/login'); ?>
				<span id="reauth-email" class="reauth-email"></span>
				<div class="form-group">
					<?php
						echo Form::input('email', '', array('type' => 'email', 'id' => 'inputEmail', 'class' => 'form-control', 'placeholder' => 'Email address', 'autofocus' => ''));
					?>
				</div>

				<div class="form-group">
					<?php
						echo Form::input('password', '', array('type' => 'password', 'id' => 'inputPassword', 'class' => 'form-control', 'placeholder' => 'Password'));
					?>
				</div>

				<div class="form-group">
					<?php
						echo Form::button('login', 'Đăng nhập', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block btn-signin'));
					?>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>
