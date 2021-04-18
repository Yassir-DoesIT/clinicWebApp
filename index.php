<?php

require 'init.php';
// var_dump($_GET);
require Router::load('routes.php')->direct(Request::uri());
