<?php
/* @var $this TransactionController */
/* @var $data Transaction */


	echo "<tr>";
		echo "<td>".$data->id."</td>";
		echo "<td>".$data->account->account."</td>";
		echo "<td>".$data->tgl."</td>";
		echo "<td>".$data->tgl_pb."</td>";
		echo "<td>".$data->description."</td>";
		echo "<td>".(is_object($data->kas)?$data->kas->kas:"")."</td>";
		echo "<td>".(is_object($data->nama)?$data->nama->nama:"")."</td>";
		echo "<td>".$data->bln_jl."</td>";
		echo "<td>".$data->unit."</td>";
		echo "<td>".(is_object($data->lunas)?$data->lunas->lunas:"")."</td>";
		echo "<td>".$data->code_id."</td>";
		echo "<td>".($data->num>0?$data->num."</td><td>":"</td><td>".-$data->num)."</td>";
	echo "</tr>";
?>