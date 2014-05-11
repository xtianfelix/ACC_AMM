<?php
class FormModelPb extends CFormModel
{
	public $tgl;
	public $tglPb;
	public $description;
	public $num;
	public $to_account_id;
	public $from_account_id;
	public $to_kas_id;
	public $from_kas_id;
	public $code_id;
	public $nama_id;

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
		$rules[] = array('to_kas_id', 'safe');
		$rules[] = array('from_kas_id', 'safe');
		$rules[] = array('code_id', 'safe');
		$rules[] = array('nama_id', 'safe');
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
		$toTransaction->kas_id = $this->to_kas_id;
		$fromTransaction->kas_id = $this->from_kas_id;
		$toTransaction->nama_id = $this->nama_id;
		$fromTransaction->nama_id = $this->nama_id;
		$toTransaction->lunas_id = '1';
		$fromTransaction->lunas_id = '1';
		$toTransaction->code_id = $this->code_id;
		$fromTransaction->code_id = $this->code_id;

		$toTransaction->tgl = $this->tgl;
		$fromTransaction->tgl = $this->tgl;
		$toTransaction->tgl_pb = $this->tglPb;
		$fromTransaction->tgl_pb = $this->tglPb;

		if(($fromTransaction->save())&&($toTransaction->save())){
			$controller->redirect(array('transaction/view','id'=>$fromTransaction->id));
		}

	}
}
