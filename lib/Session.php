<?php
/**
 * 
 */
class Session
{
	
	public static function init()
	{
		if (version_compare(phpversion(), '5.4.0', '<')) {
			if (session_id() == '') {
				session_start();
			}else{
				return false;
			}
		}else{
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
		}
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	public static function get($key)
	{
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}else{
			return false;
		}
	}

	//This Function is For Logout
	public static function destroy()
	{
		session_destroy();
		session_unset();
		header("Location:login.php");
	}

	public function checkSession()
	{
		if (self::get('login') == false) {
			self::destroy();
		}
	}

	public static function checkLogin()
	{
		if (self::get('login') == true) {
				header("Location:index.php");
			}	
	}
}