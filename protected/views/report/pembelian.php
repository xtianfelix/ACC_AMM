<?php
?>
<br/>
<br/>
<br/>
<div style="overflow:auto;">
	<table class="table table-hover" style="width:1500px;">
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
			<?php foreach($rows as $key => $row){ ?>
				<thead>
					<tr>
						<th colspan='999'><div class='text-left'><?php echo $key ?></div></th>
					</tr>
					<tr>
						<th>Tanggal</th>
						<th>Kategori</th>
						<th>Nopol</th>
						<th>Merk</th>
						<th>Type</th>
						<th>Tahun</th>
						<th>Warna</th>
						<th>STNK</th>
						<th>BPKB</th>
						<th>FAKTUR</th>
						<th>Tgl Pajak</th>
						<th>Tgl Kirim</th>
						<th>PIC</th>
						<th>Harga Beli</th>
						<th>BR/BKS</th>
						<th>BIAYA</th>
					</tr>
				</thead>
				<?php foreach($row as $value){ ?>
				<tr>
					<td><?php echo $value->TGLBELI; ?></td>
					<td><?php echo $value->sUPPLIER->company; ?></td>
					<td><?php echo $value->NOPOL; ?></td>
					<td><?php echo $value->MERK; ?></td>
					<td><?php echo $value->TYPE; ?></td>
					<td><?php echo $value->TAHUN; ?></td>
					<td><?php echo $value->WARNA; ?></td>
					<td><?php echo $value->NAMASTNK; ?></td>
					<td><?php echo $value->BPKB; ?></td>
					<td><?php echo $value->FAKTUR; ?></td>
					<td><?php echo $value->TGLPAJAK; ?></td>
					<td><?php echo $value->TGLKIRIM; ?></td>
					<td><?php echo $value->PIC; ?></td>
					<td><div class="text-right"><?php echo $value->HARGAPOKOK; ?></div></td>
					<td><?php echo $value->LELANG_BEKAS_BARU==1?"BEKAS":"BARU"; ?></td>
					<td><?php echo $value->totalBiaya(); ?></td>
					
				</tr>
				<?php } ?>
			<?php } ?>
		</tbody>
	</table>
</div>
<style type="text/css">
</style>