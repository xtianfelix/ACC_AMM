<?php

class ActiveRecord extends CActiveRecord
{
	public function getFirstError()
	{
		foreach($this->errors as $error)
			return $error[0];
		return NULL;
	}
	
	//	The context defines where this is being used,
	//	each record should recognise a whitelist of contexts
	//	depending on the context, certain information should/shouldn't be returned
	public function contextDictionary($context = '')
	{
		return array();
	}
	
	public function insert($attributes = null)
	{
		if($this->hasAttribute('insert_timestamp'))
			$this->insert_timestamp = time();
		if($this->hasAttribute('insert_user_id'))
			$this->insert_user_id = Yii::app()->user->data()->id;
		if($this->hasAttribute('is_deleted'))
			$this->is_deleted = 0;
		return parent::insert($attributes);
	}
	
	protected function beforeSave()
	{
		if($this->hasAttribute('update_timestamp'))
			$this->update_timestamp = time();
		if($this->hasAttribute('update_user_id'))
			$this->update_user_id = Yii::app()->user->data()->id;
		return parent::beforeSave();
	}
	
	protected function appendSafeAttributes(&$dictionary, $safe_attributes)
	{
		foreach($safe_attributes as $safe_attribute)
			$dictionary[$safe_attribute] = $this->$safe_attribute;
	}
}