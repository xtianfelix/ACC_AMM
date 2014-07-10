<?php
/* @var $this TransactionController */
/* @var $model Transaction */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'account_id'); ?>
		<?php echo $form->textField($model,'account_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl'); ?>
		<?php echo $form->textField($model,'tgl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_pb'); ?>
		<?php echo $form->textField($model,'tgl_pb'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kas_id'); ?>
		<?php echo $form->textField($model,'kas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_id'); ?>
		<?php echo $form->textField($model,'nama_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bln_jl'); ?>
		<?php echo $form->textField($model,'bln_jl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit'); ?>
		<?php echo $form->textField($model,'unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lunas_id'); ?>
		<?php echo $form->textField($model,'lunas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code_id'); ?>
		<?php echo $form->textField($model,'code_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num'); ?>
		<?php echo $form->textField($model,'num'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->