<?php
// protected/components/MyClass.php
 
class ReportFactory {
	private $model;
	private $type;
	private $period;
	private $formatSubHeader;
	private $interval;
	private $template;
	private $isAdmin;
	function ReportFactory($model,$isAdmin) {
		$this->model = $model;
		$this->isAdmin = $isAdmin;

		$this->type=$model->jenisLaporan;
		$tempBegin=$model->fromDate;
		$tempEnd=$model->toDate;
		$periodText=$model->periodeLaporan;

		switch ($periodText) {
			case 1:
				$periodText='day';
				$this->formatSubHeader='d F Y';
				break;
			case 2:
				$periodText='month';
				$this->formatSubHeader='F Y';
				break;
			default:
				$periodText='year';
				$this->formatSubHeader='Y';
				break;
		}
		$rows=array();
		$begin = new DateTime( $tempBegin );
		$end = new DateTime( $tempEnd );

		$this->interval = DateInterval::createFromDateString('1 '.$periodText);
		$end=$end->add($this->interval);
		$this->period = new DatePeriod($begin, $this->interval, $end);
	}
	function getTemplate(){
    	return 'penjualan_csv';
	}
    function getRows() {
    	$model = $this->model;
		$account_id=$model->account_id;
		$interval = $this->interval;
		$rows=array();
		switch ($this->type) {
			case 1:
				/*------------- LAPORAN DETAIL PENJUALAN -------------*/
				foreach ( $this->period as $dt ){
				  	$tempBegin = $dt->format( "Y-m-d" );
				  	$tempEnd = $dt->add($interval)->format( "Y-m-d" );

					$filterAccount=" and :account_id=:account_id";
					$bindings = array(
						':awal' => $tempBegin,
						':akhir' => $tempEnd,
					);
					$filters = '';
					if($account_id!=0){
						$filters.=" and account_id=:account_id";
						$bindings[':account_id'] = $account_id;
					}
					$row = Transaction::model()
						->findAll('tgl>=:awal AND tgl<:akhir'.$filters,
							$bindings
						);
					if(count($row)!=0){
						$tempBeginDate=new DateTime($tempBegin);
						$rows[$tempBeginDate->format( $this->formatSubHeader )]=$row;
					}
				}
				/*------------- LAPORAN DETAIL PENJUALAN -------------*/
				break;
			default:
				$this->template='stock';
				break;
		}
		return $rows;
    }
    function getCSVRows(){
    	$rows = $this->getRows();
		$CSVRows = array();
		switch($this->type){
			case 1:
				$this->template = "_csv";
				$CSVRows[] = array(
					'"ID"', 
					'"ACCOUNT"', 
					'"KAS"', 
					'"TGL"', 
					'"TGL_PB"', 
					'"NAMA"', 
					'"KWT"', 
					'"LUNAS"', 
					'"CODE"', 
					'"DEBET"', 
					'"KREDIT"', 
				);
/*				if($this->isAdmin){
					$CSVRows[0][] = '"HPP"';
					$CSVRows[0][] = '"LABA"';
				}*/
				foreach($rows as $key => $row){
					foreach($row as $key => $value){
						$CSVRow = array(
							$value->id, 
							$value->account->account, 
							$value->kas->kas, 
							$value->tgl, 
							$value->tgl_pb, 
							$value->nama->nama, 
							$value->kwt, 
							$value->lunas->lunas,
							$value->code->id, 
						);
						if($value->num>=0){
							$CSVRow[] = $value->num;
							$CSVRow[] = '';
						}else{
							$CSVRow[] = '';
							$CSVRow[] = -$value->num;
						}
/*						if($this->isAdmin){
							$CSVRow[] = number_format($value->stock->totalBiaya()+$value->stock->HARGAPOKOK,0,'',',');
							$CSVRow[] = number_format($value->HARGA_OTR-($value->stock->totalBiaya()+$value->stock->HARGAPOKOK),0,'',',');
						}*/
						$CSVRows[] = $CSVRow;
					}
				}
				break;
			default:
				$CSVRows[] = array("Maaf belum di implementasi, mohon pilih 'no' untuk download CSV");
				break;
		}
		return $CSVRows;
    }
    function getViewModel(){
    	return $this->getCSVRows();
    }
}

?>