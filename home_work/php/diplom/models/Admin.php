<?php

namespace app\models;

use yii\base\BaseObject;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $email
 */
class Admin extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    public static function findByUsername($username)
    {
            return Admin::find()->where(['login' => $username])->one();
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentity($id)
    {
//        $user = Admin::find(['id'=> $id])->asArray()->one();
//        return isset($user) ? new static($user) : null;
        return new static(Admin::find(['id'=> $id])->asArray()->one());

    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
    }


    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }
}
