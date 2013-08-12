<?php

/**
 * This is the model class for table "car_version".
 *
 * The followings are the available columns in table 'car_version':
 * @property string $id
 * @property string $category
 * @property integer $hp
 * @property string $fuel_type
 * @property string $gearshift_type
 * @property string $price
 *
 * The followings are the available model relations:
 * @property Car[] $cars
 */
class CarVersion extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'car_version';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
        return array(
            array('category, hp, fuel_type, gearshift_type', 'required'),
            array('hp', 'numerical', 'integerOnly' => true),
            array('category, price', 'length', 'max' => 45),
            array('fuel_type', 'length', 'max' => 6),
            array('gearshift_type', 'length', 'max' => 9),
// The following rule is used by search().
// @todo Please remove those attributes that should not be searched.
            array('id, category, hp, fuel_type, gearshift_type, price', 'safe', 'on' => 'search'),
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
            'cars' => array(self::HAS_MANY, 'Car', 'car_version_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'category' => 'Category',
            'hp' => 'Hp',
            'fuel_type' => 'Fuel Type',
            'gearshift_type' => 'Gearshift Type',
            'price' => 'Price',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('category', $this->category, true);
        $criteria->compare('hp', $this->hp);
        $criteria->compare('fuel_type', $this->fuel_type, true);
        $criteria->compare('gearshift_type', $this->gearshift_type, true);
        $criteria->compare('price', $this->price, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CarVersion the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
