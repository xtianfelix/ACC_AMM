<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */

$this->breadcrumbs=array(
	'Penjualan'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Penjualan', 'url'=>array('index')),
	array('label'=>'Create Penjualan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#penjualan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Penjualan</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'penjualan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array( 'name'=>'merk_search', 'value'=>'$data->stock->MERK' ),
		'customer_id',
		'NAMA_LEASING',
		'POKOK_HUTANG',
		'DP',
		/*
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
		'BIAYA_MAINTENANCE',
		'is_deleted',
		'insert_timestamp',
		'update_timestamp',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
