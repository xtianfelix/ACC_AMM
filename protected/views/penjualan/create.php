<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */
/* @var $model modelCustomer */

$this->breadcrumbs=array(
	'Penjualans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Penjualan', 'url'=>array('index')),
	array('label'=>'Manage Penjualan', 'url'=>array('admin')),
);
?>

  	<div class="page-header" style="margin-bottom:0px;">
  		<h1>Transaksi <small>Penjualan.</small></h1>
	</div>

<?php $this->renderPartial('_form', array('model'=>$model,'mobil'=>$mobil,'customer'=>$customer)); ?>