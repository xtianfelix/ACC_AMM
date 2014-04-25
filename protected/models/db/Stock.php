<?php

/**
 * This is the model class for table "stock".
 *
 * The followings are the available columns in table 'stock':
 * @property string $NOMOBIL
 * @property integer $NOGOLONGANKENDARAAN
 * @property integer $LELANG_BEKAS_BARU
 * @property string $MERK
 * @property string $TYPE
 * @property string $TAHUN
 * @property string $WARNA
 * @property string $NAMASTNK
 * @property string $BPKB
 * @property string $FAKTUR
 * @property string $BUDGETSALES
 * @property string $HARGAPOKOK
 * @property string $HARGADASARLELANG
 * @property string $FEELELANG
 * @property string $BIAYAADMINLELANG
 * @property string $OTRLELANG
 * @property string $FILENAME
 * @property string $NOPOL
 * @property string $NORANGKA
 * @property string $NOMESIN
 * @property string $TGLBELI
 * @property string $TGLKIRIM
 * @property string $TGLPAJAK
 * @property integer $SUPPLIER_ID
 * @property string $DESC
 * @property string $STATUS
 * @property string $LOCATION
 * @property string $PIC
 * @property integer $is_deleted
 * @property integer $insert_timestamp
 * @property integer $update_timestamp
 *
 * The followings are the available model relations:
 * @property Maintenance[] $maintenances
 * @property Penjualan $penjualan
 * @property Golongankendaraan $nOGOLONGANKENDARAAN
 * @property Supplier $sUPPLIER
 */
