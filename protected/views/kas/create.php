<?php
/* @var $this KasController */
/* @var $model Kas */

$this->breadcrumbs=array(
	'Kases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kas', 'url'=>array('index')),
	array('label'=>'Manage Kas', 'url'=>array('admin')),
);
?>

<h1>Create Kas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>