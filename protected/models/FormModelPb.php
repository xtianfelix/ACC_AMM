<?php
class FormModelPb extends CFormModel
{
	public $tgl;
	public $tglPb;
	public $description;
	public $num;
	public $to_account_id;
	public $from_account_id;

	public function rules()
	{
		$rules = array();/*
		$rules[] = array('email, subject, message', 'required', 'message' => '{attribute} is required');
		$rules[] = array('email', 'email', 'message' => '{attribute} is not valid');*/
		$rules[] = array('tgl', 'safe');
		$rules[] = array('tglPb', 'safe');
		$rules[] = array('description', 'safe');
		$rules[] = array('num', 'safe');
		$rules[] = array('to_account_id', 'safe');
		$rules[] = array('from_account_id', 'safe');
		return $rules;
	}

	public function handle($controller){
		$toTransaction=new Transaction;
		$fromTransaction=new Transaction;

		$toTransaction->description = $this->description;
		$fromTransaction->description = $this->description;
		$toTransaction->num = $this->num;
		$fromTransaction->num = -$this->num;
		$toTransaction->account_id = $this->to_account_id;
		$fromTransaction->account_id = $this->from_account_id;

		if(($fromTransaction->save())&&($toTransaction->save())){
			$controller->redirect(array('account/view','id'=>$this->to_account_id));
		}

	}
}
