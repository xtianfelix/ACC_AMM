<?php
/* @var $this LunasController */
/* @var $data Lunas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lunas')); ?>:</b>
	<?php echo CHtml::encode($data->lunas); ?>
	<br />


</div>