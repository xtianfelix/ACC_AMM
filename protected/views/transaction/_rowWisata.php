<?php
/* @var $this TransactionController */
/* @var $data Transaction */


	echo "<tr>";
		echo "<td><a href='".Yii::app()->createUrl("/transaction/update", array("id"=>$data->id))."'>".$data->id."</a></td>";
		echo "<td>".$data->account->account."</td>";
		echo "<td>".$data->tgl."</td>";
		echo "<td>".$data->tgl_pb."</td>";
		echo "<td>".$data->description.(($data->kwt!="")?" | ".$data->kwt:"")."</td>";
		echo "<td>".(is_object($data->kas)?$data->kas->kas:"")."</td>";
		echo "<td>".(is_object($data->nama)?$data->nama->nama:"")."</td>";
		echo "<td>".$data->bln_jl."</td>";
		echo "<td>".$data->unit."</td>";
		echo "<td>".(is_object($data->lunas)?$data->lunas->lunas:"")."</td>";
		echo "<td>".$data->code_id."</td>";
		echo "<td><div class='text-right'>". ($data->num>0?number_format($data->num,2,".",",")."</div></td><td><div class='text-right'>":"</div></td><td><div class='text-right'>".number_format(-$data->num,2,".",",")) ."</div></td>";
		if(isset($balance)){
			echo "<td><div class='text-right'>".number_format(($balance),2,".",",")."</div></td>";
		}else{
			echo "<td>&nbsp;</td>";
		}
		if(strpos($data->description,':') !== false){
			$splitted=explode(':',$data->description);
			$hargaSatuan=($splitted[1]*1000);
			echo "<td><div class='text-right'>".($data->num/$hargaSatuan)."</div></td>";
		}else{
			echo "<td>&nbsp;</td>";
		}
	echo "</tr>";
?>