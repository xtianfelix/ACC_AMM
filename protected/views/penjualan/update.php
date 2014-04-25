<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */

$this->breadcrumbs=array(
	'Penjualans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Penjualan', 'url'=>array('index')),
	array('label'=>'Create Penjualan', 'url'=>array('create')),
	array('label'=>'View Penjualan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Penjualan', 'url'=>array('admin')),
);
?>

  	<div class="page-header" style="margin-bottom:0px;">
  		<h1>Transaksi <small>Penjualan.</small></h1>
	</div>
<h4>Update Penjualan <?php echo $model->id; ?></h4>

<?php $this->renderPartial('_form', array('model'=>$model,
			'mobil'=>$mobil,
			'customer'=>$customer,)); ?>