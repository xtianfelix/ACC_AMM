<?php

class Controller extends CController
{
	private $needs_user = TRUE;
	protected $loggedin_user = NULL;
	public $menu=array();
	public $breadcrumbs=array();
	
	public function loggedInUser()
	{
/*		if($this->needs_user && !$this->loggedin_user)
		{
			$this->loggedin_user = User::model()->loggedInUser();
			$this->needs_user = FALSE;
		}
		
		return $this->loggedin_user;*/
		if(Yii::app()->user->isGuest)
			return false;
		else
			return true;
	}
	
	public function setLoggedInUser($user)
	{
		Yii::app()->session->setUserId($user->id);
	}
	
	public function setFlash($key, $value, $defaultValue = NULL)
	{
		Yii::app()->user->setFlash($key, $value, $defaultValue);
	}
	
	protected function beforeRender($view)
	{
		//	Pick a layout if one isn't set
		if(!$this->layout)
		{
			//	Pick the most appropriate layout for this user
			if($this->loggedInUser())
				$this->layout = 'column1';
			else
				$this->layout = 'column2';
		}
		
		return parent::beforeRender($view);
	}
	
	public function redirectToHome($user = NULL)
	{
/*		if($user == NULL)
			$user = $this->loggedInUser();
		
		if($user)
		{
			$this->redirect('/home');
		}
		else
		{
			$this->redirectToAnonymousPage();
		}*/
		$this->redirect('site/');
	}
	
	public function redirectToAnonymousPage()
	{
		$this->redirect(array_merge(array('/user/login'), $_GET));
	}
	
	public function flashHtml()
	{
		//	Flash message(s) to sit at the top of any 'flash message' supporting page
		if(Yii::app()->user->hasFlash('success')) { ?>
		<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
		</div>
		<?php }
		
		if(Yii::app()->user->hasFlash('notice')) { ?>
		<div class="flash-notice">
		<?php echo Yii::app()->user->getFlash('notice'); ?>
		</div>
		<?php }
		
		if(Yii::app()->user->hasFlash('error')) { ?>
		<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('error'); ?>
		</div>
		<?php }
	}
	public function isAdmin(){
		if(Yii::app()->user->getName()==='admin')
			return true;
		else
			return false;
	}
}