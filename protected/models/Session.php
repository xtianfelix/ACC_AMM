<?php

class Session extends CDbHttpSession
{
	public function userId()
	{
		if(isset($this['user_id']))
			return $this['user_id'];
		return FALSE;
	}
	
	public function setUserId($user_id)
	{
		$this->clear();
		$this['user_id'] = $user_id;
	}
	
	public function tmpUserId()
	{
		if(isset($this['tmp_user_id']))
			return $this['tmp_user_id'];
		return FALSE;
	}
	
	public function setTmpUserId($user_id)
	{
		$this->clear();
		$this['tmp_user_id'] = $user_id;
	}
	
	public function logout()
	{
		$this->clear();
		$this->destroy();
	}
}