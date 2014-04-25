<?php
/* @var $this MaintenanceController */
/* @var $data Maintenance */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock_id')); ?>:</b>
	<?php echo CHtml::encode($data->stock_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TGLTRANSAKSI')); ?>:</b>
	<?php echo CHtml::encode($data->TGLTRANSAKSI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biaya')); ?>:</b>
	<?php echo CHtml::encode($data->biaya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->is_deleted); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('insert_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->insert_timestamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->update_timestamp); ?>
	<br />

	*/ ?>

</div>