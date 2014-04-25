<?php

/**
 * This is the model class for table "maintenance".
 *
 * The followings are the available columns in table 'maintenance':
 * @property string $id
 * @property string $stock_id
 * @property string $TGLTRANSAKSI
 * @property string $name
 * @property string $biaya
 * @property string $desc
 * @property integer $is_deleted
 * @property integer $insert_timestamp
 * @property integer $update_timestamp
 *
 * The followings are the available model relations:
 * @property Stock $stock
 */
class Maintenance extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'maintenance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stock_id, TGLTRANSAKSI', 'required'),
			array('is_deleted, insert_timestamp, update_timestamp', 'numerical', 'integerOnly'=>true),
			array('stock_id', 'length', 'max'=>20),
			array('name', 'length', 'max'=>255),
			array('biaya', 'length', 'max'=>11),
			array('desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, stock_id, TGLTRANSAKSI, name, biaya, desc, is_deleted, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'stock' => array(self::BELONGS_TO, 'Stock', 'stock_id'),
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
			'TGLTRANSAKSI' => 'Tanggal Transaksi',
			'name' => 'Nama Item',
			'biaya' => 'Biaya',
			'desc' => 'Keterangan transaksi',
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
		$criteria->compare('stock_id',$this->stock_id,true);
		$criteria->compare('TGLTRANSAKSI',$this->TGLTRANSAKSI,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('insert_timestamp',$this->insert_timestamp);
		$criteria->compare('update_timestamp',$this->update_timestamp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Maintenance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
