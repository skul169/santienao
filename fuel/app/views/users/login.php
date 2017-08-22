<style type="text/css">
	.margin-o {
		margin: 0 auto;
	}

	body, html{
		height: 100%;
		background-repeat: no-repeat;
		background-color: #d3d3d3;
		font-family: 'Oxygen', sans-serif;
	}

	.main{
		margin-top: 70px;
	}

	h1.title { 
		font-size: 50px;
		font-family: 'Passion One', cursive; 
		font-weight: 400; 
	}

	.form-group{
		margin-bottom: 15px;
	}

	label{
		margin-bottom: 15px;
	}

	input,
	input::-webkit-input-placeholder {
		font-size: 11px;
		padding-top: 3px;
	}

	.main-login{
		background-color: #fff;
		/* shadows and rounded borders */
		-moz-border-radius: 2px;
		-webkit-border-radius: 2px;
		border-radius: 2px;
		-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

	}

	.main-center{
		margin-top: 30px;
		margin: 0 auto;
		max-width: 330px;
		padding: 40px 40px;

	}

	.login-button{
		margin-top: 5px;
	}

	.login-register{
		font-size: 11px;
		text-align: center;
	}
</style>

<div class="container">
	<div class="row main">
		<div class="main-login main-center">
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h2 class="title">Đăng nhập</h2>
					<hr />
				</div>
			</div> 

			<?php echo Form::open('users/login'); ?>
				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<?php
								echo Form::input('email', '', array('type' => 'email', 'id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => '', 'required' => ''));
							?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Mật khẩu</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<?php
								echo Form::input('password', '', array('type' => 'password', 'id' => 'password', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Mật khẩu'));
							?>
						</div>
					</div>
				</div>

				<div class="form-group ">
					<?php
						echo Form::button('login', 'Đăng nhập', array('type' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block login-button', 'id' => 'reg'));
					?>
				</div>
				<div class="login-register">
					<a href="/users/register"><h6><u><i>Đăng ký</i></u></h6></a>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>

<script>
$("#register").validate();
</script>

