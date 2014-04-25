<?php
/* @var $this PenjualanController */
/* @var $data Penjualan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock_id')); ?>:</b>
	<?php echo CHtml::encode($data->stock_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_LEASING')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_LEASING); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('POKOK_HUTANG')); ?>:</b>
	<?php echo CHtml::encode($data->POKOK_HUTANG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DP')); ?>:</b>
	<?php echo CHtml::encode($data->DP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ASURANSI')); ?>:</b>
	<?php echo CHtml::encode($data->ASURANSI); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('JENIS_ASURANSI')); ?>:</b>
	<?php echo CHtml::encode($data->JENIS_ASURANSI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAMA_ANGSURAN')); ?>:</b>
	<?php echo CHtml::encode($data->LAMA_ANGSURAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LKALI_ANGSURAN')); ?>:</b>
	<?php echo CHtml::encode($data->LKALI_ANGSURAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ANGSURAN')); ?>:</b>
	<?php echo CHtml::encode($data->ANGSURAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOTAL_UANG_MUKA')); ?>:</b>
	<?php echo CHtml::encode($data->TOTAL_UANG_MUKA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_REFUND')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_REFUND); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOTAL_REFUND_ASURANSI')); ?>:</b>
	<?php echo CHtml::encode($data->TOTAL_REFUND_ASURANSI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_TERJUAL')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_TERJUAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_MAKELAR')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_MAKELAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HARGA_OTR')); ?>:</b>
	<?php echo CHtml::encode($data->HARGA_OTR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CASHBACK')); ?>:</b>
	<?php echo CHtml::encode($data->CASHBACK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KETERANGAN_TRANSAKSI')); ?>:</b>
	<?php echo CHtml::encode($data->KETERANGAN_TRANSAKSI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_CAIR')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_CAIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENCAIRAN')); ?>:</b>
	<?php echo CHtml::encode($data->PENCAIRAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOTAL_BAYAR')); ?>:</b>
	<?php echo CHtml::encode($data->TOTAL_BAYAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KEKURANGAN')); ?>:</b>
	<?php echo CHtml::encode($data->KEKURANGAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIAYA_MAINTENANCE')); ?>:</b>
	<?php echo CHtml::encode($data->BIAYA_MAINTENANCE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->is_deleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('insert_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->insert_timestamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->update_timestamp); ?>
	<br />

	*/ ?>

</div>