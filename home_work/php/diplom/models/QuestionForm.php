<?php

namespace app\models;

use yii\base\Model;

class QuestionForm extends Model
{
    public $name;
    public $email;
    public $question;
    public $catigoria;


    public function rules()
    {
        return [
            [['name', 'email', 'question'], 'required'],
            ['email', 'email'],
        ];
    }
}