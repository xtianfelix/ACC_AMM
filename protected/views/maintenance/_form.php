<?php
/* @var $this MaintenanceController */
/* @var $model Maintenance */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maintenance-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
                          'class'=>'form-horizontal',
                        ),
)); ?>
  	<div class="page-header" style="margin-bottom:0px;">
  		<h1>Tambahan <small>Biaya.</small></h1>
	</div>
	<div class = ""><!-- span7 center div -->

    	<fieldset class="fieldset"> <!-- Informasi Kendaraan div -->
	    	<legend style="margin-bottom: 1px;">
	    		<h2 style="text-align:left;">Informasi Kendaraan.</h2>
	    	</legend>
		    <div class="control-group">
			    <?php echo $form->labelEx($mobil,'TYPE',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($mobil,'TYPE',array('size'=>30,'maxlength'=>30,'class'=>'input-xlarge','readonly'=>'true')); ?>
			    </div>
			    <?php echo $form->error($mobil,'TYPE'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($mobil,'MERK',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($mobil,'MERK',array('size'=>30,'maxlength'=>30,'class'=>'input-xlarge','readonly'=>'true')); ?>
			    </div>
			    <?php echo $form->error($mobil,'MERK'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($mobil,'TAHUN',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($mobil,'TAHUN',array('size'=>4,'maxlength'=>4,'class'=>'input-xlarge','readonly'=>'true')); ?>
			    </div>
			    <?php echo $form->error($mobil,'TAHUN'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($mobil,'WARNA',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($mobil,'WARNA',array('size'=>50,'maxlength'=>50,'class'=>'input-xlarge','readonly'=>'true')); ?>
			    </div>
			    <?php echo $form->error($mobil,'WARNA'); ?>
		 	</div>
		 	<div class="control-group">
			    <?php echo $form->labelEx($mobil,'LOCATION',array('class'=>'control-label')); ?>
			    <div class="controls" style="margin-right:0px;">
					<?php echo $form->dropDownList($mobil,'LOCATION',array('Mojokerto'=>'Mojokerto','Hasyim Azhari'=>'Hasyim Azhari','AMM Jombang'=>'AMM Jombang'),array('class'=>'input-xlarge','disabled'=>'true')); ?>
			    </div>
		 	</div>
		 	<hr>
		</fieldset> <!-- Informasi Kendaraan div -->

 		<fieldset class="fieldset"><!-- Informasi Penjualan div -->
 			<legend style="margin-bottom: 1px;">
	    		<h2 style="text-align:left;">Informasi Biaya.</h2>
	    	</legend>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>80,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'name'); ?>
		 	</div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'biaya',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'biaya',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'biaya'); ?>
		    </div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'desc',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textArea($model,'desc',array('rows'=>5,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'desc'); ?>
		 	</div>
		 	<div class="control-group">
			    <?php echo $form->labelEx($model,'TGLTRANSAKSI',array('class'=>'control-label')); ?>
			    <div class="controls">
				    <?php echo $form->textField($model,'TGLTRANSAKSI',array('class'=>'input-xlarge tanggalCairTrans','id'=>'dp2')); ?>
				</div>
			    <?php echo $form->error($model,'TGLTRANSAKSI'); ?>
		 	</div>
		    <hr>
 		</fieldset><!-- Informasi Penjualan div -->
	</div>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
 	$(document).ready( function() {
    	$("#pop").popover();
		$('#dp2').datepicker({
			format: 'yyyy-mm-dd'
		});
	}); </script>