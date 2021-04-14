<?php

require 'init.php';


require Router::load('routes.php')->direct(Request::uri());
