<?php
	// comment to show E_NOTICE [undefinied variable etc.], comment if you want make script and see all errors
	error_reporting(E_ALL ^ E_STRICT ^ E_NOTICE);

	// true = show sent queries and SQL queries status/status code/error message
	define('DEBUG_DATABASE', false);

	define('INITIALIZED', true);

	// if not defined before, set 'false' to load all normal
	if (!defined('ONLY_PAGE'))
		define('ONLY_PAGE', false);

	// fix user data, load config, enable class auto loader
	include_once('./system/load.init.php');

	// database
	include_once('./system/load.database.php');
	if (DEBUG_DATABASE)
		Website::getDBHandle()->setPrintQueries(true);

	// login
	if (!ONLY_PAGE)
		include_once('./system/load.login.php');

	// compat
	// some parts in that file can be blocked because of ONLY_PAGE constant
	include_once('./system/load.compat.php');

	// load page
	include_once('./system/load.page.php');

	// layout
	// with ONLY_PAGE we return only page text, not layout
	if (!ONLY_PAGE)
		include_once('./system/load.layout.php');
	else
		echo $main_content;