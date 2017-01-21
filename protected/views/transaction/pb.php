<?php
/* @var $this TransactionController */
/* @var $model FormModelPb */

?>


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
	'id'=>'newPb',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
                          //'class'=>'form-horizontal',
                        ),
)); ?>
	<?php $fromAccountList=CHtml::listData(Yii::app()->user->data()->userAccounts, 'account_id', 'account.account'); ?>
	<?php $accountList=CHtml::listData(Account::model()->findAll(array('order'=>'account ASC')), 'id', 'account'); ?>
	From Account: <?php echo $form->dropDownList($model,'from_account_id', $accountList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	To Account: <?php echo $form->dropDownList($model,'to_account_id', $accountList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	<?php $kasList=CHtml::listData(Kas::model()->findAll(array('order'=>'kas ASC')), 'id', 'kas'); ?>
	From Kas: <?php echo $form->dropDownList($model,'from_kas_id', $kasList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	To Kas: <?php echo $form->dropDownList($model,'to_kas_id', $kasList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>
	<?php 

		$codeArray = Yii::app()->db->createCommand()
		    ->select('id, concat(id," - ",ifnull(keterangan,"")) as ket')
		    ->from('code')
		    ->where('id in ("100","101","102","103","104","106","107","108","109","112","113","215","216","300","311","415","600","601","604","715","800","801","803","915")')
		    ->query();
		$codeList=CHtml::listData($codeArray, 'id', 'ket'); ?>
	Kode: <?php echo $form->dropDownList($model,'code_id', $codeList, array(/*'class'=>'input-xlarge'*/)); ?>
	<br/>

	<div class="row" style="display:none;">
		<?php $namaList=CHtml::listData(Nama::model()->findAll(), 'id', 'nama'); ?>
		<?php echo $form->textField($model,'nama_id', array('autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'nama_id'); ?>
	</div>

	<?php echo $form->labelEx($model,'nama_id'); ?>:
	<input type="text" id="nama" value="<?php echo $model->nama_id==""?"":$model->nama->nama; ?>"/>
	<?php echo $form->error($model,'nama_id'); ?>
	<div id="req_res">...</div>

	<br/>
	Num: 
	<div class="input-number">
		<?php echo $form->textField($model,'num'); ?>
	</div>
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


		dp1.setValue(nowTemp);
		dp2.setValue(nowTemp);

		$('#dp3').datepicker({
			format: 'yyyy-mm-dd'
		}).on('changeDate', function(ev){
				$('#dp3').datepicker('hide');
		});

		if(!!defaultValues.kas){
			$('#FormModelPb_from_kas_id').val(defaultValues.kas.toString());
			$('#FormModelPb_to_kas_id').val(defaultValues.kas.toString());
		}
	}); 
</script>
