<?php
?>
<div class = "">
	    <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'newTransaction',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'action'=>Yii::app()->createUrl('mutasi/generate'),
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array(
		                          'class'=>'form-horizontal',
		                        ),
		)); ?>
			 <?php echo $form->hiddenField($model,'fromDate',array('id'=>'beginDate')); ?>
			 <?php echo $form->hiddenField($model,'toDate',array('id'=>'endDate')); ?>
	    	<fieldset>
			    <div class="control-group">
				    <?php echo $form->labelEx($model,'jenisLaporan',array('class'=>'control-label')); ?>
				    <div class="controls">
						<?php echo $form->dropDownList($model,'jenisLaporan', array('1'=>'Laporan Transaksi Jual','2'=>'Laporan Transaksi Beli','3'=>'Laporan Summary Penjualan','4'=>'Laporan Stock/Tanggal','5'=>'Laporan Daftar Biaya'), array('empty'=>'Pilih Jenis','class'=>'input-xlarge')); ?>
				    </div><!-- controls -->
				    <?php echo $form->error($model,'jenisLaporan'); ?>
			 	</div><!-- control-group -->
			    <div class="control-group">
				    <?php echo $form->labelEx($model,'periodeLaporan',array('class'=>'control-label')); ?>
				    <div class="controls">
						<?php echo $form->dropDownList($model,'periodeLaporan', array('1'=>'Harian','2'=>'Bulanan','3'=>'Tahunan'), array('class'=>'input-xlarge','id'=>"periodeReport")); ?>
				    </div><!-- controls -->
				    <?php echo $form->error($model,'periodeLaporan'); ?>
			 	</div><!-- control-group -->
			 	<div class="control-group">
				    <label class="control-label">From Date </label>
				    <div class="controls">
						<input class="input-xlarge startRange1 dp1" type="text" style="margin-left:12px;">
						<input class="input-xlarge startRange2 dp2" type="text" style="margin-left:12px;">
						<input class="input-xlarge startRange3 dp3" type="text" style="margin-left:12px;">
				    </div><!-- controls -->
			 	</div><!-- control-group -->
			 	<div class="control-group endDate">
				    <label class="control-label">To Date </label>
				    <div class="controls">
						<input class="input-xlarge endRange1 dp4" id="inputError" type="text" style="margin-left:12px;">
						<span style="margin-left:25px;" class="help-inline endError1">Date awal tidak boleh lebih kecil dari date akhir.</span>
						<input class="input-xlarge endRange2 dp5" id="inputError" type="text" style="margin-left:12px;">
						<span style="margin-left:25px;" class="help-inline endError2">Date awal tidak boleh lebih kecil dari date akhir.</span>
						<input class="input-xlarge endRange3 dp6" id="inputError" type="text" style="margin-left:12px;">
						<span style="margin-left:25px;" class="help-inline endError3">Date awal tidak boleh lebih kecil dari date akhir.</span>
				    </div><!-- controls -->
			 	</div><!-- control-group -->
			    <div class="control-group">
				    <?php echo $form->labelEx($model,'account_id',array('class'=>'control-label'));?>
				    <div class="controls">
				    <?php $accountList=CHtml::listData(Account::model()->findAll(array('order'=>'account ASC')), 'id', 'account'); ?>
						<?php echo $form->dropDownList($model,'account_id', $accountList, array('empty'=>'All','class'=>'input-xlarge')); ?>
				    </div><!-- controls -->
				    <?php echo $form->error($model,'account_id'); ?>
			 	</div><!-- control-group -->
			 	<div class="control-group">
				    <div class="controls" id="alignWrap">
						<a type="submit" id="submitBtn" class="btn">Submit</a>
						<button type="submit" id="clearBtn" class="btn">Clear</button>
				    </div><!-- controls -->
			 	</div><!-- control-group -->
			</fieldset>
		<?php $this->endWidget(); ?><!-- newTransaction -->
