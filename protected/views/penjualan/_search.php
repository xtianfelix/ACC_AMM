<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stock_id'); ?>
		<?php echo $form->textField($model,'stock_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA_LEASING'); ?>
		<?php echo $form->textField($model,'NAMA_LEASING',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'POKOK_HUTANG'); ?>
		<?php echo $form->textField($model,'POKOK_HUTANG',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DP'); ?>
		<?php echo $form->textField($model,'DP',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ASURANSI'); ?>
		<?php echo $form->textField($model,'ASURANSI',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JENIS_ASURANSI'); ?>
		<?php echo $form->textField($model,'JENIS_ASURANSI',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LAMA_ANGSURAN'); ?>
		<?php echo $form->textField($model,'LAMA_ANGSURAN',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LKALI_ANGSURAN'); ?>
		<?php echo $form->textField($model,'LKALI_ANGSURAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ANGSURAN'); ?>
		<?php echo $form->textField($model,'ANGSURAN',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TOTAL_UANG_MUKA'); ?>
		<?php echo $form->textField($model,'TOTAL_UANG_MUKA',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_REFUND'); ?>
		<?php echo $form->textField($model,'TANGGAL_REFUND'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TOTAL_REFUND_ASURANSI'); ?>
		<?php echo $form->textField($model,'TOTAL_REFUND_ASURANSI',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_TERJUAL'); ?>
		<?php echo $form->textField($model,'TANGGAL_TERJUAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA_MAKELAR'); ?>
		<?php echo $form->textField($model,'NAMA_MAKELAR',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HARGA_OTR'); ?>
		<?php echo $form->textField($model,'HARGA_OTR',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CASHBACK'); ?>
		<?php echo $form->textField($model,'CASHBACK',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KETERANGAN_TRANSAKSI'); ?>
		<?php echo $form->textField($model,'KETERANGAN_TRANSAKSI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_CAIR'); ?>
		<?php echo $form->textField($model,'TANGGAL_CAIR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PENCAIRAN'); ?>
		<?php echo $form->textField($model,'PENCAIRAN',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TOTAL_BAYAR'); ?>
		<?php echo $form->textField($model,'TOTAL_BAYAR',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KEKURANGAN'); ?>
		<?php echo $form->textField($model,'KEKURANGAN',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIAYA_MAINTENANCE'); ?>
		<?php echo $form->textField($model,'BIAYA_MAINTENANCE',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_deleted'); ?>
		<?php echo $form->textField($model,'is_deleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'insert_timestamp'); ?>
		<?php echo $form->textField($model,'insert_timestamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_timestamp'); ?>
		<?php echo $form->textField($model,'update_timestamp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->