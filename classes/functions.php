<?php
	if (!defined('INITIALIZED'))
		exit;

	class Functions {
		public static $configs = array();

		public static function isValidFolderName($string) {
			return (strspn($string, "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789_-") == strlen($string));
		}

		public static function isValidMail($email) {
			return (filter_var($email, FILTER_VALIDATE_EMAIL) != false);
		}

		public function limitTextLength($text, $length_limit) {
			if (strlen($text) > $length_limit)
				return substr($text, 0, strrpos(substr($text, 0, $length_limit), " ")).'...';
			else
				return $text;
		}
	}