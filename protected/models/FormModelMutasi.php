<?php
class FormModelMutasi extends CFormModel
{
	public $jenisLaporan;
	public $periodeLaporan;
	public $fromDate;
	public $toDate;
	public $account_id;
	public $supplier_id;

	public function rules()
	{
		$rules = array();
		$rules[] = array('account_id', 'required', 'message' => '{attribute} is required');/*
		$rules[] = array('email', 'email', 'message' => '{attribute} is not valid');*/
		$rules[] = array('jenisLaporan', 'safe');
		$rules[] = array('periodeLaporan', 'safe');
		$rules[] = array('fromDate', 'safe');
		$rules[] = array('toDate', 'safe');
		$rules[] = array('account_id', 'safe');
		$rules[] = array('supplier_id', 'safe');
		return $rules;
	}
}
