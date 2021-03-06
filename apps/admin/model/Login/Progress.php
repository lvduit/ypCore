<?php 
class Model_Admin_Login_Progress extends ypModel {
	public function GetUserInfo($username) {
		if (empty($username)) return FALSE;

		$this->Loader->helper('Email');

		if (isEmail($username)) {
			$this->Db->query("SELECT * FROM `yp_users` WHERE `email` = '". $this->Db->e($username) . "'");
		} else {
			$this->Db->query("SELECT * FROM `yp_users` WHERE `username` = '". $this->Db->e($username) . "'");
		}
		if ($this->Db->num_rows() == 0) return FALSE;

		return $this->Db->fetch();
	}
}