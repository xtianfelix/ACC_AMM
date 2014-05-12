<?php
/* @var $this TransactionController */
/* @var $model Transaction */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Transaction', 'url'=>array('index')),
	array('label'=>'Manage Transaction', 'url'=>array('admin')),
);

$nama_ids="";
if(Yii::app()->user->data()->username=="lia"){
	$nama_ids="3497";
}elseif(Yii::app()->user->data()->username=="rena"){
	$nama_ids="3491";
}elseif(Yii::app()->user->data()->username=="ferry"){
	$nama_ids="3491,3,896,3492,3493,3494,3495,3496,3497";
}elseif(Yii::app()->user->data()->username=="joko"){
	$nama_ids="3491,3,896,3492,3493,3494,3495,3496,3497";
}
?>

<h1>Create Transaction</h1>

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

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'tgl_pb'); ?>
		<?php echo $form->textField($model,'tgl_pb',array(/*'class'=>'input-xlarge',*/'id'=>'dp2')); ?>
		<?php echo $form->error($model,'tgl_pb'); ?>
	</div>

	<div class="row">
		<?php $descriptionList=array('TIKET KOLAM DEWASA :20'=>'TIKET KOLAM DEWASA :20','TIKET KOLAM DEWASA :15'=>'TIKET KOLAM DEWASA :15','TIKET KOLAM ANAK :15'=>'TIKET KOLAM ANAK :15','TIKET KOLAM ANAK :10'=>'TIKET KOLAM ANAK :10','TIKET KOLAM ROMBONGAN DEWASA : 18'=>'TIKET KOLAM ROMBONGAN DEWASA : 18','TIKET KOLAM ROMBONGAN DEWASA : 13.5'=>'TIKET KOLAM ROMBONGAN DEWASA : 13.5','TIKET KOLAM ROMBONGAN ANAK : 13.5'=>'TIKET KOLAM ROMBONGAN ANAK : 13.5','TIKET KOLAM ROMBONGAN ANAK : 9'=>'TIKET KOLAM ROMBONGAN ANAK : 9','TIKET KOLAM ROMBONGAN ANAK : 7.5'=>'TIKET KOLAM ROMBONGAN ANAK : 7.5','TIKET MAINAN : 6'=>'TIKET MAINAN : 6','TIKET MASUK PANGKEP DEWASA :6'=>'TIKET MASUK PANGKEP DEWASA :6','TIKET MASUK PANGKEP DEWASA :7.5'=>'TIKET MASUK PANGKEP DEWASA :7.5','TIKET MASUK PANGKEP ANAK :5'=>'TIKET MASUK PANGKEP ANAK :5','TIKET MASUK PANGKEP ANAK :6'=>'TIKET MASUK PANGKEP ANAK :6','PEMASUKAN DR JOMBANG'=>'PEMASUKAN DR JOMBANG','PENJUALAN LIA/CAFE'=>'PENJUALAN LIA/CAFE','BAN PELAMPUNG'=>'BAN PELAMPUNG','BAJU,CELANA,KAOS'=>'BAJU,CELANA,KAOS','FANTA COCA COLA'=>'FANTA COCA COLA','ICE CREAM'=>'ICE CREAM','SOSRO'=>'SOSRO','HYDRO COCO'=>'HYDRO COCO','TIKET SEPEDA AIR :10'=>'TIKET SEPEDA AIR :10','TIKET PARKIR :2'=>'TIKET PARKIR :2','TIKET PARKIR :5'=>'TIKET PARKIR :5','TIKET PARKIR :6'=>'TIKET PARKIR :6','LAIN2'=>'LAIN2',); ?>
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->dropDownList($model,'description', $descriptionList, array('id'=>'desc')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php $namaList=CHtml::listData(Nama::model()->findAll(array(
				'condition'=>"id IN($nama_ids)",
				'params'=>array())), 'id', 'nama'); ?>
		<?php echo $form->labelEx($model,'nama_id'); ?><?php echo $form->dropDownList($model,'nama_id', $namaList, array(/*'class'=>'input-xlarge'*/)); ?>
		<?php echo $form->error($model,'nama_id'); ?>
	</div>

	<div class="row">
		<label>Jumlah Rp. </label>
		<?php echo $form->textField($model,'num',array('id'=>'num')); ?>
		<?php echo $form->error($model,'num'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	var nowTemp = new Date();
	var todayTemp = new Date();
	var today = new Date(todayTemp.getFullYear(), todayTemp.getMonth(), todayTemp.getDate(), 0, 0, 0, 0);
	nowTemp.setDate(nowTemp.getDate()-1);
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


		dp1.setValue(today);
		dp2.setValue(today);

		$('#dp3').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp3').datepicker('hide');
		});

		/*$("#code").val('503');
		$("#desc").change(function(){
			if($(this).val().indexOf("TIKET MASUK")>=0){
				$("#code").val('503');
			}
			if($(this).val().indexOf("TIKET MAINAN")>=0){
				$("#code").val('501');
			}
			if($(this).val().indexOf("PENJUALAN LIA")>=0){
				$("#code").val('301');
			}
			if($(this).val().indexOf("BAN PELAMPUNG")>=0){
				$("#code").val('303');
			}
		});*/
		$("#num").focusout(function(){
			if($("#desc").val().indexOf(":")>=0){
				var hrg=$("#desc").val().split(":")[1]*1000;
				console.log(hrg);
				console.log($(this).val()%hrg);
				if($(this).val()%hrg!=0){
					alert("Jumlah tidak sesuai dengan harga");
					$("#num").focus();	
				}
			}
		});
	}); 
</script>