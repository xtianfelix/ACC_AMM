<?php
/* @var $this StockController */
/* @var $model Stock */

$this->breadcrumbs=array(
	'Stocks'=>array('index'),
	$model->NOMOBIL,
);

$this->menu=array(
	array('label'=>'List Stock', 'url'=>array('index')),
	array('label'=>'Create Stock', 'url'=>array('create')),
	array('label'=>'Update Stock', 'url'=>array('update', 'id'=>$model->NOMOBIL)),
	array('label'=>'Delete Stock', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->NOMOBIL),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Stock', 'url'=>array('admin')),
);
?>
<style type="text/css">
	table.detail-view{
		width:50%;
		float:left;
	}
	div.content-container{
		float:left;
		width:100%;
		clear: both;
	}
</style>
<h1>View Stock #<?php echo $model->NOMOBIL; ?></h1>
<div class='content-container'>
	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'NOMOBIL',
			'NOGOLONGANKENDARAAN',
			array(            
	            'label'=>'BARU/BEKAS',
	            'type'=>'raw',
	            'value'=>$model->LELANG_BEKAS_BARU==1?"BARU":"BEKAS",
	        ),
			'MERK',
			'TYPE',
			'TAHUN',
			'WARNA',/*
			'NAMASTNK',
			'BPKB',
			'FAKTUR',
			'BUDGETSALES',
			'HARGAPOKOK',
			'HARGADASARLELANG',
			'FEELELANG',
			'BIAYAADMINLELANG',
			'OTRLELANG',
			'FILENAME',*/
			'NOPOL',
			'NORANGKA',
			'NOMESIN',
			'TGLBELI',
			'TGLKIRIM',
			'TGLPAJAK',
			array(            
	            'label'=>'SUPPLIER',
	            'type'=>'raw',
	            'value'=>$model->sUPPLIER->company,
	        ),
			'DESC',
			'STATUS',
			'LOCATION',
			'PIC',/*
			'is_deleted',
			'insert_timestamp',
			'update_timestamp',*/
		),
	)); 

?>
</div>

