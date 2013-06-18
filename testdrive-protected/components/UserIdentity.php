<?php

/**
* UserIdentity represents the data needed to identity a user.
* It contains the authentication method that checks if the provided
* data can identity the user.
*/
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $user = User::model()->findByAttributes(array(
            'email'=>$this->username
        ));

        if ($user === null) {
            //No user found
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } else if ($user->pass !== hash_hmac('sha256', $this->password, Yii::app()->params['encryptionKey'])) {
            //Invalid password
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            //Okay
            $this->errorCode=self::ERROR_NONE;
        }
        $users=array(
            // username => password
            'demo'=>'demo',
            'admin'=>'admin',
        );
        if(!isset($users[$this->username]))
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        elseif($users[$this->username]!==$this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode=self::ERROR_NONE;
        return !$this->errorCode;
    }
}