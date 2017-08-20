<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'login' => 'users/login',
	'logout' => 'users/logout',
	'register' => 'users/register',
	'active/:emailuser' => 'users/active',
);
