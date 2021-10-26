<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Emails;

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
            // name, email, subject and body are required
            [['receiver_name', 'receiver_email', 'subject', 'content'], 'required'],
            // email has to be a valid email address
            ['receiver_email', 'email'],
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
        if ($this->sendEmail($email)&&$email->save()) {
            return  $email;
        }
        return false;
    }
    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
        ->setTo($receiver_email)
        ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
        ->setReplyTo([$this->receiver_email => $this->receiver_name])
        ->setSubject($this->subject)
        ->setTextBody($this->content)
        ->send();
    }
}
