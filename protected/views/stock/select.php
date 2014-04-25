<?php
/* @var $this StockController */
/* @var $model Stock */

$this->breadcrumbs=array(
	'Stocks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Stock', 'url'=>array('index')),
	array('label'=>'Create Stock', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#stock-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Stocks</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));
$nextUrl="stock/update";
if(isset($_GET['from'])){
	if($_GET['from']=="penjualan")
		$nextUrl="penjualan/create";
	else if($_GET['from']=="maintenance")
		$nextUrl="maintenance/create";
}
 ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stock-grid',
	'dataProvider'=>$model->searchAvailable(),
	'filter'=>$model,
	'columns'=>array(
		'TGLBELI',
		'NOPOL',
		'MERK',
		'TYPE',
		'TAHUN',
		'WARNA',
		/*
		'NOMOBIL',
		'NOGOLONGANKENDARAAN',
		'LELANG_BEKAS_BARU',
		'NAMASTNK',
		'BPKB',
		'FAKTUR',
		'BUDGETSALES',
		'HARGAPOKOK',
		'HARGADASARLELANG',
		'FEELELANG',
		'BIAYAADMINLELANG',
		'OTRLELANG',
		'FILENAME',
		'NORANGKA',
		'NOMESIN',
		'TGLKIRIM',
		'TGLPAJAK',
		'SUPPLIER_ID',
		'DESC',
		'STATUS',
		'LOCATION',
		'PIC',
		'is_deleted',
		'insert_timestamp',
		'update_timestamp',
		*/
		array(
			'class'=>'CButtonColumn',
	        'template'=>'{select}',
            'buttons'=>array(
		        'select' => array
		        (
		            'label'=>'Pilih',
		            'url'=>'Yii::app()->createUrl("'.$nextUrl.'", array("id"=>$data->NOMOBIL,"cid"=>"'.$cid.'"))',
		        ),
            ),
	        'viewButtonOptions'=>array('onclick'=>'return false;',),
		),
	),
)); ?>
