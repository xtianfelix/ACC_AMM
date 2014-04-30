<?php
/* @var $this TransactionController */
/* @var $model Transaction */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transaction-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php $accountList=CHtml::listData(Account::model()->findAll(), 'id', 'account'); ?>
		<?php echo $form->labelEx($model,'account_id'); ?>
		<?php echo $form->dropDownList($model,'account_id', $accountList, array(/*'class'=>'input-xlarge'*/)); ?>
		<?php echo $form->error($model,'account_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl'); ?>
		<?php echo $form->textField($model,'tgl'); ?>
		<?php echo $form->error($model,'tgl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_pb'); ?>
		<?php echo $form->textField($model,'tgl_pb'); ?>
		<?php echo $form->error($model,'tgl_pb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php $kasList=CHtml::listData(Kas::model()->findAll(), 'id', 'kas'); ?>
		<?php echo $form->labelEx($model,'kas_id'); ?>
		<?php echo $form->dropDownList($model,'kas_id', $kasList, array(/*'class'=>'input-xlarge'*/)); ?>
		<?php echo $form->error($model,'kas_id'); ?>
	</div>

	<div class="row">
		<?php $namaList=CHtml::listData(Nama::model()->findAll(), 'id', 'nama'); ?>
		<?php echo $form->labelEx($model,'nama_id'); ?><?php echo $form->dropDownList($model,'kas_id', $namaList, array(/*'class'=>'input-xlarge'*/)); ?>
		<?php echo $form->error($model,'nama_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bln_jl'); ?>
		<?php echo $form->textField($model,'bln_jl'); ?>
		<?php echo $form->error($model,'bln_jl'); ?>
	</div>
<!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'unit'); ?>
		<?php echo $form->textField($model,'unit'); ?>
		<?php echo $form->error($model,'unit'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'lunas_id'); ?>
		<?php echo $form->textField($model,'lunas_id'); ?>
		<?php echo $form->error($model,'lunas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code_id'); ?>
		<?php echo $form->textField($model,'code_id'); ?>
		<?php echo $form->error($model,'code_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num'); ?>
		<?php echo $form->textField($model,'num'); ?>
		<?php echo $form->error($model,'num'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->