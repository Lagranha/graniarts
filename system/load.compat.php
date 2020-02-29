<?php
	if (!defined('INITIALIZED'))
		exit;

	// DEFINE VARIABLES FOR SCRIPTS AND LAYOUTS (no more notices 'undefinied variable'!)
	if (!isset($_REQUEST['page']) || empty($_REQUEST['page']) || is_array($_REQUEST['page']))
		$_REQUEST['page'] = "home";
	else
		$_REQUEST['page'] = (string) $_REQUEST['page'];

	if (Functions::isValidFolderName($_REQUEST['page'])) {
		if (Website::fileExists("pages/" . $_REQUEST['page'] . ".php"))
			$page = $_REQUEST['page'];
		else
			new Error_Critic('CRITICAL ERROR', 'Cannot load page <b>' . htmlspecialchars($_REQUEST['page']) . '</b>, file does not exist.');
	} else
		new Error_Critic('CRITICAL ERROR', 'Cannot load page <b>' . htmlspecialchars($_REQUEST['page']) . '</b>, invalid file name [contains illegal characters].');

	// action that page should execute
	if (isset($_REQUEST['action']))
		$action = (string) $_REQUEST['action'];
	else
		$action = '';

	$logged = false;
	$account_logged = new Account();
	$group_id_of_acc_logged = 0;
	// with ONLY_PAGE option we want disable useless SQL queries
	if (!ONLY_PAGE) {
		// logged boolean value: true/false
		$logged = Visitor::isLogged();
		// Account object with account of logged user or empty Account
		$account_logged = Visitor::getAccount();
		// group of acc. logged
		if(Visitor::isLogged())
			$group_id_of_acc_logged = Visitor::getAccount()->getPageAccess();
	}

	$layout_name = './layouts/' . Website::getWebsiteConfig()->getValue('layout');
	$title = ucwords($page) . ' - ' . Website::getServerConfig()->getValue('serverName');
	$topic = $page;

	$passwordency = Website::getServerConfig()->getValue('passwordType');
	if ($passwordency == 'plain')
		$passwordency = '';