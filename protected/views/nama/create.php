<?php
/* @var $this NamaController */
/* @var $model Nama */

$this->breadcrumbs=array(
	'Namas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Nama', 'url'=>array('index')),
	array('label'=>'Manage Nama', 'url'=>array('admin')),
);
?>

<h1>Create Nama</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>