class Stock extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOGOLONGANKENDARAAN, LELANG_BEKAS_BARU, SUPPLIER_ID, is_deleted, insert_timestamp, update_timestamp', 'numerical', 'integerOnly'=>true),
			array('MERK, TYPE', 'length', 'max'=>30),
			array('TAHUN', 'length', 'max'=>4),
			array('WARNA, FILENAME, NORANGKA, NOMESIN, PIC', 'length', 'max'=>50),
			array('NAMASTNK, BPKB, FAKTUR', 'length', 'max'=>255),
			array('BUDGETSALES, HARGAPOKOK, HARGADASARLELANG, FEELELANG, BIAYAADMINLELANG, OTRLELANG', 'length', 'max'=>11),
			array('NOPOL, STATUS, LOCATION', 'length', 'max'=>20),
			array('TGLBELI, TGLKIRIM, TGLPAJAK, DESC', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NOMOBIL, NOGOLONGANKENDARAAN, LELANG_BEKAS_BARU, MERK, TYPE, TAHUN, WARNA, NAMASTNK, BPKB, FAKTUR, BUDGETSALES, HARGAPOKOK, HARGADASARLELANG, FEELELANG, BIAYAADMINLELANG, OTRLELANG, FILENAME, NOPOL, NORANGKA, NOMESIN, TGLBELI, TGLKIRIM, TGLPAJAK, SUPPLIER_ID, DESC, STATUS, LOCATION, PIC, is_deleted, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
		);
	}

	public function scopes(){
		return array(
		    'list'=>array(
		          'order'=>'TGLBELI DESC',
		    ),
		    'available'=>array(
		        'with'=>array('penjualan'),
		        'condition'=>'penjualan.id is null',
		    ),
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
			'maintenances' => array(self::HAS_MANY, 'Maintenance', 'stock_id'),
			'penjualan' => array(self::BELONGS_TO, 'Penjualan', 'NOMOBIL'),
			'nOGOLONGANKENDARAAN' => array(self::BELONGS_TO, 'Golongankendaraan', 'NOGOLONGANKENDARAAN'),
			'sUPPLIER' => array(self::BELONGS_TO, 'Supplier', 'SUPPLIER_ID'),
		);
	}

	public function totalBiaya(){
		$biaya=0;
		foreach($this->maintenances as $m){
			$biaya+=$m->biaya;
		}
		return $biaya;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'NOMOBIL' => 'ID',
			'NOGOLONGANKENDARAAN' => 'No golongan kendaraan',
			'LELANG_BEKAS_BARU' => 'Bekas Lelang/Bekas Umum/Baru',
			'MERK' => 'Merk Kendaraan',
			'TYPE' => 'Type Kendaraan',
			'TAHUN' => 'Tahun Kendaraan',
			'WARNA' => 'Warna Kendaraan',
			'NAMASTNK' => 'A/N STNK',
			'BPKB' => 'BPKB Kendaraan',
			'FAKTUR' => 'Faktur',
			'BUDGETSALES' => 'Budget Sales',
			'HARGAPOKOK' => 'Harga Pokok',
			'HARGADASARLELANG' => 'Harga Dasar',
			'FEELELANG' => 'Fee',
			'BIAYAADMINLELANG' => 'Biaya Administrasi',
			'OTRLELANG' => 'Harga OTR',
			'FILENAME' => 'Filename',
			'NOPOL' => 'Nomor Polisi',
			'NORANGKA' => 'Nomor Rangka',
			'NOMESIN' => 'Nomor Mesin',
			'TGLBELI' => 'Tanggal Beli',
			'TGLKIRIM' => 'Tanggal Kirim',
			'TGLPAJAK' => 'Tanggal Pajak',
			'SUPPLIER_ID' => 'Supplier',
			'DESC' => 'Keterangan',
			'STATUS' => 'Status',
			'LOCATION' => 'Lokasi Kendaraan',
			'PIC' => 'PIC (Person In Charge)',
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

		$criteria->compare('NOMOBIL',$this->NOMOBIL,true);
		$criteria->compare('NOGOLONGANKENDARAAN',$this->NOGOLONGANKENDARAAN);
		$criteria->compare('LELANG_BEKAS_BARU',$this->LELANG_BEKAS_BARU);
		$criteria->compare('MERK',$this->MERK,true);
		$criteria->compare('TYPE',$this->TYPE,true);
		$criteria->compare('TAHUN',$this->TAHUN,true);
		$criteria->compare('WARNA',$this->WARNA,true);
		$criteria->compare('NAMASTNK',$this->NAMASTNK,true);
		$criteria->compare('BPKB',$this->BPKB,true);
		$criteria->compare('FAKTUR',$this->FAKTUR,true);
		$criteria->compare('BUDGETSALES',$this->BUDGETSALES,true);
		$criteria->compare('HARGAPOKOK',$this->HARGAPOKOK,true);
		$criteria->compare('HARGADASARLELANG',$this->HARGADASARLELANG,true);
		$criteria->compare('FEELELANG',$this->FEELELANG,true);
		$criteria->compare('BIAYAADMINLELANG',$this->BIAYAADMINLELANG,true);
		$criteria->compare('OTRLELANG',$this->OTRLELANG,true);
		$criteria->compare('FILENAME',$this->FILENAME,true);
		$criteria->compare('NOPOL',$this->NOPOL,true);
		$criteria->compare('NORANGKA',$this->NORANGKA,true);
		$criteria->compare('NOMESIN',$this->NOMESIN,true);
		$criteria->compare('TGLBELI',$this->TGLBELI,true);
		$criteria->compare('TGLKIRIM',$this->TGLKIRIM,true);
		$criteria->compare('TGLPAJAK',$this->TGLPAJAK,true);
		$criteria->compare('SUPPLIER_ID',$this->SUPPLIER_ID);
		$criteria->compare('DESC',$this->DESC,true);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('LOCATION',$this->LOCATION,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('insert_timestamp',$this->insert_timestamp);
		$criteria->compare('update_timestamp',$this->update_timestamp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	public function searchAvailable()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('NOMOBIL',$this->NOMOBIL,true);
		$criteria->compare('NOGOLONGANKENDARAAN',$this->NOGOLONGANKENDARAAN);
		$criteria->compare('LELANG_BEKAS_BARU',$this->LELANG_BEKAS_BARU);
		$criteria->compare('MERK',$this->MERK,true);
		$criteria->compare('TYPE',$this->TYPE,true);
		$criteria->compare('TAHUN',$this->TAHUN,true);
		$criteria->compare('WARNA',$this->WARNA,true);
		$criteria->compare('NAMASTNK',$this->NAMASTNK,true);
		$criteria->compare('BPKB',$this->BPKB,true);
		$criteria->compare('FAKTUR',$this->FAKTUR,true);
		$criteria->compare('BUDGETSALES',$this->BUDGETSALES,true);
		$criteria->compare('HARGAPOKOK',$this->HARGAPOKOK,true);
		$criteria->compare('HARGADASARLELANG',$this->HARGADASARLELANG,true);
		$criteria->compare('FEELELANG',$this->FEELELANG,true);
		$criteria->compare('BIAYAADMINLELANG',$this->BIAYAADMINLELANG,true);
		$criteria->compare('OTRLELANG',$this->OTRLELANG,true);
		$criteria->compare('FILENAME',$this->FILENAME,true);
		$criteria->compare('NOPOL',$this->NOPOL,true);
		$criteria->compare('NORANGKA',$this->NORANGKA,true);
		$criteria->compare('NOMESIN',$this->NOMESIN,true);
		$criteria->compare('TGLBELI',$this->TGLBELI,true);
		$criteria->compare('TGLKIRIM',$this->TGLKIRIM,true);
		$criteria->compare('TGLPAJAK',$this->TGLPAJAK,true);
		$criteria->compare('SUPPLIER_ID',$this->SUPPLIER_ID);
		$criteria->compare('DESC',$this->DESC,true);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('LOCATION',$this->LOCATION,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('insert_timestamp',$this->insert_timestamp);
		$criteria->compare('update_timestamp',$this->update_timestamp);

		return new CActiveDataProvider($this->available(), array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 100),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
