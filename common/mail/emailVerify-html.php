<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

//$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
$verifyLink = 'https://github.com/Sanakulov-dev';
?>
<div class="verify-email">
    <p>Hello <?= Html::encode($user->receiver_name) ?>,</p>

    <p>Follow the link below to verify your email:</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>
</div>
