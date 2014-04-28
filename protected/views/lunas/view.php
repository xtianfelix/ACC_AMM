<?php
/* @var $this LunasController */
/* @var $model Lunas */

$this->breadcrumbs=array(
	'Lunases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Lunas', 'url'=>array('index')),
	array('label'=>'Create Lunas', 'url'=>array('create')),
	array('label'=>'Update Lunas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Lunas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lunas', 'url'=>array('admin')),
);
?>

<h1>View Lunas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lunas',
	),
)); ?>
