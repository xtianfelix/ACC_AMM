<?php
/* @var $this NamaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Namas',
);

$this->menu=array(
	array('label'=>'Create Nama', 'url'=>array('create')),
	array('label'=>'Manage Nama', 'url'=>array('admin')),
);
?>

<h1>Namas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
