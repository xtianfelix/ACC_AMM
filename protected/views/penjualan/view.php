<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */

$this->breadcrumbs=array(
	'Penjualans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Penjualan', 'url'=>array('index')),
	array('label'=>'Create Penjualan', 'url'=>array('create')),
	array('label'=>'Update Penjualan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Penjualan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Penjualan', 'url'=>array('admin')),
);
?>

<h2>Informasi Penjualan Nomor <?php echo $model->id; ?></h2>

<h3>Informasi Kendaraan</h3>
	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model->stock,
		'attributes'=>array(
			'NOMOBIL',
			'NOGOLONGANKENDARAAN',
			array(            
	            'label'=>'BARU/BEKAS',
	            'type'=>'raw',
	            'value'=>$model->stock->LELANG_BEKAS_BARU==1?"BARU":"BEKAS",
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
	            'value'=>$model->stock->sUPPLIER->company,
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
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'NAMA_LEASING',
		'POKOK_HUTANG',
		'DP',
		'ASURANSI',
		'JENIS_ASURANSI',
		'LAMA_ANGSURAN',
		'LKALI_ANGSURAN',
		'ANGSURAN',
		'TOTAL_UANG_MUKA',
		'TANGGAL_REFUND',
		'TOTAL_REFUND_ASURANSI',
		'TANGGAL_TERJUAL',
		'NAMA_MAKELAR',
		'HARGA_OTR',
		'CASHBACK',
		'KETERANGAN_TRANSAKSI',
		'TANGGAL_CAIR',
		'PENCAIRAN',
		'TOTAL_BAYAR',
		'KEKURANGAN',
		'BIAYA_MAINTENANCE',/*
		'is_deleted',
		'insert_timestamp',
		'update_timestamp',*/
	),
)); ?>
