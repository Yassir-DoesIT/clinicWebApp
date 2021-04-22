<?php

require 'init.php';
$messageInfo=$message->getMessage(3); var_dump($messageInfo);
require Router::load('routes.php')->direct(Request::uri());
