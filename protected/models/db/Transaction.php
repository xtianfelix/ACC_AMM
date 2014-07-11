<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property double $id
 * @property double $account_id
 * @property date $tgl
 * @property date $tgl_pb
 * @property string $description
 * @property string $kwt
 * @property double $kas_id
 * @property double $nama_id
 * @property double $bln_jl
 * @property double $unit
 * @property double $lunas_id
 * @property double $code_id
 * @property double $num
 * @property integer $is_deleted
 * @property integer $insert_timestamp
 * @property integer $update_timestamp
 * @property integer $insert_user_id
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Nama $nama
 * @property Account $account
 * @property Code $code
 * @property Kas $kas
 * @property Lunas $lunas
 */
class Transaction extends ActiveRecord
{
	public $kredit;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, account_id, kas_id, nama_id, unit, lunas_id, code_id, num, is_deleted, insert_timestamp, update_timestamp, insert_user_id, update_user_id', 'numerical'),
			array('description,kwt', 'length', 'max'=>255),
			array('tgl,tgl_pb', 'safe'),
						// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, account_id, tgl, tgl_pb, description, kas_id, nama_id, bln_jl, unit, lunas_id, code_id, num', 'safe', 'on'=>'search'),
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
			'nama' => array(self::BELONGS_TO, 'Nama', 'nama_id'),
			'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
			'code' => array(self::BELONGS_TO, 'Code', 'code_id'),
			'kas' => array(self::BELONGS_TO, 'Kas', 'kas_id'),
			'lunas' => array(self::BELONGS_TO, 'Lunas', 'lunas_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'account_id' => 'Account',
			'tgl' => 'Tgl',
			'tgl_pb' => 'Tgl Pb',
			'description' => 'Description',
			'kas_id' => 'Kas',
			'nama_id' => 'Nama',
			'bln_jl' => 'Bln Jl',
			'unit' => 'Unit',
			'lunas_id' => 'Lunas',
			'code_id' => 'Code',
			'num' => 'Debet',
			'kredit' => 'Kredit',
			'kwt' => 'KWT',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('tgl',$this->tgl);
		$criteria->compare('tgl_pb',$this->tgl_pb);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('kas_id',$this->kas_id);
		$criteria->compare('nama_id',$this->nama_id);
		$criteria->compare('bln_jl',$this->bln_jl);
		$criteria->compare('unit',$this->unit);
		$criteria->compare('lunas_id',$this->lunas_id);
		$criteria->compare('code_id',$this->code_id);
		$criteria->compare('num',$this->num);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 100000),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
