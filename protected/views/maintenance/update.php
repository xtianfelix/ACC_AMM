<?php
/* @var $this MaintenanceController */
/* @var $model Maintenance */

$this->breadcrumbs=array(
	'Maintenances'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Maintenance', 'url'=>array('index')),
	array('label'=>'Create Maintenance', 'url'=>array('create')),
	array('label'=>'View Maintenance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Maintenance', 'url'=>array('admin')),
);
?>

<h1>Update Maintenance <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'mobil'=>$mobil)); ?>