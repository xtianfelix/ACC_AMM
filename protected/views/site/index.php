<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Belum Cair</a></li>
    <li><a href="#tab2" data-toggle="tab">Stock</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1"> <!-- tab pane 1 -->
		<div style="overflow:auto;"> <!-- div overflow -->
			<table class="table table-hover" style="width:1800px;">
				<?php
				$sum=0;
				 ?>
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Interval</th>
						<th>Leasing</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Merk</th>
						<th>Type</th>
						<th>Tahun</th>
						<th>Warna</th>
						<th>OTR</th>
						<th>Cashback</th>
						<th>TDP</th>
						<th>BR.BK.</th>
						<th>Showroom</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($blmCairRows as $value){
						$date1 = new DateTime($value->TANGGAL_TERJUAL);
						$date2 = new DateTime();
						$interval = $date1->diff($date2);
						$class="";
						if($interval->days>20)
							$class="warning";
						if($interval->days>30)
							$class="error";

					 ?>
					<tr class="<?php echo $class; ?>">
						<td><?php echo $value->TANGGAL_TERJUAL; ?></td>
						<td><?php echo $interval->days; ?></td>
						<td><?php echo $value->NAMA_LEASING; ?></td>
						<td><?php echo $value->customer->name; ?></td>
						<td><?php echo $value->customer->address; ?></td>
						<td><?php echo $value->stock->MERK; ?></td>
						<td><?php echo $value->stock->TYPE; ?></td>
						<td><?php echo $value->stock->TAHUN; ?></td>
						<td><?php echo $value->stock->WARNA; ?></td>
						<td class="text-right"><?php echo number_format($value->HARGA_OTR, 2, '.', ','); ?></td>
						<td class="text-right"><?php echo number_format($value->CASHBACK, 2, '.', ','); ?></td>
						<td class="text-right"><?php echo number_format($value->TOTAL_UANG_MUKA, 2, '.', ','); ?></td>
						<td><?php echo $value->stock->LELANG_BEKAS_BARU==1?"BARU":"BEKAS"; ?></td>
						<td><?php echo $value->location->location; ?></td>
						
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div><!-- div overflow end -->
    </div><!-- tab pane 1 end -->
  </div>
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


