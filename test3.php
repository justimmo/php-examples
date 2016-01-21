<?php

require_once 'config.php';

use Justimmo\Model\Query\BasicDataQuery;
use Justimmo\Model\Wrapper\V1\BasicDataWrapper;
use Justimmo\Model\Mapper\V1\BasicDataMapper;

$mapper = new BasicDataMapper();
$wrapper = new BasicDataWrapper();
$query = new BasicDataQuery($api, $wrapper, $mapper);

$zips = $query->findZipCodes();
?>

<pre>
>> ZIPS:
<?php print_r($zips); ?>
</pre>

<?php
$regions = $query->findRegions();
?>

<pre>
>> REGIONS:
<?php print_r($regions); ?>
</pre>
