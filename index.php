<?php

require 'init.php';
// $messageInfo=$message->getMessage(51);
// var_dump($messageInfo);
require Router::load('routes.php')->direct(Request::uri());
