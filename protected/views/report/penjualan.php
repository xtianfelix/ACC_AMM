<?php
?>
<br/>
<br/>
<br/>
<div style="overflow:auto;">
	<table class="table table-hover" style="width:1800px;">
		<?php
		$sum=0;
		foreach($rows as $key => $row){
			$sum+=count($row);
		 ?>
		<thead>
			<tr>
				<th colspan='999'><div class='text-left'><?php echo $key ?> - Count: <?php echo count($row) ?></div></th>
			</tr>
			<tr>
				<th>Tanggal</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Merk</th>
				<th>Type</th>
				<th>Tahun</th>
				<th>Warna</th>
				<th>OTR</th>
				<th>Cashback</th>
				<th>TDP</th>
				<th>Leasing</th>
				<th>BR.BK.</th>
				<th>Showroom</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($row as $value){ ?>
			<tr>
				<td><?php echo $value->TANGGAL_TERJUAL; ?></td>
				<td><?php echo $value->customer->name; ?></td>
				<td><?php echo $value->customer->address; ?></td>
				<td><?php echo $value->stock->MERK; ?></td>
				<td><?php echo $value->stock->TYPE; ?></td>
				<td><?php echo $value->stock->TAHUN; ?></td>
				<td><?php echo $value->stock->WARNA; ?></td>
				<td><?php echo $value->HARGA_OTR; ?></td>
				<td><?php echo $value->CASHBACK; ?></td>
				<td><?php echo $value->TOTAL_UANG_MUKA; ?></td>
				<td><?php echo $value->NAMA_LEASING; ?></td>
				<td><?php echo $value->stock->LELANG_BEKAS_BARU==1?"BARU":"BEKAS"; ?></td>
				<td><?php echo $value->location->location; ?></td>
				
			</tr>
			<?php } ?>
		<?php } ?>
		</tbody>
	</table>
</div>
<div>Count Total: <?php echo $sum ?> mobil terjual</div>
<div>Rata-rata: <?php echo round($sum/count($rows),0) ?> mobil terjual/<?php echo $period ?></div>
<style type="text/css">
@media only screen 
and (min-width : 1224px) {
	.container{
		width:85% !important;
	}
}
</style>