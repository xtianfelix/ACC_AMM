<?php
/* @var $this PenjualanController */
/* @var $model Penjualan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'penjualan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
                          'class'=>'form-horizontal',
                        ),
)); 
echo $form->hiddenField($model,'stock_id',array());
echo $form->hiddenField($model,'customer_id',array());
?>
	<div class = ""><!-- span7 center div -->

	 	<fieldset class="fieldset"> <!-- Rincian Kredit div -->
	 		<legend style="margin-bottom: 1px;">
	    		<h2 style="text-align:left;">Rincian Kredit.</h2>
	    	</legend>
	    	<div class="control-group">
			    <div class="controls" style="margin-right:105px;">
					<button class="btn btn-primary" data-toggle="modal" href="#modalHitungCredit">
						<i class="icon-pencil icon-white"></i>  Hitung Rincian Kredit
					</button>
			    </div>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'NAMA_LEASING',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'NAMA_LEASING',array('size'=>60,'maxlength'=>80,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'NAMA_LEASING'); ?>
		 	</div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'POKOK_HUTANG',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'POKOK_HUTANG',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'POKOK_HUTANG'); ?>
		    </div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'DP',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'DP',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'DP'); ?>
		    </div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'ASURANSI',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'ASURANSI',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'ASURANSI'); ?>
		    </div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'JENIS_ASURANSI',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->dropDownList($model,'JENIS_ASURANSI', array('TLO'=>'TLO','Combination'=>'Combination','All Risk'=>'All Risk'), array('empty'=>'Pilih Jenis','class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'JENIS_ASURANSI'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'LAMA_ANGSURAN',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'LAMA_ANGSURAN',array('size'=>20,'maxlength'=>20,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'LAMA_ANGSURAN'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'LKALI_ANGSURAN',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'LKALI_ANGSURAN',array('size'=>20,'maxlength'=>20,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'LKALI_ANGSURAN'); ?>
		 	</div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'ANGSURAN',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'ANGSURAN',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'ANGSURAN'); ?>
		    </div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'TOTAL_UANG_MUKA',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'TOTAL_UANG_MUKA',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'TOTAL_UANG_MUKA'); ?>
		    </div>
		 	<div class="control-group">
			    <?php echo $form->labelEx($model,'TANGGAL_REFUND',array('class'=>'control-label')); ?>
			    <div class="controls">
				    <?php echo $form->textField($model,'TANGGAL_REFUND',array('class'=>'input-xlarge tanggalRefundTrans','id'=>'dp3')); ?>
				</div>
			    <?php echo $form->error($model,'TANGGAL_REFUND'); ?>
		 	</div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'TOTAL_REFUND_ASURANSI',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'TOTAL_REFUND_ASURANSI',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'TOTAL_REFUND_ASURANSI'); ?>
		    </div>
	    	<hr>
 		</fieldset><!-- Rincian Kredit div -->

 		<fieldset class="fieldset" style="min-height:550px;"><!-- Informasi Penjualan div -->
 			<legend style="margin-bottom: 1px;">
	    		<h2 style="text-align:left;">Informasi Penjualan.</h2>
	    	</legend>
		 	<div class="control-group">
			    <?php echo $form->labelEx($model,'TANGGAL_TERJUAL',array('class'=>'control-label')); ?>
			    <div class="controls">
				    <?php echo $form->textField($model,'TANGGAL_TERJUAL',array('class'=>'input-xlarge tanggalJualTrans','id'=>'dp1')); ?>
				</div>
			    <?php echo $form->error($model,'TANGGAL_TERJUAL'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'NAMA_MAKELAR',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'NAMA_MAKELAR',array('size'=>60,'maxlength'=>80,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'NAMA_MAKELAR'); ?>
		 	</div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'HARGA_OTR',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'HARGA_OTR',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'HARGA_OTR'); ?>
		    </div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'CASHBACK',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'CASHBACK',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'CASHBACK'); ?>
		    </div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'KETERANGAN_TRANSAKSI',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textArea($model,'KETERANGAN_TRANSAKSI',array('rows'=>5,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'KETERANGAN_TRANSAKSI'); ?>
		 	</div>
		 	<div class="control-group">
			    <?php echo $form->labelEx($model,'TANGGAL_CAIR',array('class'=>'control-label')); ?>
			    <div class="controls">
				    <?php echo $form->textField($model,'TANGGAL_CAIR',array('class'=>'input-xlarge tanggalCairTrans','id'=>'dp2')); ?>
				</div>
			    <?php echo $form->error($model,'TANGGAL_CAIR'); ?>
		 	</div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'PENCAIRAN',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'PENCAIRAN',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'PENCAIRAN'); ?>
		    </div>
		    <!-- pencairan kredit=otr-tdp -->
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'TOTAL_BAYAR',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'TOTAL_BAYAR',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'TOTAL_BAYAR'); ?>
		    </div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'KEKURANGAN',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'KEKURANGAN',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'KEKURANGAN'); ?>
		    </div>
		    <!-- kekurangan = otr-cashback-pencairan kredit-total bayar -->
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'location_id',array('class'=>'control-label'));?>
			    <div class="controls">
			    <?php $locationList=CHtml::listData(Location::model()->findAll(), 'id', 'location'); ?>
					<?php echo $form->dropDownList($model,'location_id', $locationList, array('class'=>'input-xlarge')); ?>
			    </div><!-- controls -->
			    <?php echo $form->error($model,'location_id'); ?>
		 	</div><!-- control-group -->
		    <hr>
 		</fieldset><!-- Informasi Penjualan div -->

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
					<?php echo $form->textField($mobil,'LOCATION',array('size'=>50,'maxlength'=>50,'class'=>'input-xlarge','readonly'=>'true')); ?>
				</div>
		 	</div>
		 	<hr>
		</fieldset> <!-- Informasi Kendaraan div -->

    	<fieldset class="fieldset" id="infoCustomer"> <!-- Informasi Customer div -->
	    	<legend style="margin-bottom: 1px;">
	    		<h2 style="text-align:left;">Informasi Customer.</h2>
	    	</legend>
		    <div class="control-group">
			    <?php echo $form->labelEx($customer,'name',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($customer,'name',array('size'=>30,'maxlength'=>30,'class'=>'input-xlarge','readonly'=>'true')); ?>
			    </div>
			    <?php echo $form->error($customer,'name'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($customer,'address',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($customer,'address',array('size'=>30,'maxlength'=>30,'class'=>'input-xlarge','readonly'=>'true')); ?>
			    </div>
			    <?php echo $form->error($customer,'address'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($customer,'phone',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($customer,'phone',array('size'=>30,'maxlength'=>30,'class'=>'input-xlarge','readonly'=>'true')); ?>
			    </div>
			    <?php echo $form->error($customer,'phone'); ?>
		 	</div>
		 	
			<p class="note">Fields with <span class="required">*</span> are required.</p>

			<?php echo $form->errorSummary($model); ?>

			

			<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
			</div>
		 	<hr>
		</fieldset> <!-- Informasi Customer div -->
	</div><!-- span7 center div -->

<?php $this->endWidget(); ?>
</div><!-- form -->

<style type="text/css">
#infoCustomer{
	/*min-height: 287px;*/
}
</style>
<script type="text/javascript">
 	$(document).ready( function() {
    	$("#pop").popover();
    	$('#dp1').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp1').datepicker('hide');
		});
		$('#dp2').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp2').datepicker('hide');
		});
		$('#dp3').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp3').datepicker('hide');
		});
		$('input').focusin(function(){
   			$('#dp1').datepicker('hide');
   			$('#dp2').datepicker('hide');
   			$('#dp3').datepicker('hide');
		});
	});
</script>