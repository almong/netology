<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $category_id
 * @property string $question
 * @property string $answer
 * @property int $user_id
 * @property string $date
 * @property string $status
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'question', 'user_id', 'status'], 'required'],
            [['category_id', 'user_id'], 'integer'],
            [['question', 'answer'], 'string'],
            [['date'], 'safe'],
            [['status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'user_id' => 'User ID',
            'date' => 'Date',
            'status' => 'Status',
        ];
    }
}
