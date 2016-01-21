<?php

require_once 'config.php';

use Justimmo\Model\Query\BasicDataQuery;
use Justimmo\Model\Wrapper\V1\BasicDataWrapper;
use Justimmo\Model\Mapper\V1\BasicDataMapper;
use Justimmo\Model\RealtyQuery;
use Justimmo\Model\Wrapper\V1\RealtyWrapper;
use Justimmo\Model\Mapper\V1\RealtyMapper;

?>

<h2>All realty types</h2>
<?php

$mapper = new BasicDataMapper();
$wrapper = new BasicDataWrapper();
$query = new BasicDataQuery($api, $wrapper, $mapper);

$types = $query
    ->all(true)
    ->findRealtyTypes();
?>

<pre>
<?php print_r($types); ?>
</pre>

<h2>All listings with zip code 5020</h2>

<?php

$mapper = new RealtyMapper();
$wrapper = new RealtyWrapper($mapper);
$query = new RealtyQuery($api, $wrapper, $mapper);

$realties = $query
    ->filterByZipCode(5020)
    ->find();
?>

<pre>
<?php print_r($realties); ?>
</pre>

<h2>All listings inside category offices with zip code 5020</h2>

<?php

$mapper = new RealtyMapper();
$wrapper = new RealtyWrapper($mapper);
$query = new RealtyQuery($api, $wrapper, $mapper);

$realties = $query
    ->filterByRealtyTypeId(5)
    ->find();
?>

<pre>
<?php print_r($realties); ?>
</pre>

<h2>All federal states</h2>

<?php

$mapper = new BasicDataMapper();
$wrapper = new BasicDataWrapper();
$query = new BasicDataQuery($api, $wrapper, $mapper);

$types = $query
    ->all(false)
    ->filterByCountry('AT')
    ->findFederalStates();
?>

<pre>
<?php print_r($types); ?>
</pre>

<h2>All offices inside a federal state</h2>

<?php
$mapper = new RealtyMapper();
$wrapper = new RealtyWrapper($mapper);
$query = new RealtyQuery($api, $wrapper, $mapper);

$realties = $query
    ->filterByFederalStateId(3)
    ->filterByRealtyTypeId(5)
    ->find();
?>

<pre>
<?php print_r($realties); ?>
</pre>

<h2>All distinct federal states in Austria</h2>

<?php

$mapper = new BasicDataMapper();
$wrapper = new BasicDataWrapper();
$query = new BasicDataQuery($api, $wrapper, $mapper);

$values = $query
    ->all(true)
    ->filterByCountry('AT')
    ->findFederalStates();
?>

<pre>
<?php print_r($values); ?>
</pre>

<h2>All office listings sorted by netRent</h2>

<?php
$mapper = new RealtyMapper();
$wrapper = new RealtyWrapper($mapper);
$query = new RealtyQuery($api, $wrapper, $mapper);

$realties = $query
    ->orderBy('RentNet', 'asc')
    ->find()
?>

<pre>
<?php print_r($realties); ?>
</pre>
