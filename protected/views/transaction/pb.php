<?php
/* @var $this TransactionController */
/* @var $model FormModelPb */

?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'newPb',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
                          //'class'=>'form-horizontal',
                        ),
)); ?>
	<?php $accountList=CHtml::listData(Account::model()->findAll(), 'id', 'account'); ?>
	From: <?php echo $form->dropDownList($model,'from_account_id', $accountList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	To: <?php echo $form->dropDownList($model,'to_account_id', $accountList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	Num: <?php echo $form->textField($model,'num'); ?>
	<br/>
	Desc: <?php echo $form->textField($model,'description'); ?><!-- 
	<br/>
	tgl: <?php echo $form->textField($model,'tgl'); ?>
	<br/>
	tglPb: <?php echo $form->textField($model,'tglPb'); ?> -->
	<br/>
	<?php echo CHtml::submitButton('Submit'); ?>
<?php $this->endWidget(); ?><!-- newTransaction -->
