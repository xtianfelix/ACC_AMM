<?php

/**
 * This is the model class for table "penjualan".
 *
 * The followings are the available columns in table 'penjualan':
 * @property string $id
 * @property string $stock_id
 * @property integer $location_id
 * @property integer $customer_id
 * @property string $NAMA_LEASING
 * @property string $POKOK_HUTANG
 * @property string $DP
 * @property string $ASURANSI
 * @property string $JENIS_ASURANSI
 * @property string $LAMA_ANGSURAN
 * @property integer $LKALI_ANGSURAN
 * @property string $ANGSURAN
 * @property string $TOTAL_UANG_MUKA
 * @property string $TANGGAL_REFUND
 * @property string $TOTAL_REFUND_ASURANSI
 * @property string $TANGGAL_TERJUAL
 * @property string $NAMA_MAKELAR
 * @property string $HARGA_OTR
 * @property string $CASHBACK
 * @property string $KETERANGAN_TRANSAKSI
 * @property string $TANGGAL_CAIR
 * @property string $PENCAIRAN
 * @property string $TOTAL_BAYAR
 * @property string $KEKURANGAN
 * @property string $BIAYA_MAINTENANCE
 * @property integer $is_deleted
 * @property integer $insert_timestamp
 * @property integer $update_timestamp
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Stock $stock
 * @property Location $location
 */
class Penjualan extends ActiveRecord
{
 	public $merk_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'penjualan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stock_id, customer_id, TANGGAL_TERJUAL', 'required'),
			array('customer_id, LKALI_ANGSURAN, is_deleted, insert_timestamp, update_timestamp', 'numerical', 'integerOnly'=>true),
			array('stock_id, JENIS_ASURANSI, LAMA_ANGSURAN', 'length', 'max'=>20),
			array('NAMA_LEASING, NAMA_MAKELAR', 'length', 'max'=>80),
			array('POKOK_HUTANG, DP, ASURANSI, ANGSURAN, TOTAL_UANG_MUKA, TOTAL_REFUND_ASURANSI, HARGA_OTR, CASHBACK, PENCAIRAN, TOTAL_BAYAR, KEKURANGAN, BIAYA_MAINTENANCE', 'length', 'max'=>11),
			array('KETERANGAN_TRANSAKSI, TANGGAL_CAIR, TANGGAL_REFUND', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, stock_id, customer_id, NAMA_LEASING, POKOK_HUTANG, DP, ASURANSI, JENIS_ASURANSI, LAMA_ANGSURAN, LKALI_ANGSURAN, ANGSURAN, TOTAL_UANG_MUKA, TANGGAL_REFUND, TOTAL_REFUND_ASURANSI, TANGGAL_TERJUAL, NAMA_MAKELAR, HARGA_OTR, CASHBACK, KETERANGAN_TRANSAKSI, TANGGAL_CAIR, PENCAIRAN, TOTAL_BAYAR, KEKURANGAN, BIAYA_MAINTENANCE, is_deleted, insert_timestamp, update_timestamp, merk_search', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'stock' => array(self::BELONGS_TO, 'Stock', 'stock_id'),
			'location' => array(self::BELONGS_TO, 'Location', 'location_id'),
		);
	}

	public function scopes(){
		return array(
		    'list'=>array(
		          'order'=>'TANGGAL_TERJUAL DESC',
		    ),
		    'blmCair'=>array(
		        'with'=>array('stock'),
		        'condition'=>'TANGGAL_CAIR is null',
		        'order'=>'NAMA_LEASING ASC,TANGGAL_TERJUAL DESC',
		    ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'stock_id' => 'Stock',
			'customer_id' => 'Customer',
			'location_id' => 'Showroom',
			'NAMA_LEASING' => 'Nama Leasing',
			'POKOK_HUTANG' => 'Pokok Hutang',
			'DP' => 'Dp',
			'ASURANSI' => 'Asuransi',
			'JENIS_ASURANSI' => 'Jenis Asuransi',
			'LAMA_ANGSURAN' => 'Lama Angsuran',
			'LKALI_ANGSURAN' => 'Lkali Angsuran',
			'ANGSURAN' => 'Angsuran',
			'TOTAL_UANG_MUKA' => 'Total Uang Muka',
			'TANGGAL_REFUND' => 'Tanggal Refund',
			'TOTAL_REFUND_ASURANSI' => 'Total Refund Asuransi',
			'TANGGAL_TERJUAL' => 'Tanggal Terjual',
			'NAMA_MAKELAR' => 'Nama Makelar',
			'HARGA_OTR' => 'Harga Otr',
			'CASHBACK' => 'Cashback',
			'KETERANGAN_TRANSAKSI' => 'Keterangan Transaksi',
			'TANGGAL_CAIR' => 'Tanggal Cair',
			'PENCAIRAN' => 'Pencairan',
			'TOTAL_BAYAR' => 'Total Bayar',
			'KEKURANGAN' => 'Kekurangan',
			'BIAYA_MAINTENANCE' => 'Biaya Maintenance',
			'is_deleted' => 'Is Deleted',
			'insert_timestamp' => 'Insert Timestamp',
			'update_timestamp' => 'Update Timestamp',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('NAMA_LEASING',$this->NAMA_LEASING,true);
		$criteria->compare('POKOK_HUTANG',$this->POKOK_HUTANG,true);
		$criteria->compare('DP',$this->DP,true);
		$criteria->compare('ASURANSI',$this->ASURANSI,true);
		$criteria->compare('JENIS_ASURANSI',$this->JENIS_ASURANSI,true);
		$criteria->compare('LAMA_ANGSURAN',$this->LAMA_ANGSURAN,true);
		$criteria->compare('LKALI_ANGSURAN',$this->LKALI_ANGSURAN);
		$criteria->compare('ANGSURAN',$this->ANGSURAN,true);
		$criteria->compare('TOTAL_UANG_MUKA',$this->TOTAL_UANG_MUKA,true);
		$criteria->compare('TANGGAL_REFUND',$this->TANGGAL_REFUND,true);
		$criteria->compare('TOTAL_REFUND_ASURANSI',$this->TOTAL_REFUND_ASURANSI,true);
		$criteria->compare('TANGGAL_TERJUAL',$this->TANGGAL_TERJUAL,true);
		$criteria->compare('NAMA_MAKELAR',$this->NAMA_MAKELAR,true);
		$criteria->compare('HARGA_OTR',$this->HARGA_OTR,true);
		$criteria->compare('CASHBACK',$this->CASHBACK,true);
		$criteria->compare('KETERANGAN_TRANSAKSI',$this->KETERANGAN_TRANSAKSI,true);
		$criteria->compare('TANGGAL_CAIR',$this->TANGGAL_CAIR,true);
		$criteria->compare('PENCAIRAN',$this->PENCAIRAN,true);
		$criteria->compare('TOTAL_BAYAR',$this->TOTAL_BAYAR,true);
		$criteria->compare('KEKURANGAN',$this->KEKURANGAN,true);
		$criteria->compare('BIAYA_MAINTENANCE',$this->BIAYA_MAINTENANCE,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('insert_timestamp',$this->insert_timestamp);
		$criteria->compare('update_timestamp',$this->update_timestamp);
		$criteria->with=array('stock');
		$criteria->compare('stock.MERK',$this->merk_search,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		    'sort'=>array(
		        'attributes'=>array(
		            'merk_search'=>array(
		                'asc'=>'stock.MERK',
		                'desc'=>'stock.MERK DESC',
		            ),
		            '*',
		        ),
		    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Penjualan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
