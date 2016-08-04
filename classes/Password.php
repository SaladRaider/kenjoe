<?php

class Password {
	public static function ifNotSignedInGoTo($dest) {
		if(!Password::isSignedIn()) {
			header("Location: {$dest}");
			die();
		}
	}

	public static function isSignedIn() {
		return !empty($_SESSION['signed_in']) && $_SESSION['signed_in'] == true;
	}

	public static function signIn($database, $password) {
		$hash = $database->getPasswordHash();
		if(password_verify($password, $hash)) {
			$_SESSION['signed_in'] = true;
		}
	}

	public static function signOut() {
		session_destroy();
	}
}

?>