<?php
/* @var $this StockController */
/* @var $data Stock */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMOBIL')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOMOBIL), array('view', 'id'=>$data->NOMOBIL)); ?>
	<br /><!-- 

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOGOLONGANKENDARAAN')); ?>:</b>
	<?php echo CHtml::encode($data->NOGOLONGANKENDARAAN); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('LELANG_BEKAS_BARU')); ?>:</b>
	<?php echo CHtml::encode($data->LELANG_BEKAS_BARU==1?"BARU":"BEKAS"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MERK')); ?>:</b>
	<?php echo CHtml::encode($data->MERK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TAHUN')); ?>:</b>
	<?php echo CHtml::encode($data->TAHUN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WARNA')); ?>:</b>
	<?php echo CHtml::encode($data->WARNA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOCATION')); ?>:</b>
	<?php echo CHtml::encode($data->LOCATION); ?>
	<br />

	<?php if($this->isAdmin()){ ?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('HARGAPOKOK')); ?>:</b>
		<?php echo CHtml::encode($data->HARGAPOKOK); ?>
		<br />
	<?php } ?>

	<button onclick="window.location='<?php echo $this->createUrl('/penjualan/create',array('id'=>$data->NOMOBIL)); ?>'">JUAL</button>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMASTNK')); ?>:</b>
	<?php echo CHtml::encode($data->NAMASTNK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BPKB')); ?>:</b>
	<?php echo CHtml::encode($data->BPKB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAKTUR')); ?>:</b>
	<?php echo CHtml::encode($data->FAKTUR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BUDGETSALES')); ?>:</b>
	<?php echo CHtml::encode($data->BUDGETSALES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HARGADASARLELANG')); ?>:</b>
	<?php echo CHtml::encode($data->HARGADASARLELANG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FEELELANG')); ?>:</b>
	<?php echo CHtml::encode($data->FEELELANG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIAYAADMINLELANG')); ?>:</b>
	<?php echo CHtml::encode($data->BIAYAADMINLELANG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OTRLELANG')); ?>:</b>
	<?php echo CHtml::encode($data->OTRLELANG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FILENAME')); ?>:</b>
	<?php echo CHtml::encode($data->FILENAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOPOL')); ?>:</b>
	<?php echo CHtml::encode($data->NOPOL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NORANGKA')); ?>:</b>
	<?php echo CHtml::encode($data->NORANGKA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMESIN')); ?>:</b>
	<?php echo CHtml::encode($data->NOMESIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TGLBELI')); ?>:</b>
	<?php echo CHtml::encode($data->TGLBELI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TGLKIRIM')); ?>:</b>
	<?php echo CHtml::encode($data->TGLKIRIM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TGLPAJAK')); ?>:</b>
	<?php echo CHtml::encode($data->TGLPAJAK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUPPLIER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->SUPPLIER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESC')); ?>:</b>
	<?php echo CHtml::encode($data->DESC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PIC')); ?>:</b>
	<?php echo CHtml::encode($data->PIC); ?>
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