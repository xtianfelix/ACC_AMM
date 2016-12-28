<?php

class TransactionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view','create','pb','update'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('createWisata','calculator'),
				'expression' => 'Yii::app()->user->can("transaction_createWisata")'
				),
			array('allow',
				'actions'=>array('delete'),
				'expression' => 'Yii::app()->user->can("cancel_transaction")'
				),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('update','index','admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Transaction;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transaction']))
		{
			$model->attributes=$_POST['Transaction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCalculator(){
		$model=new Transaction;
		$this->render('calculator',array(
			'model'=>$model,));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateWisata()
	{
		$model=new Transaction;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transaction']))
		{
			$model->attributes=$_POST['Transaction'];
			$model->kas_id=3;
			$model->lunas_id=2;
			if(strpos($model->description,"TIKET KOLAM")!==FALSE){
				$model->code_id=503;
			}elseif(strpos($model->description,"TIKET MASUK")!==FALSE){
				$model->code_id=301;
			}elseif(strpos($model->description,"PENJUALAN LIA")!==FALSE){
				$model->code_id=302;
			}elseif(strpos($model->description,"BAN PELAMPUNG")!==FALSE){
				$model->code_id=303;
			}elseif(strpos($model->description,"BAJU,CELANA,KAOS")!==FALSE){
				$model->code_id=304;
			}elseif(strpos($model->description,"LAIN2")!==FALSE){
				$model->code_id=305;
			}elseif(strpos($model->description,"FANTA COCA COLA")!==FALSE){
				$model->code_id=306;
			}elseif(strpos($model->description,"ICE CREAM")!==FALSE){
				$model->code_id=307;
			}elseif(strpos($model->description,"SOSRO")!==FALSE){
				$model->code_id=308;
			}elseif(strpos($model->description,"TIKET PARKIR")!==FALSE){
				$model->code_id=309;
			}elseif(strpos($model->description,"HYDRO COCO")!==FALSE){
				$model->code_id=310;
			}elseif(strpos($model->description,"PEMASUKAN DR JOMBANG")!==FALSE){
				$model->code_id=300;
			}elseif(strpos($model->description,"TIKET MAINAN")!==FALSE){
				$model->code_id=501;
			}elseif(strpos($model->description,"TIKET SEPEDA AIR")!==FALSE){
				$model->code_id=502;
			}

			$date = new DateTime();
			$date->setTime(0,0,0);
			$date->sub(new DateInterval('P1D'));
			if(strtotime($model->tgl)<strtotime($date->format('Y-m-d'))){
				$model->tgl=$date->format('Y-m-d');
			}

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('createWisata',array(
			'model'=>$model,
		));
	}


	public function actionPb(){
		$model=new FormModelPb;
		if(isset($_POST['FormModelPb'])){
			$model->attributes = $_POST['FormModelPb'];
			$model->handle($this);
		}

		$this->render('pb',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transaction']))
		{
			$model->attributes=$_POST['Transaction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$model->is_deleted=1;
		if($model->save()){
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('select'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Transaction',array(
			'pagination' => array('pageSize' => 50),));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Transaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Transaction']))
			$model->attributes=$_GET['Transaction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Transaction the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Transaction::model()->find(array(
			'condition'=>'account_id in (select account_id from user_account where user_id=:user_id) and id=:id',
			'params'=>array(
				':user_id'=>Yii::app()->user->data()->id,
				':id'=>$id)
		));
		if($this->isAdmin()){
			$model=Transaction::model()->find(array(
				'condition'=>'id=:id',
				'params'=>array(
					':id'=>$id)
			));
		}
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Transaction $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='transaction-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
