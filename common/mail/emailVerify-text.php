<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

//$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
$verifyLink = 'https://github.com/Sanakulov-dev';
?>
Hello <?= $user->receiver_name ?>,

Follow the link below to verify your email:

<?= $verifyLink ?>
