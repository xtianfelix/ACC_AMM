<?php
/* @var $this NamaController */
/* @var $model Nama */

$this->breadcrumbs=array(
	'Namas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Nama', 'url'=>array('index')),
	array('label'=>'Create Nama', 'url'=>array('create')),
	array('label'=>'Update Nama', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Nama', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf' => true)),
	array('label'=>'Manage Nama', 'url'=>array('admin')),
);
?>

<h1>View Nama #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>
