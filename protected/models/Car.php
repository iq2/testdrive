<?php

/**
 * This is the model class for table "car".
 *
 * The followings are the available columns in table 'car':
 * @property string $id
 * @property string $model
 * @property string $color
 * @property double $price
 * @property string $car_version_id
 * @property string $car_option_id
 *
 * The followings are the available model relations:
 * @property CarVersion $carVersion
 * @property CarOption $carOption
 */
class Car extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'car';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
        return array(
            array('car_version_id, car_option_id', 'required'),
            array('price', 'numerical'),
            array('model, color', 'length', 'max' => 45),
            array('car_version_id, car_option_id', 'length', 'max' => 10),
// The following rule is used by search().
// @todo Please remove those attributes that should not be searched.
            array('id, model, color, price, car_version_id, car_option_id', 'safe', 'on' => 'search'),
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
            'carVersion' => array(self::BELONGS_TO, 'CarVersion', 'car_version_id'),
            'carOption' => array(self::BELONGS_TO, 'CarOption', 'car_option_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'model' => 'Model',
            'color' => 'Color',
            'price' => 'Price',
            'car_version_id' => 'Car Version',
            'car_option_id' => 'Car Option',
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
        $criteria->compare('model', $this->model, true);
        $criteria->compare('color', $this->color, true);
        $criteria->compare('price', $this->price);
        $criteria->compare('car_version_id', $this->car_version_id, true);
        $criteria->compare('car_option_id', $this->car_option_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Car the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
