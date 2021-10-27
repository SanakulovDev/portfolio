<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Emails;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $receiver_name;
    public $receiver_email;
    public $subject;
    public $content;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receiver_email'],'string'],
            [['receiver_name', 'subject','content'],'string', 'max'=>255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }
    public function contact()
    {
        $email = new Emails();
        $email->receiver_name = $this->receiver_name;
        $email->receiver_email = $this->receiver_email;
        $email->subject = $this->subject;
        $email->content = $this->content;
        if ($this->sendEmail($email) && $email->save()) {
            return  true;
        }
        return false;
    }

    protected function sendEmail($email)
    {
        return Yii::$app->mailer->compose(
            ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
            ['email' => $email]
        )
        ->setTo($this->receiver_email)
        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->params['senderName']])
        ->setSubject($this->subject)
        ->setTextBody($this->content)
        ->send();
    }
}
