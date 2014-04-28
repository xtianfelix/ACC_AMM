<?php
/* @var $this KasController */
/* @var $data Kas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kas')); ?>:</b>
	<?php echo CHtml::encode($data->kas); ?>
	<br />


</div>