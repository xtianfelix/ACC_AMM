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
	<?php $fromAccountList=CHtml::listData(Yii::app()->user->data()->userAccounts, 'account_id', 'account.account'); ?>
	<?php $accountList=CHtml::listData(Account::model()->findAll(), 'id', 'account'); ?>
	From Account: <?php echo $form->dropDownList($model,'from_account_id', $fromAccountList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	To Account: <?php echo $form->dropDownList($model,'to_account_id', $accountList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	<?php $kasList=CHtml::listData(Kas::model()->findAll(), 'id', 'kas'); ?>
	From Kas: <?php echo $form->dropDownList($model,'from_kas_id', $kasList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	To Kas: <?php echo $form->dropDownList($model,'to_kas_id', $kasList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	<?php $codeList=array('215'=>'215', '216'=>'216', '230'=>'230', '231'=>'231', '232'=>'232', '233'=>'233', '415'=>'415', '416'=>'416', '430'=>'430', '431'=>'431', '715'=>'715', '716'=>'716', '730'=>'730', '731'=>'731', '915'=>'915', '916'=>'916', '930'=>'930', '931'=>'931', '932'=>'932', '100'=>'100', '101'=>'101', '300'=>'300', '600'=>'600', '800'=>'800') ; ?>
	Kode: <?php echo $form->dropDownList($model,'code_id', $codeList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	<?php $namaList=CHtml::listData(Nama::model()->findAll(), 'id', 'nama'); ?>
	Nama: <?php echo $form->dropDownList($model,'nama_id', $namaList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	Num: <?php echo $form->textField($model,'num'); ?>
	<br/>
	Desc: <?php echo $form->textField($model,'description'); ?>
	<br/>
	tgl: <?php echo $form->textField($model,'tgl',array(/*'class'=>'input-xlarge',*/'id'=>'dp1')); ?>
	<br/>
	tglPb: <?php echo $form->textField($model,'tglPb',array(/*'class'=>'input-xlarge',*/'id'=>'dp2')); ?>
	<br/>
	<?php echo CHtml::submitButton('Submit'); ?>
<?php $this->endWidget(); ?><!-- newTransaction -->

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
