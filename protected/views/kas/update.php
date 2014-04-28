<?php
/* @var $this KasController */
/* @var $model Kas */

$this->breadcrumbs=array(
	'Kases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kas', 'url'=>array('index')),
	array('label'=>'Create Kas', 'url'=>array('create')),
	array('label'=>'View Kas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kas', 'url'=>array('admin')),
);
?>

<h1>Update Kas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>