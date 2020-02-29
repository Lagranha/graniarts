<?php
	if (!defined('INITIALIZED'))
		exit;

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout')
		Visitor::logout();

	if (isset($_REQUEST['account_email']) && isset($_REQUEST['password_login'])) {
		Visitor::setAccount($_REQUEST['account_email']);
		Visitor::setPassword($_REQUEST['password_login']);
		$isTryingToLogin = true;
	}

	Visitor::login();