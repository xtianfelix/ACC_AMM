<?php

class MutasiController extends Controller
{
	public function actionIndex()
	{
		$model = new FormModelMutasi;
		$this->render('index',array('model' => $model));
	}
	public function actionGenerate()
	{
		$model = new FormModelMutasi;
		if(isset($_POST['FormModelMutasi']))
		{
			$model->attributes = $_POST['FormModelMutasi'];
		}
		$factory = new ReportFactory($model,$this->isAdmin());
		$periodText=$model->periodeLaporan;
		$rows = $factory->getViewModel();
		$this->renderPartial('_csv',array('period'=>$periodText,'rows'=>$rows));
	}


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('generate','index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}