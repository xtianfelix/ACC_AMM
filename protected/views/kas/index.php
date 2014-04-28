<?php
/* @var $this KasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kases',
);

$this->menu=array(
	array('label'=>'Create Kas', 'url'=>array('create')),
	array('label'=>'Manage Kas', 'url'=>array('admin')),
);
?>

<h1>Kases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
