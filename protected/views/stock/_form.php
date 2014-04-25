<?php
/* @var $this StockController */
/* @var $model Stock */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
                          'class'=>'form-horizontal',
                        ),
)); 
?>
  	<div class="page-header" style="margin-bottom:0px;">
  		<h1>Transaksi <small>Pembelian.</small></h1>
	</div>
	<div class = ""><!-- span7 center div -->

    	<fieldset style="width:100%;text-align:center;"> 
	    	<div id="LELANG_BEKAS_BARU_DIV" class="btn-group" data-toggle="buttons-radio" style="margin-bottom:20px; margin-top:20px;">
				<?php echo $form->hiddenField($model,'LELANG_BEKAS_BARU',array('id'=>'lelangbekasbaru')); ?>
				<button value="-1" type="button" id="btnBekasLelang" class="btn active">Mobil Bekas - Lelang</button>
				<button value="0" type="button" id="btnBekasUmum" class="btn">Mobil Bekas - Umum</button>
				<button value="1" type="button" id="btnBaru" class="btn">Mobil Baru</button>
			</div>
		</fieldset>

    	<fieldset class="fieldset"> <!-- Informasi Kendaraan div -->
	    	<legend style="margin-bottom: 1px;">
	    		<h2 style="text-align:left;">Informasi Kendaraan.</h2>
	    	</legend>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'NOGOLONGANKENDARAAN',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->dropDownList($model,'NOGOLONGANKENDARAAN', CHtml::listData(Golongankendaraan::model()->findAll(), 'NOGOLONGANKENDARAAN', 'GOLONGANKENDARAAN'), array('empty'=>'Pilih Golongan','class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'NOGOLONGANKENDARAAN'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'TYPE',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'TYPE',array('size'=>30,'maxlength'=>30,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'TYPE'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'MERK',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'MERK',array('size'=>30,'maxlength'=>30,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'MERK'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'TAHUN',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'TAHUN',array('size'=>4,'maxlength'=>4,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'TAHUN'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'WARNA',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'WARNA',array('size'=>50,'maxlength'=>50,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'WARNA'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'NAMASTNK',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'NAMASTNK',array('size'=>60,'maxlength'=>255,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'NAMASTNK'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'BPKB',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'BPKB',array('size'=>60,'maxlength'=>255,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'BPKB'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'FAKTUR',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'FAKTUR',array('size'=>60,'maxlength'=>255,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'FAKTUR'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'NOPOL',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'NOPOL',array('size'=>20,'maxlength'=>20,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'NOPOL'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'NORANGKA',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'NORANGKA',array('size'=>50,'maxlength'=>50,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'NORANGKA'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'NOMESIN',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'NOMESIN',array('size'=>50,'maxlength'=>50,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'NOMESIN'); ?>
		 	</div>
		 	<hr>
		</fieldset> <!-- Informasi Kendaraan div -->
		<fieldset class="fieldset"> <!-- Informasi Pembelian div -->
			<legend>
	    		<h2 style="text-align:left;">Informasi Pembelian.</h2>
	    	</legend>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'PIC',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textField($model,'PIC',array('size'=>50,'maxlength'=>50,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'PIC'); ?>
		 	</div>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'SUPPLIER_ID',array('class'=>'control-label'));?>
			    <div class="controls">
			    <?php $supplierList=CHtml::listData(Supplier::model()->findAll(), 'id', 'company'); ?>
					<?php echo $form->dropDownList($model,'SUPPLIER_ID', $supplierList, array('class'=>'input-xlarge')); ?>
			    </div><!-- controls -->
			    <?php echo $form->error($model,'SUPPLIER_ID'); ?>
		 	</div><!-- control-group -->
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'LOCATION',array('class'=>'control-label'));?>
			    <div class="controls">
			    <?php $locationList=CHtml::listData(Location::model()->findAll(), 'location', 'location'); $locationList['Lainnya']='Lainnya'; ?>
					<?php //echo $form->dropDownList($model,'LOCATION', $locationList, array('class'=>'input-xlarge')); ?>
					<?php echo $form->textField($model,'LOCATION',array('size'=>50,'maxlength'=>50,'class'=>'input-xlarge')); ?>
			    </div><!-- controls -->
			    <?php echo $form->error($model,'LOCATION'); ?>
		 	</div><!-- control-group -->
		 	<div class="control-group">
			    <?php echo $form->labelEx($model,'TGLBELI',array('class'=>'control-label')); ?>
			    <div class="controls">
			    	<?php echo $form->textField($model,'TGLBELI',array('class'=>'input-xlarge tanggalKirim','id'=>'dp1')); ?>
				</div>
			    <?php echo $form->error($model,'TGLBELI'); ?>
		 	</div>
		 	<div class="control-group">
			    <?php echo $form->labelEx($model,'TGLPAJAK',array('class'=>'control-label')); ?>
			    <div class="controls">
				    <?php echo $form->textField($model,'TGLPAJAK',array('class'=>'input-xlarge tanggalPajak','id'=>'dp2')); ?>
				</div>
			    <?php echo $form->error($model,'TGLPAJAK'); ?>
		 	</div>
		 	<div class="control-group">
			    <?php echo $form->labelEx($model,'TGLKIRIM',array('class'=>'control-label')); ?>
			    <div class="controls">
			    	<?php echo $form->textField($model,'TGLKIRIM',array('class'=>'input-xlarge tanggalKirim','id'=>'dp3')); ?>
				</div>
			    <?php echo $form->error($model,'TGLKIRIM'); ?>
		 	</div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'BUDGETSALES',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'BUDGETSALES',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'BUDGETSALES'); ?>
		    </div>
		    <?php if($this->isAdmin()){ ?>
			 	<div class="control-group">
		    		<?php echo $form->labelEx($model,'HARGAPOKOK',array('class'=>'control-label','id'=>'hargaBeli')); ?>
				    <div class="input-prepend input-append controls" style="margin-left:-120px;">
					  <span class="add-on">Rp.</span>
					  <?php echo $form->textField($model,'HARGAPOKOK',array('class'=>'span2')); ?>
					  <span class="add-on">,-</span>
					</div>
				    <?php echo $form->error($model,'HARGAPOKOK'); ?>
			    </div>
		    <?php } ?>
		    <div class="control-group">
			    <?php echo $form->labelEx($model,'DESC',array('class'=>'control-label')); ?>
			    <div class="controls">
					<?php echo $form->textArea($model,'DESC',array('rows'=>5,'class'=>'input-xlarge')); ?>
			    </div>
			    <?php echo $form->error($model,'DESC'); ?>
		 	</div>
		 	<hr/>
		</fieldset><!-- Informasi Pembelian div -->
		<fieldset class="fieldset lelang"><!-- Informasi Lelang div -->
 			<legend>
	    		<h2 style="text-align:left;">Informasi Lelang.</h2>
	    	</legend>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'HARGADASARLELANG',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'HARGADASARLELANG',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'HARGADASARLELANG'); ?>
		    </div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'FEELELANG',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'FEELELANG',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'FEELELANG'); ?>
		    </div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'BIAYAADMINLELANG',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'BIAYAADMINLELANG',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'BIAYAADMINLELANG'); ?>
		    </div>
		 	<div class="control-group">
	    		<?php echo $form->labelEx($model,'OTRLELANG',array('class'=>'control-label')); ?>
			    <div class="input-prepend input-append controls" style="margin-left:-120px;">
				  <span class="add-on">Rp.</span>
				  <?php echo $form->textField($model,'OTRLELANG',array('class'=>'span2')); ?>
				  <span class="add-on">,-</span>
				</div>
			    <?php echo $form->error($model,'OTRLELANG'); ?>
		    </div>
		 	<hr/>
		</fieldset><!-- Informasi Lelang div -->
	</div><!-- span7 center div -->
	<div class="row">
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
    	$('#dp1').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp1').datepicker('hide');
		});
		var dp2=$('#dp2').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp2').datepicker('hide');
		});
		$('#dp3').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp3').datepicker('hide');
		});
		$('.buttonCariSupplier').click(function() {
			$("#modalCariSupplier").modal("hide");
			$('#namaSupplier').val($(this).closest('tr').find('#nama').html());
			$('#alamatSupplier').val($(this).closest('tr').find('#alamat').html());
			$('#kotaSupplier').val($(this).closest('tr').find('#kota').html());
		});

		$('#btnBekasLelang').click(function() {
			$('.lelang').css('display','block');
			$('#hargaBeli').html("Harga Pokok");
		});

		$('#btnBekasUmum').click(function() {
			$('.lelang').css('display','none');
			$('#hargaBeli').html("Harga Beli");
		});

		$('#btnBaru').click(function() {
			$('.lelang').css('display','none');
			$('#hargaBeli').html("Harga Beli");
		});
		$('.btn').click(function() {
		    var parent = '#' + $(this).parent().attr('id');
		    $(parent).find('input').val($(this).val());
		});
		$(lelangbekasbaru).val('0');
		if($(lelangbekasbaru).val()==""){
			$("#btnBekasLelang").trigger('click');
		}
		else{
			switch($(lelangbekasbaru).val()*1){
				case -1:$("#btnBekasLelang").trigger('click');break;
				case 0:$("#btnBekasUmum").trigger('click');break;
				case 1:$("#btnBaru").trigger('click');break;
			}
		}
		$('input').focusin(function(){
   			$('#dp1').datepicker('hide');
   			$('#dp2').datepicker('hide');
   			$('#dp3').datepicker('hide');
		});
	}); 
</script>