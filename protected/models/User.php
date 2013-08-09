<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $pass
 * @property string $type
 * @property string $date_entered
 * @property string date_updated
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property File[] $files
 * @property Page[] $pages
 */
class User extends CActiveRecord
{
    public $passCompare;
    public $avatar;

    private $_identity;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, pass', 'required'),
            array('pass', 'authenticate', 'on' => 'login'),
            array('username, email, pass, passCompare', 'required', 'on' => 'insert'),
            array(
                'avatar',
                'file',
                'allowEmpty' => false,
                'maxSize' => 1024000,
                'types' => 'jpg,jpeg,png',
                'tooLarge' => 'The file size must not exceed 1MB',
                'on' => 'insert'
            ),
            array(
                'avatar',
                'file',
                'allowEmpty' => true,
                'maxSize' => 102400,
                'types' => 'jpg,jpeg,png',
                'tooLarge' => 'The file size must not exceed 100kB',
                'except' => 'insert'
            ),
            array('email, username', 'unique', 'on' => 'insert'),
            array('email', 'email'),
            array('username', 'length', 'max' => 45),
            array('email', 'length', 'max' => 60),
            array('pass', 'match', 'pattern' => '/^[a-z0-9_-]{6,20}$/i'),
            array('pass', 'compare', 'compareAttribute' => 'passCompare', 'on' => 'insert'),
            array('type', 'default', 'value' => 'public'),
            array('type', 'in', 'range' => array('public', 'author', 'admin')),
            array('date_entered', 'default', 'value' => new CDbExpression('NOW()'), 'on' => 'insert'),
            array('date_updated', 'default', 'value' => new CDbExpression('NOW()'), 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, username, email, pass, type, date_entered', 'safe', 'on' => 'search'),
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
            'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
            'files' => array(self::HAS_MANY, 'File', 'user_id'),
            'pages' => array(self::HAS_MANY, 'Page', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'pass' => 'Pass',
            'type' => 'Type',
            'date_entered' => 'Date Entered',
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('pass', $this->pass, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('date_entered', $this->date_entered, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function beforeSave()
    {
        Yii::log('hashing password', CLogger::LEVEL_INFO, 'user');
        if ($this->isNewRecord) {
            $this->pass = hash_hmac('sha256', $this->pass, Yii::app()->params['encryptionKey']);
        }
        return parent::beforeSave();
    }

    public function scopes()
    {
        return array(
            'authorsForLists' => array(
                'select' => 'id,username',
                'order' => 'username ASC',
                'condition' => 'type!="public'
            )
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->email, $this->pass);
            if (!$this->_identity->authenticate()) {
                $this->addError('password', 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->email, $this->pass);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            Yii::app()->user->login($this->_identity);
            return true;
        } else {
            return false;
        }
    }
}
