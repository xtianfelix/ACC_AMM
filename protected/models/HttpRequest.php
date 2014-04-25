<?php

class HttpRequest extends CHttpRequest
{
	public $noCsrfValidationRoutes = array();
	
	protected function normalizeRequest()
	{
		parent::normalizeRequest();
		
		if($this->enableCsrfValidation)
		{
			$url = Yii::app()->getUrlManager()->parseUrl($this);
			
			//	Force validate CSRF on specified routes
			foreach($this->noCsrfValidationRoutes as $route)
			{
				if(strpos($url, $route) === 0)
					Yii::app()->detachEventHandler('onBeginRequest', array($this, 'validateCsrfToken'));
			}
		}
	}
	
	public function getCsrfToken($extra = NULL)
	{
		$csrf = parent::getCsrfToken();
		
		if($extra)
			$csrf = sha1($csrf.$extra);
		
		return $csrf;
	}
}