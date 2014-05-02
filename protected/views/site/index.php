<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Transaksi terakhir</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1"> <!-- tab pane 1 -->
		<div style="overflow:auto;"> <!-- div overflow -->
			<div id="of_table" style="width:1980px;margin:0px auto;">
				<table class="table table-hover" style="width:auto;">
					<?php
					$sum=0;
					 ?>
					<thead>
						<tr><?php
							foreach ($transactionRows[0]->attributeLabels() as $label) {
								echo "<th>$label</th>";
							} ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($transactionRows as $value){/*
							$date1 = new DateTime($value->TANGGAL_TERJUAL);
							$date2 = new DateTime();
							$interval = $date1->diff($date2);
							$class="";
							if($interval->days>20)
								$class="warning";
							if($interval->days>30)
								$class="error";
	*/
								$this->renderPartial('/transaction/_row', array('data'=>$value));
						 ?>
						
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div><!-- div overflow end -->
    </div><!-- tab pane 1 end -->
  </div>
  <script type="text/javascript">
 	$(document).ready( function() {
  		$('#of_table').css('width',$('#of_table table').css('width'));
 	});
  </script>
</div>

<style type="text/css">
	.table tbody tr.error>td{
		animation:error 1s infinite;
		-webkit-animation:error 1s infinite; /* Safari and Chrome */
	}
	@keyframes error
	{
		0%   {background-color: #f2a0a0}
		90%  {background-color: #f2dede}
		100% {background-color: #f2a0a0}
	}

	@-webkit-keyframes error /* Safari and Chrome */
	{
		0%   {background-color: #f2a0a0}
		90%  {background-color: #f2dede}
		100% {background-color: #f2a0a0}
	}
</style>
<!-- <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p> -->


