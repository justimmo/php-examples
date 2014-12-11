<?php

require_once 'vendor/autoload.php';

use Justimmo\Api\JustimmoApi;
use Psr\Log\NullLogger;
use Justimmo\Cache\NullCache;

$api_username = 'api-7586';
$api_password = 'FkAIJ2depD';

$api = new JustimmoApi($api_username, $api_password, new NullLogger(), new NullCache());

