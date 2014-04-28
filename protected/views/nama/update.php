<?php
/* @var $this NamaController */
/* @var $model Nama */

$this->breadcrumbs=array(
	'Namas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Nama', 'url'=>array('index')),
	array('label'=>'Create Nama', 'url'=>array('create')),
	array('label'=>'View Nama', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Nama', 'url'=>array('admin')),
);
?>

<h1>Update Nama <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>