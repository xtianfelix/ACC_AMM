<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
if(count($transactionRows)>0){
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
					<thead>
						<tr><?php
							foreach (Transaction::model()->attributeLabels() as $label) {
								echo "<th>$label</th>";
							} ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($transactionRows as $key => $subRows){
							$sum=0;
							if(count($subRows)!=0){
								echo "<tr><th colspan='99'>$key</th></tr>";
								foreach($subRows as $value){
									$this->renderPartial('/transaction/_rowWisata', array('data'=>$value));
									$sum+=$value->num;
								}?>
								<tr>
									<td colspan='999' align='center'><b>TOTAL: <?php echo number_format($sum,2,".",","); ?></b></td>
								</tr>
							<?php
							}
						} ?>
					</tbody>
				</table>
			</div>
		</div><!-- div overflow end -->
    </div><!-- tab pane 1 end -->
  </div>
<?php
}else{
	echo "<h1 class='text-center'>Belum Ada Transaksi</h1>";
}
?>
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
	tbody tr td:nth-child(4),tbody tr td:nth-child(4){
		display: none;
	}
	thead tr th:nth-child(4),thead tr th:nth-child(4){
		display: none;
	}
	tbody tr td:nth-child(8),tbody tr td:nth-child(8){
		display: none;
	}
	thead tr th:nth-child(8),thead tr th:nth-child(8){
		display: none;
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


