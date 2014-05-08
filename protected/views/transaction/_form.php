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
		<?php $accountList=CHtml::listData(Yii::app()->user->data()->userAccounts, 'account_id', 'account.account'); ?>
		<?php echo $form->labelEx($model,'account_id'); ?>
		<?php echo $form->dropDownList($model,'account_id', $accountList, array(/*'class'=>'input-xlarge'*/)); ?>
		<?php echo $form->error($model,'account_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl'); ?>
		<?php echo $form->textField($model,'tgl',array(/*'class'=>'input-xlarge',*/'id'=>'dp1')); ?>
		<?php echo $form->error($model,'tgl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_pb'); ?>
		<?php echo $form->textField($model,'tgl_pb',array(/*'class'=>'input-xlarge',*/'id'=>'dp2')); ?>
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
		<?php $codeList=CHtml::listData(Code::model()->findAll(), 'id', 'id'); ?>
		<?php echo $form->dropDownList($model,'code_id', $codeList, array(/*'class'=>'input-xlarge'*/)); ?>
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

<script type="text/javascript">
	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

 	$(document).ready( function() {

    	$("#pop").popover();
    	var dp1=$('#dp1').datepicker({
			format: 'yyyy-mm-dd',
			onRender: function(date) {
			  return date.valueOf() < now.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function(ev){
			$('#dp1').datepicker('hide');
			dp2.setValue(ev.date);
		}).data('datepicker');
		var dp2=$('#dp2').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp2').datepicker('hide');
		}).data('datepicker');


		dp1.setValue(nowTemp);
		dp2.setValue(nowTemp);

		$('#dp3').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp3').datepicker('hide');
		});
	}); 
</script>