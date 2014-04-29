<?php

require_once 'vendor/autoload.php';

use Justimmo\Api\JustimmoApi;
use Psr\Log\NullLogger;
use Justimmo\Cache\NullCache;

$api_username = 'username';
$api_password = 'password';

$api = new JustimmoApi($api_username, $api_password, new NullLogger(), new NullCache());

