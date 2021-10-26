<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'mailer' => [
           'class' => 'yii\swiftmailer\Mailer',
           'transport' => [
               'class' => 'Swift_SmtpTransport',
             'host' => 'smtp.gmail.com',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
             'username' => 'murodsanakulov52@gmail.com',
             'password' => 'duiknjltfwvvnvio',
             'port' => '587', // Port 25 is a very common port too
             'encryption' => 'tls', // It is often used, check your provider or mail server specs

             'plugins' => [
               [
                   'class' => 'Swift_Plugins_ThrottlerPlugin',
                   'constructArgs' => [20],
               ],
           ],
       ],
   ],
   'request' => [
    'csrfParam' => '_csrf-frontend',
    'baseUrl' => '',
],
'user' => [
    'identityClass' => 'common\models\User',
    'enableAutoLogin' => true,
    'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
],
'session' => [
            // this is the name of the session cookie used for login on the frontend
    'name' => 'advanced-frontend',
],
'log' => [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
        ],
    ],
],

'errorHandler' => [
    'errorAction' => 'site/error',
],

'urlManager' => [ 
            // 'scriptUrl'=>'',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
    ],
],

],
'params' => $params,
];