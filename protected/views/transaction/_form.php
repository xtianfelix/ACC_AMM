<?php
/* @var $this TransactionController */
/* @var $model Transaction */
/* @var $form CActiveForm */
?>

<div class="form">


<?php 

echo CHtml::ajaxLink(
	'Test request',          // the link body (it will NOT be HTML-encoded.)
	array('nama/check'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
	array(
		'type' =>'POST',
		'data' =>array( 
			'main_c_token' => Yii::app()->request->csrfToken,
			'nama' => 'js:$("#nama").val()',
			'ajax' => 'true',
		),
		'success'=>'js:function(data){
			if(data!="[]"){
				data=$.parseJSON(data);
				$("#req_res").html("");
				for(var key in data) 
	       			$("#req_res").append("<a href=\"#\" onclick=\"$(\\\'#Transaction_nama_id\\\').val(\\\'"+key+"\\\');$(\\\'#nama\\\').val(\\\'"+data[key]+"\\\');$(\\\'#req_res\\\').css(\\\'display\\\',\\\'none\\\');return false;\">"+data[key]+"</a><br/>");
			}else{
				$("#req_res").html("Nama tidak ditemukan, buat baru? <input type=\"button\" value=\"Ya\" onclick=\"createNama();\"/>");
			}
		}',
	),
	array(
		'id'=>'ajaxLink',
		'style'=>'display:none;',
	)
);

$form=$this->beginWidget('CActiveForm', array(
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
		<?php 
		$accountList=CHtml::listData(Account::model()->findAll(array('order'=>'account ASC')), 'id', 'account');
    	if(!$this->isAdmin()){
    		$accountList=CHtml::listData(Yii::app()->user->data()->userAccounts, 'account_id', 'account.account');
    	} ?>
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
		<?php echo $form->labelEx($model,'kwt'); ?>
		<?php echo $form->textField($model,'kwt',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kwt'); ?>
	</div>

	<div class="row">
		<?php $kasList=CHtml::listData(Kas::model()->findAll(), 'id', 'kas'); ?>
		<?php echo $form->labelEx($model,'kas_id'); ?>
		<?php echo $form->dropDownList($model,'kas_id', $kasList, array(/*'class'=>'input-xlarge'*/)); ?>
		<?php echo $form->error($model,'kas_id'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php $namaList=CHtml::listData(Nama::model()->findAll(), 'id', 'nama'); ?>
		<?php echo $form->textField($model,'nama_id'); ?>
		<?php echo $form->error($model,'nama_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_id'); ?>
		<input type="text" id="nama" value="<?php echo $model->nama_id==""?"":$model->nama->nama; ?>"/>
		<?php echo $form->error($model,'nama_id'); ?>
		<div id="req_res">...</div>
	</div>

	<!--div class="row">
		<?php echo $form->labelEx($model,'bln_jl'); ?>
		<?php echo $form->textField($model,'bln_jl'); ?>
		<?php echo $form->error($model,'bln_jl'); ?>
	</div-->
<!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'unit'); ?>
		<?php echo $form->textField($model,'unit'); ?>
		<?php echo $form->error($model,'unit'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'lunas_id'); ?>
		<?php $lunasList=CHtml::listData(Lunas::model()->findAll(), 'id', 'lunas'); ?>
		<?php echo $form->dropDownList($model,'lunas_id', $lunasList, array('options' => array('2'=>array('selected'=>true))/*'class'=>'input-xlarge'*/)); ?>
		<?php echo $form->error($model,'lunas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code_id'); ?>
		<?php 
		$codeArray = Yii::app()->db->createCommand()
		    ->select('id, concat(id," - ",ifnull(keterangan,"")) as ket')
		    ->from('code')
		    ->where('id not in ("100","101","102","103","104","106","107","108","109","112","113","215","216","300","311","415","600","601","604","715","800","801","803","915")')
		    ->query();
		$codeList=CHtml::listData($codeArray, 'id', 'ket'); ?>
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
<br/>
<?php if($model->id!="") echo CHtml::button('DELETE', array(
		'submit' => array('transaction/delete', 'id' => $model->id),
        'confirm' => 'Apakah anda yakin untuk delete transaksi bernomor ' . $model->id . '?',
		'csrf' => true
	)); ?>
</div><!-- form -->
<?php echo $model->is_deleted==1?"-----------DELETED-----------":""; ?>

<script type="text/javascript">
	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	function createNama(){
		console.log("create nama");
		$.ajax({
			type: "POST",
			url: "../nama/create",
			data: { 
				'Nama[nama]': $("#nama").val(), 
				'main_c_token': "<?php echo Yii::app()->request->csrfToken; ?>",
				'ajax': 'true'
			}
		})
		.done(function( msg ) {
			$('#Transaction_nama_id').val(msg);
			$('#req_res').css('display','none');
			alert('Nama telah dibuat denga nomor '+msg);
		});
	}

 	$(document).ready( function() {

 		$('#nama').keyup(function(){
 			if($(this).val().length>2){
 				$("#req_res").css('display','block');
 				$("#ajaxLink").trigger('click');
 				console.log($(this).val().length);	
 			}
 		});

    	$("#pop").popover();
    	var dp1=$('#dp1').datepicker({
			format: 'yyyy-mm-dd',
			/*onRender: function(date) {
			  return date.valueOf() < now.valueOf() ? 'disabled' : '';
			}*/
		}).on('changeDate', function(ev){
			$('#dp1').datepicker('hide');
			dp2.setValue(ev.date);
		}).data('datepicker');
		var dp2=$('#dp2').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp2').datepicker('hide');
		}).data('datepicker');


		if($('#dp1').val()=="")
			dp1.setValue(nowTemp);
		if($('#dp2').val()=="")
			dp2.setValue(nowTemp);

		$('#dp3').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp3').datepicker('hide');
		});
	}); 
</script>