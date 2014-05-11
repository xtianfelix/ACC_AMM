<?php
/* @var $this TransactionController */
/* @var $model Transaction */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	'Create',
);

$nama_ids="";
if(Yii::app()->user->data()->username=="lia"){
	$nama_ids="3497";
}elseif(Yii::app()->user->data()->username=="rena"){
	$nama_ids="3491";
}elseif(Yii::app()->user->data()->username=="ferry"){
	$nama_ids="3491,3,896,3492,3493,3494,3495,3496,3497";
}
?>

<h1>Calculator</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transaction-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php $descriptionList=array('TIKET KOLAM DEWASA :20'=>'TIKET KOLAM DEWASA :20','TIKET KOLAM DEWASA :15'=>'TIKET KOLAM DEWASA :15','TIKET KOLAM ANAK :15'=>'TIKET KOLAM ANAK :15','TIKET KOLAM ANAK :10'=>'TIKET KOLAM ANAK :10','TIKET KOLAM ROMBONGAN DEWASA : 18'=>'TIKET KOLAM ROMBONGAN DEWASA : 18','TIKET KOLAM ROMBONGAN DEWASA : 13.5'=>'TIKET KOLAM ROMBONGAN DEWASA : 13.5','TIKET KOLAM ROMBONGAN ANAK : 13.5'=>'TIKET KOLAM ROMBONGAN ANAK : 13.5','TIKET KOLAM ROMBONGAN ANAK : 9'=>'TIKET KOLAM ROMBONGAN ANAK : 9','TIKET KOLAM ROMBONGAN ANAK : 7.5'=>'TIKET KOLAM ROMBONGAN ANAK : 7.5','TIKET MAINAN : 6'=>'TIKET MAINAN : 6','TIKET MASUK PANGKEP DEWASA :6'=>'TIKET MASUK PANGKEP DEWASA :6','TIKET MASUK PANGKEP DEWASA :7.5'=>'TIKET MASUK PANGKEP DEWASA :7.5','TIKET MASUK PANGKEP ANAK :5'=>'TIKET MASUK PANGKEP ANAK :5','TIKET MASUK PANGKEP ANAK :6'=>'TIKET MASUK PANGKEP ANAK :6','TIKET SEPEDA AIR :10'=>'TIKET SEPEDA AIR :10','TIKET PARKIR :2'=>'TIKET PARKIR :2','TIKET PARKIR :5'=>'TIKET PARKIR :5','TIKET PARKIR :6'=>'TIKET PARKIR :6',); ?>
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->dropDownList($model,'description', $descriptionList, array('id'=>'desc')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<label>Jumlah Tiket </label>
		<?php echo $form->textField($model,'num',array('id'=>'num','autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'num'); ?>
	</div>
	<h2>Total: <span id='total'/></h2>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	var nowTemp = new Date();
	var todayTemp = new Date();
	var today = new Date(todayTemp.getFullYear(), todayTemp.getMonth(), todayTemp.getDate(), 0, 0, 0, 0);
	nowTemp.setDate(nowTemp.getDate()-1);
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);


	Number.prototype.formatMoney = function(c, d, t){
	var n = this, 
	    c = isNaN(c = Math.abs(c)) ? 2 : c, 
	    d = d == undefined ? "." : d, 
	    t = t == undefined ? "," : t, 
	    s = n < 0 ? "-" : "", 
	    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
	    j = (j = i.length) > 3 ? j % 3 : 0;
	   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	 };

 	$(document).ready( function() {


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
		$("#num").keyup(function(){
			if($("#desc").val().indexOf(":")>=0){
				var hrg=$("#desc").val().split(":")[1]*1000;
				console.log(hrg);
				console.log($(this).val()*hrg);
				$('#total').html(($(this).val()*hrg).formatMoney(2, '.', ','));
				$("#num").focus();	
			}
		});
		$('#transaction-form').submit(function(){
			$("#num").val("");
			return false;
		});
	}); 
</script>