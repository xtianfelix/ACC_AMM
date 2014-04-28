<?php
/* @var $this LunasController */
/* @var $model Lunas */

$this->breadcrumbs=array(
	'Lunases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lunas', 'url'=>array('index')),
	array('label'=>'Create Lunas', 'url'=>array('create')),
	array('label'=>'View Lunas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lunas', 'url'=>array('admin')),
);
?>

<h1>Update Lunas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>