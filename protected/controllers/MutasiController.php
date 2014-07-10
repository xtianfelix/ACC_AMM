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
		$type=$model->jenisLaporan;
		$tempBegin=$model->fromDate;
		$tempEnd=$model->toDate;
		$periodText=$model->periodeLaporan;
		$account_id=$model->account_id;
		$supplier_id=$model->supplier_id;

		switch ($periodText) {
			case 1:
				$periodText='day';
				$formatSubHeader='d F Y';
				break;
			case 2:
				$periodText='month';
				$formatSubHeader='F Y';
				break;
			default:
				$periodText='year';
				$formatSubHeader='Y';
				break;
		}
		$rows=array();
		$begin = new DateTime( $tempBegin );
		$end = new DateTime( $tempEnd );

		$interval = DateInterval::createFromDateString('1 '.$periodText);
		$end=$end->add($interval);
		$period = new DatePeriod($begin, $interval, $end);

		switch ($type) {
			case 1:
				$type='detail';
				/*------------- LAPORAN DETAIL MUTASI -------------*/
				foreach ( $period as $dt ){
				  	$tempBegin = $dt->format( "Y-m-d" );
				  	$tempEnd = $dt->add($interval)->format( "Y-m-d" );

					$filterAccount=" and :account_id=:account_id";
					if($account_id!=0){
						$filterAccount=" and account_id=:account_id";
					}
					$row = Transaction::model()
						->findAll('tgl>=:awal AND tgl<:akhir'.$filterAccount,
						array(':awal' => $tempBegin,
							':akhir' => $tempEnd,
							':account_id' => $account_id,
						));
					if(count($row)!=0){
						$tempBeginDate=new DateTime($tempBegin);
						$rows[$tempBeginDate->format( $formatSubHeader )]=$row;
					}
				}
				/*------------- LAPORAN DETAIL MUTASI -------------*/
				break;
			case 2:
				$type='pembelian';
				/*------------- LAPORAN DETAIL PEMBELIAN -------------*/
				foreach ( $period as $dt ){
				  	$tempBegin = $dt->format( "Y-m-d" );
				  	$tempEnd = $dt->add($interval)->format( "Y-m-d" );

					$row = Stock::model()->list()->findAll('TGLBELI>=:awal AND TGLBELI<:akhir',
						array(':awal' => $tempBegin,
							':akhir' => $tempEnd,
						));
					if(count($row)!=0){
						$tempBeginDate=new DateTime($tempBegin);
						$rows[$tempBeginDate->format( $formatSubHeader )]=$row;
					}
				}
				/*------------- LAPORAN DETAIL PEMBELIAN -------------*/
				break;
			case 3:
				/*------------- LAPORAN SUMMARY PENJUALAN -------------*/
				$type='summary';

				$locationList=Location::model()->findAll();
				$countifs="";
				foreach($locationList as $location){
					$countifs.='COUNT(IF(pj.location_id='.$location->id.',1,NULL)) AS "'.$location->location.'",';	
				}

				$tempBegin = $begin->format( "Y" );
				$command = Yii::app()->db->createCommand(
					'SELECT IF(s.LELANG_BEKAS_BARU=1,"BARU","BEKAS") as "LELANG_BEKAS_BARU",MONTH(pj.TANGGAL_TERJUAL) as"MONTH",
						'.$countifs.'
						COUNT(*) AS "TOTAL"
					FROM stock s INNER JOIN penjualan pj ON s.NOMOBIL=pj.`stock_id`
					WHERE YEAR(pj.`TANGGAL_TERJUAL`)='.$tempBegin.' AND s.LELANG_BEKAS_BARU=1
					GROUP BY s.`LELANG_BEKAS_BARU`, MONTH(pj.`TANGGAL_TERJUAL`);');
				$reader=$command->query();
				
				if(count($reader)!=0){
					$rows["BARU"]=$reader;
				}
				$command = Yii::app()->db->createCommand(
					'SELECT IF(s.LELANG_BEKAS_BARU=1,"BARU","BEKAS") as "LELANG_BEKAS_BARU",MONTH(pj.TANGGAL_TERJUAL) as"MONTH",
						'.$countifs.'
						COUNT(*) AS "TOTAL"
					FROM stock s INNER JOIN penjualan pj ON s.NOMOBIL=pj.`stock_id`
					WHERE YEAR(pj.`TANGGAL_TERJUAL`)='.$tempBegin.' AND s.LELANG_BEKAS_BARU=0
					GROUP BY s.`LELANG_BEKAS_BARU`, MONTH(pj.`TANGGAL_TERJUAL`);');
				$reader=$command->query();

				if(count($reader)!=0){
					$rows["BEKAS"]=$reader;
				}
				/*------------- LAPORAN SUMMARY PENJUALAN -------------*/
				break;
			case 4:
				$type='stock';
				/*------------- LAPORAN STOCK PER TANGGAL -------------*/
				foreach ( $period as $dt ){
				  	$tempBegin = trim($dt->format( "Y-m-d" ));
				  	$tempEnd = $dt->add($interval)->format( "Y-m-d" );

					$row = Stock::model()
						->with(array('penjualan'))
						->findAll('penjualan.TANGGAL_TERJUAL>:awal AND TGLBELI<:awal OR penjualan.TANGGAL_TERJUAL is null',
							array(':awal' => $tempBegin,
							)
						);
					if(count($row)!=0){
						$tempBeginDate=new DateTime($tempBegin);
						$rows[]=$row;
					}
					break;
				}
				/*------------- LAPORAN STOCK PER TANGGAL -------------*/
				break;
			default:
				$type='stock';
				break;
		}
		
		$this->render($type,array('period'=>$periodText,'rows'=>$rows));
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