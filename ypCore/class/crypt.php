<?php 
/**
 * Crypt system.
 *
 * @since 0.1.0
 * @author LvDuit <duyet2000@gmail.com>
 * @package ypCore
 */
class __CRYPT {
	private $_cryptType = 'md5';
	public function __construct() {}
	
	public function hash($input, $salt = '', $type = 'md5') {
		$input = (string) $input;
		$salt = (string) $salt;
		
		if ($type != 'sha1') {
			return md5($input . md5($salt));
		} else {
			return sha1($input . sha1($salt));
		}
	}

	public function passwordHash($password, $salt = '') {
		return $this->hash($password, md5($salt));
	}
	
	public function userLoginInfoHash($username) {
		if (empty($username)) {
			return FALSE;
		}
		$hash = array('username' => $username, 'code' => $this->passwordHash($username, 'is_user'));

		return base64_encode(base64_encode(serialize($hash)));
	}
	
	public function userLoginInfoDecode($hash) {
		$username = base64_decode(base64_decode($hash));
		if (!$username) {
			return FALSE;
		}
		$username = unserialize($username);
		if (!is_array($username)) {
			return FALSE;
		}
		if (!$username['username'] AND $username['code'] != $this->passwordHash($username['username'], 'is_user')) {
			return FALSE;
		}

		return $username['username'];
	}

	public function getSalt($lenght = 10) {
		$lenght = (int) $lenght;
		$string = 'qwertyuioplkjhgfdsazxcvbnm1234567890';
		$salt = strtoupper(md5(substr($string, rand(0, strlen($string)/2), rand(0, strlen($string)))));

		return substr($salt, 0, $lenght);
	}

	/**
	 * Get user hash for session login
	 * 
	 * @param  string $username 
	 * @param  integer $time   
	 * @param  string  $client 
	 * @param string $isAdmin
	 * @return string        
	 */
	public function getUserSessionHash($username = '', $time = 0, $client = '', $isAdmin = 'false') {
		if ($time == 0) $time = time();

		return $this->hash($userid .  $client . $isAdmin . 'ypcore' . COOKIE_PREFIX);
	}
}