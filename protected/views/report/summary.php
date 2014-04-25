<?php
?>
<br/>
<br/>
<br/>
<div style="overflow:auto;">
	<table class="table table-hover" style="">
	<!-- 	<thead>
			<tr>
				<th>Tanggal</th>
				<th>Merk</th>
				<th>Type</th>
				<th>Tahun</th>
				<th>Warna</th>
			</tr>
		</thead> -->
		<tbody>
			<?php foreach($rows as $key => $row){ $is_first=TRUE; ?>
				<thead>
					<tr>
						<th colspan='999'><div class='text-left'><?php echo $key ?></div></th>
					</tr>
					<tr><!-- 
						<th>BK/BR</th> -->
						<th>BULAN</th>
						<th>SMP3</th>
						<th>AMM MR</th>
						<th>AMM HA</th>
						<th>AMM BP</th>
						<th>AMM D2</th>
						<th>TOTAL</th>
					</tr>
				</thead>
				<?php foreach($row as $value){ ?>
				<tr><!-- 
					<?php if($is_first){ ?><td rowspan="<?php echo $row->count() ?>" style="vertical-align:middle;"><?php echo $value['LELANG_BEKAS_BARU']; ?></td><?php $is_first=FALSE; } ?> -->
					<td><?php echo date("F", mktime(0, 0, 0, $value['MONTH'], 10)); ?></td>
					<td><?php echo $value['SMP3']; ?></td>
					<td><?php echo $value['AMM MR']; ?></td>
					<td><?php echo $value['AMM HA']; ?></td>
					<td><?php echo $value['AMM BP']; ?></td>
					<td><?php echo $value['AMM D2']; ?></td>
					<td><?php echo $value['TOTAL']; ?></td>
					
				</tr>
				<?php } ?>
			<?php } ?>
		</tbody>
	</table>
</div>
<style type="text/css">
@media only screen 
and (min-width : 1224px) {
	.container{
		width:85% !important;
	}
}
</style>