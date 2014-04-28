<?php
/* @var $this KasController */
/* @var $model Kas */

$this->breadcrumbs=array(
	'Kases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kas', 'url'=>array('index')),
	array('label'=>'Create Kas', 'url'=>array('create')),
	array('label'=>'Update Kas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kas', 'url'=>array('admin')),
);
?>

<h1>View Kas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kas',
	),
)); ?>