</div><!-- row -->
	<script>
		var active = "1";
		var dp1,dp2,dp3,dp4,dp5,dp6;

		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

	 		dp1=$(".dp1").datepicker( {
			    format: "yyyy-mm-dd",
			    viewMode: "days", 
			    minViewMode: "days"
			}).on('changeDate', function(ev){
			    var newDate = new Date(ev.date)
			    newDate.setDate(newDate.getDate());
			    dp4.setValue(newDate);
				$('.dp1').datepicker('hide');
				if($(".startRange1").val() > $(".endRange1").val()){
					$('.endError1').show();
					$('.endDate').addClass('error');
				}
				else{
					$('.endError1').hide();
					$('.endDate').removeClass('error');
				}
			}).data('datepicker');

			dp2=$(".dp2").datepicker( {
			    format: "yyyy-mm-dd",
			    viewMode: "months", 
			    minViewMode: "months"
			}).on('changeDate', function(ev){
			    var newDate = new Date(ev.date)
			    newDate.setDate(newDate.getDate());
			    dp5.setValue(newDate);
				$('.dp2').datepicker('hide');
				if($(".startRange2").val() > $(".endRange2").val()){
					$('.endError2').show();
					$('.endDate').addClass('error');
				}
				else{
					$('.endError2').hide();
					$('.endDate').removeClass('error');
				}
			}).data('datepicker');

			dp3=$(".dp3").datepicker( {
			    format: "yyyy-mm-dd",
			    viewMode: "years", 
			    minViewMode: "years"
			}).on('changeDate', function(ev){
			    var newDate = new Date(ev.date)
			    newDate.setDate(newDate.getDate());
			    dp6.setValue(newDate);
				$('.dp3').datepicker('hide');
				if($(".startRange3").val() > $(".endRange3").val()){
					$('.endError3').show();
					$('.endDate').addClass('error');
				}
				else{
					$('.endError3').hide();
					$('.endDate').removeClass('error');
				}
			}).data('datepicker');

			dp4=$('.dp4').datepicker( {
			    format: "yyyy-mm-dd",
			    viewMode: "days", 
			    minViewMode: "days",
			    onRender: function(date) {
				    return date.valueOf() <= dp1.date? 'disabled' : '';
				}
			}).on('changeDate', function(ev){
				$('.dp4').datepicker('hide');
				if($(".startRange1").val() > $(".endRange1").val()){
					$('.endError1').show();
					$('.endDate').addClass('error');
				}
				else{
					$('.endError1').hide();
					$('.endDate').removeClass('error');
				}
			}).data('datepicker');

			dp5=$(".dp5").datepicker( {
			    format: "yyyy-mm-dd",
			    viewMode: "months", 
			    minViewMode: "months"
			}).on('changeDate', function(ev){
				$('.dp5').datepicker('hide');
				if($(".startRange2").val() > $(".endRange2").val()){
					$('.endError2').show();
					$('.endDate').addClass('error');
				}
				else{
					$('.endError2').hide();
					$('.endDate').removeClass('error');
				}
			}).data('datepicker');

			dp6=$(".dp6").datepicker( {
			    format: "yyyy-mm-dd",
			    viewMode: "years", 
			    minViewMode: "years"
			}).on('changeDate', function(ev){
				$('.dp6').datepicker('hide');
				if($(".startRange3").val() > $(".endRange3").val()){
					$('.endError3').show();
					$('.endDate').addClass('error');
				}
				else{
					$('.endError3').hide();
					$('.endDate').removeClass('error');
				}
			}).data('datepicker');

	 	$(document).ready( function() {

			$(".dp1").show();
			$(".dp2").hide();
			$(".dp3").hide();
			$(".dp4").show();
			$(".dp5").hide();
			$(".dp6").hide();
			$(".endError1").hide();
			$(".endError2").hide();
			$(".endError3").hide();

			function displayCorrectPicker () {
        		$('.endError1').hide();
    			$('.endError2').hide();
    			$('.endError3').hide();
    			$('.endDate').removeClass('error');
				if($('#periodeReport option:selected').val() == "1"){
					$(".dp1").show();
					$(".dp2").hide();
					$(".dp3").hide();
					$(".dp4").show();
					$(".dp5").hide();
					$(".dp6").hide();
					active = "1";
				}
				else if($('#periodeReport option:selected').val() == "2") {
					$(".dp1").hide();
					$(".dp2").show();
					$(".dp3").hide();
					$(".dp4").hide();
					$(".dp5").show();
					$(".dp6").hide();
					active = "2";
				}
				else if($('#periodeReport option:selected').val() == "3") {
					$(".dp1").hide();
					$(".dp2").hide();
					$(".dp3").show();
					$(".dp4").hide();
					$(".dp5").hide();
					$(".dp6").show();
					active = "3";
				}
			}

        	displayCorrectPicker();
        	$('#periodeReport').change(function() {
        		displayCorrectPicker();
		    });

		    $('#submitBtn').click(function() {
		    	var packed = "";
				packed += $('#jenisReport option:selected').html();
				packed += "," + $('#periodeReport option:selected').html();
				packed += "," + $('.startRange' + active).val();
				packed += "," + $('.endRange' + active).val();
				//window.location = "reportViewer.php?" + packed;
				$('#beginDate').val($('.startRange' + active).val());
				$('#endDate').val($('.endRange' + active).val());
				$("#newTransaction").submit();
			});
    	}); 
	</script>