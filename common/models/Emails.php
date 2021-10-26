<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $id
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $subject
 * @property string $content
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receiver_name', 'receiver_email', 'subject', 'content'], 'required'],
            [['content'], 'string'],
            [['receiver_name'], 'string', 'max' => 50],
            [[ 'subject'], 'string', 'max' => 200],
            [['receiver_email'],'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'subject' => 'Subject',
            'content' => 'Content',
        ];
    }

    protected function sendEmail($contact)
    {
        return Yii::$app
        ->mailer
        ->compose(
            ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
            ['user' => $contact]
        )
        ->setTo($receiver_email)
        ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
        ->setSubject($this->subject)
        ->setTextBody($this->content)
        ->send();
    }
}
