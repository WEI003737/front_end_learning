<?php
  session_start(); //require
  require_once './php-graph-sdk-5.x/src/Facebook/autoload.php'; //記得下載套件 composer require facebook/graph-sdk

  $fb = new Facebook\Facebook([
    'app_id' => '{app_id}', // 把 {app_id} 換成你的應用程式編號
    'app_secret' => '{app_secret}', // 把 {app_secret} 換成你的應用程式密鑰
    'default_graph_version' => 'v2.2',
    ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email'];
  $loginUrl = $helper->getLoginUrl('http://{url}', $permissions);
  
  echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';