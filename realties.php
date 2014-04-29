<?php

require_once 'config.php';

$mapper = new \Justimmo\Model\Mapper\V1\RealtyMapper();
$q = new \Justimmo\Model\RealtyQuery($api, new \Justimmo\Model\Wrapper\V1\RealtyWrapper($mapper), $mapper);

$objekte = $q->setLimit(100)
    ->find();
?>
<h1>Objekte</h1>

<ul>
    <?php foreach ($objekte as $objekt): ?>
        <li>
            <a href="realty.php?id=<?php echo $objekt->getId() ?>"><?php echo $objekt->getTitle(); ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<hr />
<pre>
<?php print_r($objekte); ?>
</pre>
