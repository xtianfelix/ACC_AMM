<?php
?>
<div style="overflow:auto;">
	<table class="table table-hover" style="<!-- width:1800px; -->">
		<?php
		$count=0;
			$totalDebet=0;
			$totalKredit=0;
			$sum=array();
		$location="";
		foreach($rows as $key => $row){
			$count+=count($row);
			$balance=0;
			if(count($row)>0){
				$first=reset($row);
				$acc=Account::model()->findByPk($first->account_id);
				$balance=$acc->balance($first->tgl);
			}
		 ?>
		<thead>
			<tr>
				<th colspan='999'><div class='text-left'><?php echo $key ?></div></th>
			</tr>
			<tr><?php
				foreach (Transaction::model()->attributeLabels() as $label) {
					echo "<th>$label</th>";
				}
				echo "<th>Saldo</th>";
				echo "<th>Lbr</th>"; ?>
			</tr>
		</thead>
		<tbody>
			<?php 
			$number=0;
			$sumDebet=0;
			$sumKredit=0;
			$sumNetto=0;
			$sumTdp=0;
			$sumKurang=0;
			foreach($row as $key => $value){

				if($value->num>0)
					$sumDebet+=$value->num;
				else
					$sumKredit-=$value->num;

				if(strpos($value->description,':') !== false){
					if(!isset($sum[$value->description])){
						$sum[$value->description]=0;
					}
					$splitted=explode(':',$value->description);
					$hargaSatuan=($splitted[1]*1000);
					$lbr=($value->num/$hargaSatuan);
					$sum[$value->description]+=$lbr;
				}

				$this->renderPartial('/transaction/_rowWisata', array('data'=>$value,'balance'=>$balance+=$value->num,));?>
			<?php } ?>
		</tbody>
		<thead>
			<tr>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><b>Jumlah</b></td><td></td>
				<td><div class="text-right"><b><?php echo number_format($sumDebet,0,'',','); ?></b></div></td>
				<td><div class="text-right"><b><?php echo number_format($sumKredit,0,'',','); ?></b></div></td>
				<td><div class="text-right"><b><?php echo number_format($sumDebet-$sumKredit,0,'',','); ?></b></div></td>
				<td></td><td></td>
			</tr>
		</thead>
		<?php 
		$totalKredit+=$sumKredit;
		$totalDebet+=$sumDebet;
		} ?>
		<tbody>
			<tr>
				<td colspan='999' align='center'><b>TOTAL: <?php echo number_format($totalDebet-$totalKredit,2,".",","); ?></b></td>
			</tr>
		</tbody>
	</table>
</div>
<?php 
echo "<table border='1'>";
foreach ($sum as $key => $value) {
	echo "<tr><td style='width:300px;'> $key </td><td> $value</td></tr>";
}
echo "</table>";
	$this->pageTitle=Yii::app()->name . " - Penjualan ";
?>

<!-- <div>Count Total: <?php //echo $sum ?> mobil terjual</div>
<div>Rata-rata: <?php //echo round($sum/count($rows),0) ?> mobil terjual/<?php echo $period ?></div> -->
<style type="text/css">
@media only screen 
and (min-width : 1224px) {
	.container{
		width:85% !important;
	}
}
td{
	vertical-align: middle !important;
}
.error td{
	text-decoration:line-through;
}
@media print{
	.navbar{
		display: none;
	}
	table{
		table-layout: fixed;
		border-spacing: 0px;
	}
	td{
		font-size: 8.6px;
		padding:3px;
	}
	td:nth-child(4),td:nth-child(2){
		font-size: 7px;
	}
	.NOKA,.NOSIN{
	    width:30px;
	}
	.tgl{
		width:32px;
	}
	tbody tr:nth-child(2n+1){
		background-color: #EEE;
	}
	thead tr th{
		border-bottom:1px solid black;
	}
	.error td{
		text-decoration:line-through;
	}
	a:link:after,
    a:visited:after {
        content: "" !important;
    }
}
</style>