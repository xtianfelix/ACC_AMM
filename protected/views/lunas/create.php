<?php
/* @var $this LunasController */
/* @var $model Lunas */

$this->breadcrumbs=array(
	'Lunases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lunas', 'url'=>array('index')),
	array('label'=>'Manage Lunas', 'url'=>array('admin')),
);
?>

<h1>Create Lunas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>