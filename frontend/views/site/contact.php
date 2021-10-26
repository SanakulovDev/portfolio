<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact me</h2>
            <div class="contact-content">
               <div class="column left">
                <div class="text"> Get in Touch</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti maiores aut ad, odit voluptatum quod unde quaerat enim vero dolorem.</p>
                <div class="icons">
                   <div class="row">
                       <i class="fas fa-user"></i>
                       <div class="info">
                           <div class="head">Name</div>
                           <div class="sub-title"><?= Yii::$app->params['supportName'] ?></div>
                       </div>
                   </div>

                   <div class="row">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="info">
                        <div class="head">Address</div>
                        <div class="sub-title"><?= Yii::$app->params['address'] ?></div>
                    </div>
                </div>
                <div class="row">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="info">
                        <div class="head">Phone number</div>
                        <div class="sub-title"><?= Yii::$app->params['phone'] ?></div>
                    </div>
                </div>

                <div class="row">
                    <i class="fas fa-envelope"></i>
                    <div class="info">
                        <div class="head">Email</div>
                        <div class="sub-title"><?= Yii::$app->params['supportEmail'] ?></div>
                    </div>
                </div>
            </div>  
        </div> 
        <div class="column right">
          <div class="text">Message</div>
          <?php $form = ActiveForm::begin(['options' =>['enctype'=>'multipart/form-data']]); ?>
          <div class="fields mb-3">
             <div class="field name">
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
            </div>

            <div class="field email">
                <?= $form->field($model, 'email') ?>
            </div>
        </div> 
        <div class="field">
            <?= $form->field($model, 'subject') ?>
        </div>

        <div class="field textarea">
            <?= $form->field($model, 'body')->textarea(['rows' => 4, 'cols'=>30]) ?>
        </div>
        <div class="button">
           <?= Html::submitButton('Send message', [ 'name' => 'contact-button']) ?>
       </div>
       <?php ActiveForm::end(); ?>
   </div>
</div>
</div>

</section>


</div>
