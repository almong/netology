<?php

namespace app\models;

use yii\base\Model;

/**
 * Class QuestionForm
 * @package app\models
 */
class QuestionForm extends Model
{
    public $name;
    public $email;
    public $question;
    public $catigoria;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'email', 'question'], 'required'],
            ['email', 'email'],
        ];
    }
}