<?php
/* @var $this StockController */
/* @var $model Stock */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<!-- 	<div class="row">
		<?php echo $form->label($model,'NOMOBIL'); ?>
		<?php echo $form->textField($model,'NOMOBIL',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOGOLONGANKENDARAAN'); ?>
		<?php echo $form->textField($model,'NOGOLONGANKENDARAAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LELANG_BEKAS_BARU'); ?>
		<?php echo $form->textField($model,'LELANG_BEKAS_BARU'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MERK'); ?>
		<?php echo $form->textField($model,'MERK',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TYPE'); ?>
		<?php echo $form->textField($model,'TYPE',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TAHUN'); ?>
		<?php echo $form->textField($model,'TAHUN',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WARNA'); ?>
		<?php echo $form->textField($model,'WARNA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMASTNK'); ?>
		<?php echo $form->textField($model,'NAMASTNK',array('size'=>60,'maxlength'=>255)); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'BPKB'); ?>
		<?php echo $form->textField($model,'BPKB',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FAKTUR'); ?>
		<?php echo $form->textField($model,'FAKTUR',array('size'=>60,'maxlength'=>255)); ?>
	</div>
<!-- 

	<div class="row">
		<?php echo $form->label($model,'BUDGETSALES'); ?>
		<?php echo $form->textField($model,'BUDGETSALES',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HARGAPOKOK'); ?>
		<?php echo $form->textField($model,'HARGAPOKOK',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HARGADASARLELANG'); ?>
		<?php echo $form->textField($model,'HARGADASARLELANG',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FEELELANG'); ?>
		<?php echo $form->textField($model,'FEELELANG',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIAYAADMINLELANG'); ?>
		<?php echo $form->textField($model,'BIAYAADMINLELANG',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OTRLELANG'); ?>
		<?php echo $form->textField($model,'OTRLELANG',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FILENAME'); ?>
		<?php echo $form->textField($model,'FILENAME',array('size'=>50,'maxlength'=>50)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'NOPOL'); ?>
		<?php echo $form->textField($model,'NOPOL',array('size'=>20,'maxlength'=>20)); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'NORANGKA'); ?>
		<?php echo $form->textField($model,'NORANGKA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMESIN'); ?>
		<?php echo $form->textField($model,'NOMESIN',array('size'=>50,'maxlength'=>50)); ?>
	</div>

<!-- 	<div class="row">
		<?php echo $form->label($model,'TGLBELI'); ?>
		<?php echo $form->textField($model,'TGLBELI'); ?>
	</div> -->
<!-- 
	<div class="row">
		<?php echo $form->label($model,'TGLKIRIM'); ?>
		<?php echo $form->textField($model,'TGLKIRIM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TGLPAJAK'); ?>
		<?php echo $form->textField($model,'TGLPAJAK'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SUPPLIER_ID'); ?>
		<?php echo $form->textField($model,'SUPPLIER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESC'); ?>
		<?php echo $form->textField($model,'DESC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS',array('size'=>20,'maxlength'=>20)); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'LOCATION'); ?>
		<?php echo $form->textField($model,'LOCATION',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PIC'); ?>
		<?php echo $form->textField($model,'PIC',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<!-- <div class="row">
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
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->